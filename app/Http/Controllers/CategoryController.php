<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();
        $request->validate([
            'title' => 'required',
        ]);

        $cat = new Category();

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            // $reImage1 = time().'.'.$image->getClientOriginalExtension();
            // $dest = public_path('/images');
            // $image->move($dest, $reImage1);

            $imageName = time().'.'.$image->extension();  
            $thumb = $request->image->move(public_path('images'), $imageName);
        
        }

        

        $cat->title = $request->title;
        $cat->detail = $request->detail;
        $cat->image = $imageName;
        $cat->status = '1';

        $save = $cat->save();

        return redirect()->back()->with('success', 'Data has been added');

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
        $data = Category::find($id);

        return view('backend.category.edit', compact('data'));
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

        $data = Category::find($id);

        $request->validate([
            'image' => [Rule::unique('categories')->ignore($data->id)],
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $reImage);
        }
        else
        {
            $reImage = $request->image;
        }

        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->image = $reImage;

        $save = $data->save();

        return redirect('admin/category')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);

        $data = $cat->delete();

        if($data)
        {
            return back()->with('success', 'Category Deleted');
        }
    }
}
