<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [PagesController::class, 'showHomePage']);
Route::get('/posts', [PostsController::class, 'getAllPosts']);
Route::get('/post/{id}', [PostsController::class, 'getPostById']);
Route::get('/posts/user/{userId}', [PostsController::class, 'getPostsByUser']);
Route::get('/posts/category/{categoryId}', [PostsController::class, 'getPostsByCategory']);
Route::get('/posts/search/{keyword}', [PostsController::class, 'getPostsBySearchTerm']);

Route::post('/admin/post', [PostsController::class, 'createNewPost']);
Route::put('/admin/post/{id}', [PostsController::class, 'updatePost']);
Route::delete('/admin/post/{id}', [PostsController::class, 'deletePost']);


