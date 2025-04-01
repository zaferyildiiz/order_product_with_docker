<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\DiscountController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');   
Route::post('/save_orders', [OrderController::class, 'save_order'])->name('orders.save_order');  
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');   
Route::put('/update_order/{order_id}', [OrderController::class, 'update_order'])->name('orders.update_order');
Route::delete('/delete_order/{order_id}', [OrderController::class, 'delete_order'])->name('orders.delete_order');

//İndirim rotası
Route::post('/order/discounts', [DiscountController::class, 'calculateDiscount']);
