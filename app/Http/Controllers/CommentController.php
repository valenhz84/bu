<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $rules = [
            'comment' => 'required'
        ];

        $this->validate($request, $rules);

        $task = Assignment::find($id);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->assignment_id = $task->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
    
        $comment->delete();
        return back();
    }
}
