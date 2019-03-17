<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();

        return view('admin.periods.index')->with(compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.periods.create');
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
            'shortname' => 'required|unique:periods,shortname',
            'startdate' => 'required',
            'duedate' => 'required'
        ];

        $this->validate($request, $rules);

        $period = new Period();
        $period->fullname = $request->input('fullname');
        $period->shortname = $request->input('shortname');
        $period->startdate = $request->input('startdate');
        $period->duedate = $request->input('duedate');
        $period->description = $request->input('description');
        $period->save();

        return redirect('/admin/periods')->with('status', 'El periodo se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $period = Period::findOrFail($id);

        return view('admin.periods.edit')->with(compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'fullname' => 'required',
            'shortname' => 'required|unique:periods,shortname,'.$id,
            'startdate' => 'required',
            'duedate' => 'required'
        ];

        $this->validate($request, $rules);

        $period = Period::find($id);
        $period->fullname = $request->input('fullname');
        $period->shortname = $request->input('shortname');
        $period->startdate = $request->input('startdate');
        $period->duedate = $request->input('duedate');
        $period->description = $request->input('description');
        $period->save();

        return redirect('/admin/periods')->with('status', 'El periodo se actualizó correctamente');
    }

    public function update_active(Request $request, $id)
    {
        $period = Period::find($id);
        
        if($request->input('active')=='on'){ 
            $period->active = 1; 
        }else{
            $period->active = 0;
        }
        $period->timestamps = false;
        $period->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period = Period::find($id);
        $period->delete();

        return redirect('/admin/periods')->with('status', 'El periodo se eliminó correctamente');
    }
}