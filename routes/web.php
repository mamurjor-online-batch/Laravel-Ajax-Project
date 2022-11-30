<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')->middleware('auth');

Route::resource('brands', BrandController::class);
Route::post('brands/delete', [BrandController::class,'delete'])->name('brands.delete');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);









