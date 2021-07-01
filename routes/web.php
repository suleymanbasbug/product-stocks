<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PlatformController;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin']], function(){
    Route::get('/', function () {
        return view('welcome');
    });

});
Route::group(['prefix'=>'admin'],function(){
    Route::get('categories/{id}',[CategoryController::class,'destroy'])->whereNumber('id')->name('categories.destroy');
    Route::resource('categories',CategoryController::class);
    Route::get('brands/{id}',[BrandController::class,'destroy'])->whereNumber('id')->name('brands.destroy');
    Route::resource('brands',BrandController::class);
    Route::get('products/{id}',[ProductContoller::class,'destroy'])->whereNumber('id')->name('products.destroy');
    Route::resource('products',ProductContoller::class);
    Route::resource('colors',ColorController::class);
    Route::resource('platforms',PlatformController::class);
});
Route::get('/admin', function () {
    return view('master');
});
