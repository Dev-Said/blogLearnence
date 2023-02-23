<?php

use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/home', function () {
    return view('welcome');
})->name('welcome');

Route::get('/logout', function () {
    return view('auth.logout');
})->middleware(['auth'])->name('logout');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); 
})->name('admin.dashboard')->middleware('auth', 'verified');

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/users/{user}/confirm-delete', [UserController::class, 'confirmDelete'])->name('users.confirm-delete');

    Route::resource('users', UserController::class);
});


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('can:create-post-quota');
Route::resource('posts', PostController::class)->except(['create']);

Route::get('/posts/{post}/confirm-delete', [PostController::class, 'confirmDelete'])->name('post.confirm-delete');

Route::get('/test/{locale}', [LangController::class, 'changeLocale'])->name('change-locale');