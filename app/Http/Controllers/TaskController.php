<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Activitie;
use App\Period;
use App\Comment;
use App\File;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s_task = $request->get('search'); 
        
        $tasks = DB::table('assignments')
            ->join('users', 'users.id', '=', 'assignments.user_id')
            ->join('periods', 'periods.id', '=', 'assignments.period_id')
            ->where('assignments.user_id', '=', Auth::id())
            ->where('periods.active', '=', 1)
            ->where('assignments.deleted_at', '=', NULL)
            ->where('assignments.name', 'LIKE', "%{$s_task}%")
            ->orderBy('assignments.created_at','DESC')
            ->select('assignments.*','periods.shortname')
            ->paginate(6);
        //$tasks = Assignment::all();

        return view('index')->with(compact('tasks','s_task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activitie::all();
        return view('tasks.create')->with(compact('activities'));
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
            'name' => 'required'
        ];

        $this->validate($request, $rules);

        $period = Period::orderBy('shortname','DESC')->first();

        $task = new Assignment();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->solution = $request->input('solution');
        $task->from = Auth::id();
        $task->period_id = $period->id;
        $task->activitie_id = $request->input('activitieid');
        $task->user_id = Auth::id();
        $task->save();

        return redirect('/')->with('status', 'La tarea se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Assignment::findOrFail($id);

        $comments = Comment::where('assignment_id', '=', $task->id)->orderBy('created_at','DESC')->get();
        $files = File::where('assignment_id', '=', $task->id)->orderBy('created_at','DESC')->get();

        return view('tasks.show')->with(compact('task','comments','files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities = Activitie::all();
        $task = Assignment::findOrFail($id);

        return view('tasks.edit')->with(compact('task','activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        $this->validate($request, $rules);

        $assignment = Assignment::findOrFail($id);
        $assignment->name = $request->input('name');
        $assignment->description = $request->input('description');
        $assignment->solution = $request->input('solution');
        $assignment->activitie_id = $request->input('activitieid');
        //$assignment->user_id = Auth::user()->id;
        $assignment->save();

        return redirect()->route('tasks.show', [$id])->with('status', 'La tarea se actualizó correctamente');
    }

    public function update_status(Request $request, $id)
    {
        $task = Assignment::findOrFail($id);
        $task->status = $request->input('task_status');
        $task->timestamps = false;
        $task->save();

        return redirect()->route('tasks.show', [$id])->with('status', 'El estado se actualizó correctamente');
    }

    public function update_active(Request $request, $id)
    {
        $task = Assignment::findOrFail($id);
        
        if($request->input('active')=='on'){
            $task->active = 1; 
        }else{
            $task->active = 0;
        }
        $task->timestamps = false;
        $task->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Assignment::findOrFail($id);
    
        $task->delete();
        return redirect('/tasks')->with('status', 'La tarea se eliminó correctamente');
    }
}
