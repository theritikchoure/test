<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::orderby('id', 'desc')->get();
        return view('backend.comment', compact('comment'));
    }

    public function status(Request $request, $id, $status)
    {
        $data = Comment::find($id);

        $data->status = $status;
        $data->save();
        return back();
    }

    public function delete($id)
    {
        $comm = Comment::find($id);

        $data = $comm->delete();

        if($data)
        {
            return back()->with('success', 'Comment Deleted');
        }
    }

    
}
