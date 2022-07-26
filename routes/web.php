<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PaymentsController;

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
//Route::resource('payments', PaymentsController::class)->except('show', 'edit', 'update', 'destroy');

Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');
//Route::post('/payments', [PaymentsController::class, 'store'])->name('payments.store');

Route::get('/getCheckoutSession/{name}/{price}', [PaymentsController::class, 'getCheckoutSession'])->name('getCheckoutSession');

Route::get('/success', function() { return view('products.index');});
//Route::get('/cancel', function() { return view('products.index');});
