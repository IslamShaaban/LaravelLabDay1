<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

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
    return view('welcome');
});

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create',[PostsController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/posts',[PostsController::class, 'store'])->name('posts.store');