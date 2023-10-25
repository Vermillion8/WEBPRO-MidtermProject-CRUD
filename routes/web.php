<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;

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

Route::get('/', [PostController::class, 'index']);

Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/profile/{user:username}', [ProfileController::class, 'index']);

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::post('/changeprofile', [ProfileController::class, 'change_profile'])->middleware('auth');
Route::post('/savechangeprofile', [ProfileController::class, 'save_change_profile'])->middleware('auth');

Route::get('/newpost', [PostController::class, 'newpost'])->middleware('auth');
Route::post('/newpost', [PostController::class, 'store'])->middleware('auth');
Route::post('/deletepost', [PostController::class, 'destroy'])->middleware('auth');
Route::post('/editpost', [PostController::class, 'edit'])->middleware('auth');
Route::post('/saveeditpost', [PostController::class, 'save_edit'])->middleware('auth');

Route::post('/addcomment', [CommentController::class, 'store'])->middleware('auth');