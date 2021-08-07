<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {

        $data = new Todo();

        $data->todo = $request->todo;
        $save = $data->save();

        return back();
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);

        $data = $todo->delete();

        if($data)
        {
            return back();
        }
    }
}
