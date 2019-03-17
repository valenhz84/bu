<?php

namespace App\Http\Controllers;

use App\File;
use App\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        if($request->file('file') == NULL){
            return redirect()->route('assignments.show', [$id])->withErrors('Ocurrio un error al enviar el archivo');
        }else{

        $file = $request->file('file');
	    $fileName = $file->getClientOriginalName();
        $path = $file->store('assignments','public');
        
        $assignment = Assignment::find($id);
        
        $file = new File();
        $file->name = $fileName;
        $file->path = $path;
        $file->assignment_id = $assignment->id;
        $file->user_id = Auth::user()->id;
        $file->save();

        return redirect()->route('assignments.show', [$id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        //ruta -> storage/app/public
        Storage::delete('/public/'.$file->path);
        $file->delete();

        return back();
    }
}
