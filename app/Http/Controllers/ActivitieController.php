<?php

namespace App\Http\Controllers;

use App\Activitie;
use Illuminate\Http\Request;

class ActivitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activitie::all();

        return view('admin.activities.index')->with(compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activities.create');
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
            'shortname' => 'required|alpha_dash|unique:activities,shortname'
        ];

        $this->validate($request, $rules);

        $activitie = new Activitie();
        $activitie->fullname = $request->input('fullname');
        $activitie->shortname = $request->input('shortname');
        $activitie->description = $request->input('description');
        $activitie->save();

        return redirect('/admin/activities')->with('status', 'La actividad se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activitie = Activitie::find($id);

        return view('admin.activities.edit')->with(compact('activitie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'fullname' => 'required',
            'shortname' => 'required|unique:activities,shortname,'.$id
        ];

        $this->validate($request, $rules);

        $activitie = Activitie::find($id);
        $activitie->fullname = $request->input('fullname');
        $activitie->shortname = $request->input('shortname');
        $activitie->description = $request->input('description');
        $activitie->save();

        return redirect('/admin/activities')->with('status', 'La actividad se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activitie = Activitie::find($id);
        $activitie->delete();

        return redirect('/admin/activities')->with('status', 'La actividad se eliminó correctamente');
    }
}
