<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $cat = Category::all();
        $post = Post::orderby('id', 'desc')->get();
        return view('backend.post.index', compact('cat', 'post'));
    }

    public function create()
    {
        $cat = Category::all();
        return view('backend.post.create', compact('cat'));
    }

    public function save(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'tags' => 'required',
            'category_id' => 'required',
            'thumb' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $data = new Post();

        if($request->hasFile('thumb'))
        {
            $image = $request->file('thumb');
            $ext = $image->extension();
            $image_name =time().'.'.$ext;
            $image->move(public_path('images/thumb'), $image_name);
            // $image->storeAs('/public/images', $image_name);

            $data->thumb = $image_name;
        }

        if($request->hasFile('full_img'))
        {
            $image1 = $request->file('full_img');
            $ext1 = $image1->extension();
            $image_name1 =time().'.'.$ext1;
            $image1->move(public_path('images/full_img'), $image_name1);
            // $image->storeAs('/public/images', $image_name);

            $data->full_img = $image_name1;
        }

        $data->title = $request->title;
        $data->category_id = $request->category_id;
        $data->tags = $request->tags;
        $data->detail = $request->detail;
        $data->user_id = 0;
        $data->status = 1;

        $data->save();

        return back();
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $cat = Category::all();
        return view('backend.post.edit', compact('data', 'cat'));
    }

    public function update(Request $request, $id)
    {

        $data = Post::find($id);

        if($request->hasFile('thumb'))
        {
            $image = $request->file('thumb');
            $ext = $image->extension();
            $image_name =time().'.'.$ext;
            $image->move(public_path('images/thumb'), $image_name);
            // $image->storeAs('/public/images', $image_name);

            $data->thumb = $image_name;
        }

        if($request->hasFile('full_img'))
        {
            $image1 = $request->file('full_img');
            $ext1 = $image1->extension();
            $image_name1 =time().'.'.$ext1;
            $image1->move(public_path('images/full_img'), $image_name1);
            // $image->storeAs('/public/images', $image_name);

            $data->full_img = $image_name1;
        }

        $data->title = $request->title;
        $data->category_id = $request->category_id;
        $data->tags = $request->tags;
        $data->detail = $request->detail;
        $data->user_id = 0;
        $data->status = 1;        

        $save = $data->save();

        return redirect('admin/post')->with('success', 'Data has been edited');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $data = $post->delete();

        if($data)
        {
            return back()->with('success', 'Post Deleted');
        }
    }

    public function status(Request $request, $id, $status)
    {
        $data = Post::find($id);

        $data->status = $status;
        $data->save();
        return back();
    }
}
