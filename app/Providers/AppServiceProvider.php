<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::share('recent_posts', \App\Models\Post::orderBy('id', 'desc')->limit(5)->get());
        View::share('popular_posts', \App\Models\Post::orderBy('views', 'desc')->limit(5)->get());
        View::share('categories', \App\Models\Category::orderBy('id', 'desc')->limit(5)->get());
    }
}
