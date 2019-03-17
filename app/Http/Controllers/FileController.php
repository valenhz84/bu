<?php

namespace App\Http\Controllers;

use App\File;
use App\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if($request->file('file') == NULL){
            return redirect()->route('tasks.show', [$id])->withErrors('Ocurrio un error al enviar el archivo');
        }else{

        $file = $request->file('file');
	    $fileName = $file->getClientOriginalName();
        $path = $file->store('assignments','public');
        
        $task = Assignment::find($id);
        
        $file = new File();
        $file->name = $fileName;
        $file->path = $path;
        $file->assignment_id = $task->id;
        $file->user_id = Auth::id();
        $file->save();

        return redirect()->route('tasks.show', [$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
