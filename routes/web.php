<?php

use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Http\Request;

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
Auth::routes();
Route::post('save_post/{post}', 'App\Http\Controllers\SavesController@store');
Route::post('follow/{user}', 'App\Http\Controllers\FollowsController@store');
Route::get('follow/{user}/show', 'App\Http\Controllers\FollowsController@index');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/search/price', [App\Http\Controllers\HomeController::class, 'searchbyprice'])->name('search');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{i}', [App\Http\Controllers\HomeController::class, 'pages'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show'); 
Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create'])->name('post.create'); 
Route::post('/post/store', 'App\Http\Controllers\PostsController@store');

Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post.show'); 
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit'); 
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update'); 
Route::get('/p/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('post.edit'); 
Route::patch('/p/{post}', [App\Http\Controllers\PostsController::class, 'update'])->name('post.update'); 
Route::get('/delete/{post}', [App\Http\Controllers\PostsController::class, 'delete'])->name('post.delete'); 
Route::post('/sent/{post}', [App\Http\Controllers\CommentsController::class, 'store'])->name('comment.store'); 
Route::get('/feedback/create', [App\Http\Controllers\FeedbacksController::class, 'create'])->name('feedback.create'); 
Route::post('/feedback', [App\Http\Controllers\FeedbacksController::class, 'store'])->name('feedback.store');

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});
Route::get('/saved_posts', [App\Http\Controllers\PostsController::class, 'saved_posts']);
Route::get('/introduction', [App\Http\Controllers\HomeController::class, 'introduction'])->name('home.introduction'); 
// Route::post('/follow/{user}', function () {
//     return ['àl'];
//     // return auth()->user()->following()->toggle($user->profile);

// });