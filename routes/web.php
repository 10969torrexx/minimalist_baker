<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('order-detail', [ProductsController::class, 'show'])->name('buyProduct');

    Route::post('confirm-order', [OrdersController::class, 'store'])->name('confirmOrder');

    Route::get('orders-list', [OrdersController::class, 'index'])->name('ordersList');
    
    Route::get('delete-order', [OrdersController::class, 'delete'])->name('deleteOrder');

    
    Route::get('/user-profile', [UsersController::class, 'index'])->name('userProfile');

    Route::post('/info-change', [UsersController::class, 'update'])->name('updateProfile');
});

