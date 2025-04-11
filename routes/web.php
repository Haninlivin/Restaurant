<?php

use App\Http\Controllers\DishesController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', [OrderController::class, 'index'])->name('order.form');
Route::post('order_submit', [OrderController::class, 'submit'])->name('order.submit');

Route::get('order', [DishesController::class, 'order'])->name('kitchen.order');
Route::get('order/{order}/approve', [DishesController::class, 'approve']);
Route::get('order/{order}/cancel', [DishesController::class, 'cancel']);
Route::get('order/{order}/ready', [DishesController::class, 'ready']);

Route::get('order/{order}/serve', [OrderController::class, 'serve']);

Route::resource('dish', DishesController::class)
    ->name('edit', 'dish.edit')
    ->name('destroy', 'dish.delete')
    ->name('update', 'dish.update')
    ->name('index', 'dish.index')
    ->name('store', 'dish.store')
    ->name('create', 'dish.create');
