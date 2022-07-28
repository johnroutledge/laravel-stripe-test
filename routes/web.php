<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PaymentsController;
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

Route::resource('products', ProductsController::class)->except('show', 'edit', 'update', 'destroy');
Route::resource('orders', OrdersController::class)->except('edit', 'update', 'destroy');
Route::get('/getCheckoutSession/{name}/{price}/{id}', [PaymentsController::class, 'getCheckoutSession'])->name('getCheckoutSession');
Route::get('/success', [PaymentsController::class, 'create'])->name('create');
