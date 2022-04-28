<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;


use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\GithubController;
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

Route::get('/', function () {
    return view('auth.login');
});



Route::group(['middleware' => ['auth:web']],function(){
    Route::get('/posts',[PostController::class,'index'])->name('posts.index');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts',[PostController::class,'store'])->name('posts.store');
    Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}/comments',[PostController::class,'show'])->name('posts.show');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');
    Route::get('/posts/{post}/comments/create',[CommentController::class,'create'])->name('comments.create');
    Route::post('/posts/{post}/comments',[CommentController::class,'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit',[CommentController::class,'edit'])->name('comments.edit');
    Route::put('/comments/{comment}',[CommentController::class,'update'])->name('comments.update');
    Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');

});
Route::get('/auth/github/redirect',[GithubController::class,'handle_github_redirect']);

Route::get('/auth/github/callback', [GithubController::class,'handle_github_redirect']);
    
Route::get('/auth/google/redirect',[GoogleController::class,'handle_google_redirect'] );
    
Route::get('auth/google/callback',[GoogleController::class,'handle_google_callback']);
 

    






//to do 


//update title directly  to be unique




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
