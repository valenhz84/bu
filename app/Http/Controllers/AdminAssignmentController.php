<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Activitie;
use App\Period;
use App\Comment;
use App\File;
use App\User;
use App\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;

class AdminAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s_assignment = $request->get('search');

        $assignments = Assignment::orderBy('created_at','DESC')
                        ->searchAssignment($s_assignment)
                        ->paginate(6);

        return view('admin.assignments.index')->with(compact('assignments','s_assignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activitie::all();
        $users = User::all();
        return view('admin.assignments.create')->with(compact('activities','users'));
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

        $period = Period::orderBy('shortname','DESC')->first();

        $assignment = new Assignment();
        $assignment->name = $request->input('name');
        $assignment->description = $request->input('description');
        $assignment->solution = $request->input('solution');
        $assignment->from = Auth::id();
        $assignment->period_id = $period->id;
        $assignment->activitie_id = $request->input('activitieid');
        $assignment->user_id = $request->input('userid');
        $assignment->save();

        return redirect('admin/assignments')->with('status', 'La tarea se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::findOrFail($id);

        $comments = Comment::where('assignment_id', '=', $assignment->id)->orderBy('created_at','DESC')->get();
        $files = File::where('assignment_id', '=', $assignment->id)->orderBy('created_at','DESC')->get();

        return view('admin.assignments.show')->with(compact('assignment','comments','files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities = Activitie::all();
        $users = User::all();
        $assignment = Assignment::findOrFail($id);

        return view('admin.assignments.edit')->with(compact('assignment','activities','users'));
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
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        $this->validate($request, $rules);

        $assignment = Assignment::find($id);
        $assignment->name = $request->input('name');
        $assignment->description = $request->input('description');
        $assignment->solution = $request->input('solution');
        //$assignment->period_id = $period->id;
        $assignment->activitie_id = $request->input('activitieid');
        $assignment->user_id = $request->input('userid');
        $assignment->save();

        return redirect()->route('assignments.show', [$id])->with('status', 'La tarea se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);
    
        $assignment->delete();
        return redirect('/admin/assignments')->with('status', 'El rol se eliminó correctamente');
    }
}
