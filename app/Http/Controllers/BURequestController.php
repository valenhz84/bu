<?php

namespace App\Http\Controllers;

use App\BURequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BURequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s_burequest = $request->get('search');

        $burequests = BURequest::orderBy('created_at','DESC')
                                ->where('from', Auth::id())
                                ->orWhere('to', Auth::id())
                                ->searchBURequest($s_burequest)
                                ->paginate(6);

        
        return view('requests.index')->with(compact('burequests','s_burequest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id','!=',Auth::id())->get();

        return view('requests.create')->with(compact('users'));
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
            'name' => 'required',
            'description' => 'required'
        ];

        $this->validate($request, $rules);

        $burequest = new BURequest();
        $burequest->name = $request->input('name');
        $burequest->description = $request->input('description');
        $burequest->from = Auth::user()->id;
        $burequest->to = $request->input('userid');
        $burequest->save();

        return redirect('/requests')->with('status', 'La solicitud se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BURequest  $bURequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BURequest  $bURequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BURequest  $bURequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function update_status(Request $request, $id)
    {
        $burequest = BURequest::findOrFail($id);
        $burequest->status = $request->input('burequest_status');
        $burequest->timestamps = false;
        $burequest->save();

        return redirect('/requests')->with('status', 'El estado se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BURequest  $bURequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $burequest = BURequest::find($id);
        $burequest->delete();

        return redirect('/requests')->with('status', 'La solicitud se eliminó correctamente');
    }
}
