<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\productoutController;
use App\Http\Controllers\productinController;
use App\Http\Controllers\supplierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("/categories",CategorieController::class);
Route::resource("/products",ProductController::class);
Route::resource("/customers",customerController::class);
Route::resource("/suppliers",supplierController::class);
Route::resource("/productsOut",productoutController::class);
Route::resource("/productsIn",productinController::class);

