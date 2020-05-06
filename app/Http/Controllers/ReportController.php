<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Assignment;
use App\Activitie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'startdate' => 'required',
            'duedate' => 'required'
        ];

        $this->validate($request, $rules);

        $startdate = $request->input('startdate');
        $duedate = $request->input('duedate');

        $html = $this->pdf($startdate, $duedate);
        $namefile = Auth::user()->firstname.'_'.Carbon::now()->format('Y-m-d').'.pdf';
 
        $mpdf = new Mpdf();

        $mpdf->SetDisplayMode('fullpage');
        // Write some HTML code:
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $mpdf->Output($namefile,"D");
    }

    public function pdf($startdate, $duedate){
        $tasks = Assignment::where('user_id',Auth::id())
                     ->where('active', 1)
                     ->where('status', 1)
                     ->whereDate('created_at', '>=', $startdate)
                     ->whereDate('created_at', '<=', $duedate)
                     ->get();
         //$users = DB::table('assignments')->distinct()->get();
 
         //$activities = Activitie::where('id',$assignments->activitie_id)->distinct()->get();
 
         return view('reports.tasks.store')->with(compact('tasks'));
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
