<?php

use App\Http\Controllers\DishesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('home');

Route::resource('dish', DishesController::class);
