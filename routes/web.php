<?php

use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepartmentsController;

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
    return view('layouts.home');
})->name('home');
Route::get('/page/{slug}', [PageController::class , 'pageSingle'])->name('page');

// // Translation

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
    session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang');


// login & register & logout

Route::get('/login-page' , [AuthController::class , 'loginPage'])->middleware('guest')->name('login-page');
Route::get('/register-page' , [AuthController::class , 'registerPage'])->middleware('guest')->name('register-page');
Route::post('/login' , [AuthController::class , 'login'])->middleware('guest')->name('login');
Route::post('/register' , [AuthController::class , 'register'])->middleware('guest')->name('register');
Route::get('logout' , [AuthController::class , 'logout'])->middleware('auth')->name('logout');
Route::get('/forgot-password', [AuthController::class , 'forgotPassword'])->name('forgot-password');


// // Departments 
Route::get('/departments', [DepartmentsController::class , 'index'])->name('departments');


// Posts

Route::get('posts/{id}', [PostController::class , 'index' ])->name('web.posts');
Route::get('posts/{id}/create', [PostController::class , 'create' ])->name('web.posts.create');