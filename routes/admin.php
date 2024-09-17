<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;

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



Route::get('/dashboard' , [DashboardController::class , 'index'])->name('admin.dashboard');

// roles

Route::group(['prefix' => 'roles'], function () {
    Route::get('/', [RoleController::class ,'index'])->name('admin.roles');
    Route::get('/create', [RoleController::class ,'create'])->name('admin.roles.create');
    Route::post('/store', [RoleController::class ,'store'])->name('admin.roles.store');
    Route::get('/{id}/edit', [RoleController::class ,'edit'])->name('admin.roles.edit');
    Route::post('/{id}/update', [RoleController::class ,'update'])->name('admin.roles.update');
    Route::delete('/delete', [RoleController::class ,'destroy'])->name('admin.roles.delete');
});


// Settings 

Route::group(['prefix' => 'settings'], function () {

    Route::get('/' , [SettingsController::class , 'index'])->name('admin.settings');
    Route::get('/edit/{setting}' , [SettingsController::class , 'edit'])->name('admin.settings.edit');
    Route::put('/update/{setting}' , [SettingsController::class , 'update'])->name('admin.settings.update');
});

// Categories 
Route::group(['prefix' => 'categories'], function () {

    Route::get('/' , [CategoryController::class , 'index'])->name('admin.categories');
    Route::get('/create', [CategoryController::class ,'create'])->name('admin.categories.create');
    Route::post('/create', [CategoryController::class ,'store'])->name('admin.categories.store');
    Route::get('/edit/{category}' , [CategoryController::class , 'edit'])->name('admin.categories.edit');
    Route::get('/show/{slug}' , [DepartmentController::class , 'show'])->name('admin.categories.show');
    Route::post('/edit/{category}' , [CategoryController::class , 'update'])->name('admin.categories.update');
    Route::post('update_top_categories', 'CategoriesController@update_top_categories')->name('update_top_categories');
    Route::get('/delete/{slug}', [CategoryController::class ,'destroy'])->name('admin.categories.delete');

});


// Pages
Route::group(['prefix' => 'pages'], function () {

    Route::get('/' , [PageController::class , 'index'])->name('admin.pages');
    Route::get('/create', [PageController::class ,'create'])->name('admin.pages.create');
    Route::post('/create', [PageController::class ,'store'])->name('admin.pages.store');
    Route::get('/show/{slug}' , [PageController::class , 'show'])->name('admin.pages.show');
    Route::get('/edit/{setting}' , [PageController::class , 'edit'])->name('admin.pages.edit');
    Route::put('/update/{id}' , [PageController::class , 'update'])->name('admin.pages.update');
    Route::delete('/delete', [PageController::class ,'destroy'])->name('admin.pages.delete');

});

// Departments
Route::group(['prefix' => 'departments'], function () {

    Route::get('/' , [DepartmentController::class , 'index'])->name('admin.departments');
    Route::get('/create', [DepartmentController::class ,'create'])->name('admin.departments.create');
    Route::post('/create', [DepartmentController::class ,'store'])->name('admin.departments.store');
    Route::get('/show/{slug}' , [DepartmentController::class , 'show'])->name('admin.departments.show');
    Route::get('/edit/{category}' , [DepartmentController::class , 'edit'])->name('admin.departments.edit');
    Route::post('/edit/{category}' , [DepartmentController::class , 'update'])->name('admin.departments.update');
    Route::post('update_top_departments', 'DepartmentController@update_top_departments')->name('update_top_departments');
    Route::get('/delete/{slug}', [DepartmentController::class ,'destroy'])->name('admin.departments.delete');

});