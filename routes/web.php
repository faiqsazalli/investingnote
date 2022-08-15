<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', [PostsController::class, 'index']);

Route::get('/posts/create', [PostsController::class, 'create']);

Route::get('/posts/{post}', [PostsController::class, 'show']);

Route::post('/posts', [PostsController::class, 'store']);

Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);