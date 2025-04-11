<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;


Route::get('/', function () {
    return view('homepage');
});

Route::get('/product-details', function () {
    return view('product_details');
})->name('product_details');

Route::get('/', [MealController::class, 'index'])->name('meals.index');
Route::get('/meals', [MealController::class, 'index'])->name('meals.index');
Route::get('/test-api', [MealController::class, 'testApi']);

require __DIR__.'/auth.php';
