<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

    Route::get('buy-product', [ProductsController::class, 'show'])->name('buyProduct');

    // Route::post('pay-for-book', [PurchaseController::class, 'store'])->name('payForBook');

    // Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchase-list');
   
    // Route::get('/delete-purcahse', [PurchaseController::class, 'destroy'])->name('delete-purchase');
    
    // Route::get('/view-profile', [UsersController::class, 'index'])->name('viewProfile');
    // Route::post('/update-profile', [UsersController::class, 'update'])->name('updateProfile');
    
});

