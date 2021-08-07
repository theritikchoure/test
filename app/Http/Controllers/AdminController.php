<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Todo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Login View
    public function login()
    {
        return view('backend.login');
    }

    public function login_check(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $userCheck = Admin::where(['username' => $request->username, 'password' => $request->password])->count();

        if($userCheck>0)
        {
            $adminData = Admin::where(['username' => $request->username, 'password' => $request->password])->first();
            session(['adminData' => $adminData]);

            return redirect('admin/dashboard');
        }
        else
        {
            return back()->with('error', 'Credentails are wrong, try again!!');
        }
    }

    public function dashboard()
    {
        $data = Post::where('status', 1)->orderby('id', 'desc')->take(1)->get();
        $todo = Todo::all();
        $msg =  Contact::orderby('id', 'desc')->take(5)->get();
        return view('backend.dashboard', compact('data', 'todo', 'msg'));
    }

    public function logout()
    {
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    public function dash()
    {
        $data = Post::where('status', 1)->orderby('id', 'desc')->take(2)->get();
        return view('backend.dashboard', compact('data'));
    }
}
