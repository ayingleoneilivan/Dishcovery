<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Existing Routes
Route::get('/product-details', function () {
    return view('product_details');
})->name('product_details');

Route::get('/', function () {
    return view('auth.login');
});
Route::view('/about', 'about')->name('about');

Route::get('/meals', [MealController::class, 'index'])->name('meals.index');
Route::get('/test-api', [MealController::class, 'testApi']);
Route::post('/favorite/toggle', [FavoriteController::class, 'toggle'])->name('favorite.toggle')->middleware('auth');
Route::get('/favorites', [FavoriteController::class, 'index'])
    ->name('favorites.index')
    ->middleware('auth');
Route::get('/meal/{id}', [MealController::class, 'show'])->name('meal.details');
//temporary
Route::get('/meals/search', [MealController::class, 'search'])->name('meals.search');

require __DIR__.'/auth.php';
