<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;

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

Route::get('/', [SiteController::class, "index"]);

Route::prefix('/users')->group(function () {
  Route::get('/viewall/{type?}', [UserController::class, "ViewAll"])->name('users-viewall');
  Route::post('/save', [UserController::class, "save"])->name('users-store');
  Route::get('/edit/{id?}', [UserController::class, "edit"])->name('users-edit');
  Route::get('/delete/{id}', [UserController::class, "delete"])->name('users-delete');
});

Route::prefix('/products')->group(function () {
  Route::get('/viewall', [ProductController::class, "ViewAll"])->name('products-viewall');
  Route::post('/save', [ProductController::class, "save"])->name('products-store');
  Route::get('/edit/{id?}', [ProductController::class, "edit"])->name('products-edit');
  Route::get('/delete/{id}', [ProductController::class, "delete"])->name('products-delete');
});


Route::prefix('/orders')->group(function () {
  Route::get('/viewnews', [OrdersController::class, "viewnews"])->name('orders-viewnews');
  Route::get('/viewall', [OrdersController::class, "viewall"])->name('orders-viewall');
  Route::get('/Set/{id}/{to}', [OrdersController::class, "set"])->name('orders-set');
});

