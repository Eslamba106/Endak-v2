<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login' , [AuthController::class , 'login'])->name('api_login');
Route::post('/register' , [AuthController::class , 'register'])->name('api_register');
Route::get('/logout', [AuthController::class , 'logout'])->name('api_logout')->middleware('auth:sanctum');

Route::get('/posts', [PostController::class ,'index'])->name('all_posts');
Route::post('/posts/store', [PostController::class ,'store'])->name('post.store');