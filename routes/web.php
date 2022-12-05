<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Cache;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home')->middleware('auth');

Route::resource('brands', BrandController::class);
Route::post('brands/delete', [BrandController::class,'delete'])->name('brands.delete');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);


Route::get('/', function(){
    return view('welcome');
});









