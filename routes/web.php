<?php

use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\RatingUserController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\MessageUserController;

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
    return view('front_office.home');
})->name('home');
Route::get('/page/{slug}', [PageController::class , 'pageSingle'])->name('page');
Route::get('/search', [SearchController::class, 'index'])->name('search');

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
Route::get('/departments/{id}', [DepartmentsController::class , 'show'])->name('departments.show');


// Posts

Route::get('posts/{id}', [PostController::class , 'index' ])->name('web.posts');
Route::get('posts/show/{id}', [PostController::class , 'show' ])->name('web.posts.show');
Route::get('posts/{id}/create', [PostController::class , 'create' ])->name('web.posts.create');
Route::get('posts/upload_video', [PostController::class , 'uploadLargeFiles' ])->name('web.files.upload.large');
Route::post('posts/store', [PostController::class , 'store' ])->name('web.posts.store');
Route::get('posts/my_posts/{id}', [PostController::class , 'my_posts' ])->name('web.posts.my_posts');

// Comments

Route::post('/comments/create' , [CommentController::class , 'store'])->name('comments.store');

// Orders  my_orders
Route::get('order/my_orders/{id}' , [OrderUserController::class , 'my_orders'])->name('web.order.my_orders');
Route::post('/order/create' , [OrderUserController::class , 'store'])->name('web.order.save');
Route::get('/order/{id}' , [OrderUserController::class , 'show_order'])->name('web.order.view');
Route::post('/order/complete' , [OrderUserController::class , 'finish'])->name('web.order.finish');
// Rating 
Route::get('/profile/{id}' ,[ProfileController::class , 'show'] )->name('web.profile');
Route::get('/profile/edit/{id}' ,[ProfileController::class , 'edit'] )->name('web.profile.edit');
Route::post('/profile/update' ,[ProfileController::class , 'update'] )->name('web.profile.update');

// Users 

Route::get('/service_provider' , [ProfileController::class , 'users'])->name('web.user.service_provider');

// Order Rating 

Route::get('/add_rate/{id}' , [RatingUserController::class , 'add_rate'])->name('web.add_rate');
Route::post('/web-rate/store' , [RatingUserController::class , 'store'])->name('web.add_rate.store');

// Messages web.send_message

Route::get('/send_message/{id}' , [MessageUserController::class , 'send'])->name('web.send_message');
Route::post('/send' , [MessageUserController::class , 'store'])->name('messages.store')->middleware('auth');
// order item 

Route::post('/order/items' , [OrderUserController::class , 'product_order'])->name('order_item');