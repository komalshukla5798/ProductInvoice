<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/orders', [App\Http\Controllers\InvoiceDetailController::class, 'index'])->name('orders.index');
Route::get('/order/{order}', [App\Http\Controllers\InvoiceDetailController::class, 'edit'])->name('orders.edit');
Route::post('/orders', [App\Http\Controllers\InvoiceDetailController::class, 'store'])->name('orders.store');
Route::delete('/order/{order}', [App\Http\Controllers\InvoiceDetailController::class, 'destroy'])->name('orders.destroy');
