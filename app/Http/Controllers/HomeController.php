<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search'))
        {
            $search = $request->search;
            $post = Post::where('title', 'like', '%'.$search.'%')->orderby('id', 'desc')->get();
        }
        else
        {
            $post = Post::orderby('id', 'desc')->take(2)->get();
        }
        return view('welcome', compact('post'));
    }

    public function detail(Request $request, $id)
    {
        Post::find($id)->increment('views');
        $detail = Post::find($id);
        return view('detail', compact('detail'));
    }

    public function save_comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $data = new Comment();

        $data->user_id = $request->user()->id;
        $data->post_id = $id;
        $data->comment = $request->comment;

        $save = $data->save();

        if($save)
        {
            return back()->with('success', 'Comment Has Been Submitted!!');
        }
    }

    public function blog()
    {
        
        $blog = Post::orderby('id', 'desc')->get();
        return view('blog', compact('blog'));
    }

    public function category($category)
    {
        
        if($category)
        {
            $post = Post::where('category_id', $category)->orderby('id', 'desc')->get();
        }

        return view('category', compact('post'));
    }

    public function about()
    {
        
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
