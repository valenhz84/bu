<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        
        return view('admin.roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
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
            'fullname' => 'required',
            'shortname' => 'required|unique:roles,shortname',
            'level' => 'required|numeric|unique:roles,level'
        ];

        $this->validate($request, $rules);

        $role = new Role();
        $role->fullname = $request->input('fullname');
        $role->shortname = $request->input('shortname');
        $role->description = $request->input('description');
        $role->level = $request->input('level');
        $role->save();

        return redirect('/admin/roles')->with('status', 'El rol se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrfail($id);

        return view('admin.roles.edit')->with(compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'fullname' => 'required',
            'shortname' => 'required|unique:roles,shortname,'.$id,
            'level' => 'required|numeric|unique:roles,level,'.$id
        ];

        $this->validate($request, $rules);

        $role = Role::find($id);
        $role->fullname = $request->input('fullname');
        $role->shortname = $request->input('shortname');
        $role->description = $request->input('description');
        $role->level = $request->input('level');
        $role->save();

        return redirect('/admin/roles')->with('status', 'El rol actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
    
        $role->delete();
        return redirect('/admin/roles')->with('status', 'El rol se eliminó correctamente');
    }
}
