<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s_user = $request->get('search');

        $roles = Role::all();
        $users = User::orderBy('id')
        ->searchUser($s_user)
        ->paginate(6);

        return view('admin.users.index')->with(compact('users','s_user','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create')->with(compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->description = $request->input('description');
        $user->role_id = $request->input('roleid');
        $user->save();

        return redirect('/admin/users')->with('status', 'El usuario se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);

        return view('admin.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email,'.$id
        ];

        $this->validate($request, $rules);
        
        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');

        if($request->input('password')){
            $user->password = bcrypt($request->input('password'));
        }else{
            $user->password = $user->password;
        }

        $user->description = $request->input('description');
        $user->role_id = $user->role->id;
        $user->save();

        return redirect('/admin/users')->with('status', 'El usuario se actualizó correctamente');
    }

    public function update_role(Request $request, $id)
    {
        $user = User::find($id);
        $user->role_id = $request->input('roleid');
        $user->save();

        return redirect('/admin/users')->with('status', 'El rol del usuario se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users')->with('status', 'El usuario se eliminó correctamente');
    }
}
