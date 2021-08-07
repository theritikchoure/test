<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::first();
        return view('backend.setting.index', compact('data'));
    }

    public function store(Request $request)
    {
        $countData = Setting::count();

        if($countData == 0)
        {
            $data = new Setting();

            $data->comment_auto = $request->comment_auto;
            $data->user_auto = $request->user_auto;
            $data->recent_post_limit = $request->recent_post_limit;
            $data->popular_post_limit = $request->popular_post_limit;
            $data->recent_comment_limit = $request->recent_comment_limit;

            $save = $data->save();
        }
        else
        {
            $firstData = Setting::first();
            $data = Setting::find($firstData->id);
            $data->comment_auto = $request->comment_auto;
            $data->user_auto = $request->user_auto;
            $data->recent_post_limit = $request->recent_post_limit;
            $data->popular_post_limit = $request->popular_post_limit;
            $data->recent_comment_limit = $request->recent_comment_limit;

            $save = $data->save();
        }
        

        if($save)
        {
            return back()->with('success', 'Setting Changes');
        }
    }
}
