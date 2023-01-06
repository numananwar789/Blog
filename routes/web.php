<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

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



// Backend Route

// Route::get('admin/dashboard', [AdminController::class, 'index']);



Auth::routes();

Route::view('/', 'welcome');

Route::resource('/posts', PostsController::class);

// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::view('/create', 'create');
// Route::post('create-post', [HomeController::class, 'createPost'])->name('create');
// Route::get('home/{slug}', [HomeController::class, 'showPost']);
// Route::get('home/{slug}/edit', [HomeController::class, 'edit']);
// Route::post('home/{slug}', [HomeController::class, 'editPost'])->name('home.edit');
// Route::post('home/{slug}', [HomeController::class, 'editPost'])->name('home.delete');
