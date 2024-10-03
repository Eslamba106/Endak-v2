<?php

use App\Http\Controllers\Api\RatingApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\MessageApiController;

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

Route::get('/{dapartment_id}/posts', [PostController::class ,'index'])->name('all_posts');
Route::post('/posts/store', [PostController::class ,'store'])->name('post.store');


// Departments 

Route::get('/departments' ,[DepartmentController::class , 'index'])->name('api.departments');
Route::get('/departments/{id}' ,[DepartmentController::class , 'childern'])->name('api.departments.childern');
Route::get('/departments/show_post_inputs/{id}' ,[DepartmentController::class , 'showDepartment'])->name('api.departments.show');

// Categories 

Route::get('/categories' ,[CategoryController::class , 'index'])->name('api.Categories');
Route::get('/categories/{id}' ,[CategoryController::class , 'childern'])->name('api.Categories.childern');


// Comments

Route::post('/comments/create' , [CommentController::class , 'store'])->name('api.comments.store');
Route::get('/comments/{id}' , [CommentController::class , 'index'])->name('api.comments');


// Orders 

Route::group(['prefix' => 'orders'], function () {

    Route::post('/create' , [OrderApiController::class , 'store'])->name('api.orders.store')->middleware('auth:sanctum');
    Route::get('/{id}' , [OrderApiController::class , 'myOrders'])->name('api.orders')->middleware('auth:sanctum');

});


// Messages 

Route::group(['prefix' => 'messages'], function () {
    Route::get('/conversation' , [MessageApiController::class , 'conversation'])->name('api.messages.myconversation')->middleware('auth:sanctum');
    Route::post('/send' , [MessageApiController::class , 'store'])->name('api.messages.store')->middleware('auth:sanctum');
    Route::get('/{recipient_id}' , [MessageApiController::class , 'myMessage'])->name('api.messages')->middleware('auth:sanctum');

});

// Rating


Route::post('/rating' , [RatingApiController::class , 'store'])->name('api.rating');
