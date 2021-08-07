<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodoController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('blog_detail');

Route::post('/save-comment/{id}', [HomeController::class, 'save_comment'])->name('save_comment');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('category');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact_me');

Route::middleware(['admincheck'])->group(function () {

    Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [AdminController::class, 'login_check'])->name('admin.login.post');
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //******* Admin Category Route ******//
    Route::resource('admin/category', CategoryController::class);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('admin/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.edit.put');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    //******* Admin Category Route ******//
    Route::get('admin/post', [PostController::class, 'index'])->name('admin.post');
    Route::get('admin/post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('admin/post/create', [PostController::class, 'save'])->name('admin.post.post');
    Route::get('admin/post/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('admin/post/edit/{id}', [PostController::class, 'update'])->name('admin.post.put');
    Route::get('admin/post/delete/{id}', [PostController::class, 'destroy'])->name('admin.post.delete');
    Route::get('admin/post/status/{id}/{status}', [PostController::class, 'status'])->name('admin.post.status');

    Route::get('admin/settings', [SettingController::class, 'index'])->name('admin.setting');
    Route::post('admin/settings', [SettingController::class, 'store'])->name('admin.setting.post');

    Route::get('admin/comments', [CommentController::class, 'index'])->name('admin.comment');
    Route::get('admin/comment/status/{id}/{status}', [CommentController::class, 'status'])->name('admin.comment.status');
    Route::get('admin/comment/delete/{id}', [CommentController::class, 'delete'])->name('admin.comment.status');

    Route::post('admin/dashboard', [TodoController::class, 'store'])->name('admin.todo');
    Route::get('admin/todo/delete/{id}', [TodoController::class, 'destroy'])->name('admin.todo.delete');

    Route::get('admin/messages', [MessageController::class, 'index'])->name('admin.message');
    Route::get('admin/messages/delete/{id}', [MessageController::class, 'destroy'])->name('admin.message.delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');










/***************************************************************************************/

// Route::get('/layout', function () {
//     return view('backend.layout');
// });


// Route::get('admin/login', [AdminController::class, 'login']);
// Route::post('admin/login', [AdminController::class, 'login_check']);
// Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
// Route::get('admin/logout', [AdminController::class, 'logout']);

// //******* Admin Category Route ******//
// Route::resource('admin/category', CategoryController::class);
// Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
// Route::put('admin/category/edit/{id}', [CategoryController::class, 'update']);
// Route::get('admin/category/delete/{id}', [CategoryController::class, 'destroy']);

// //******* Admin Category Route ******//
// Route::get('admin/post', [PostController::class, 'index']);
// Route::get('admin/post/create', [PostController::class, 'create']);
// Route::post('admin/post/create', [PostController::class, 'save']);
// Route::get('admin/post/edit/{id}', [PostController::class, 'edit']);
// Route::put('admin/post/edit/{id}', [PostController::class, 'update']);
// Route::get('admin/post/delete/{id}', [PostController::class, 'destroy']);