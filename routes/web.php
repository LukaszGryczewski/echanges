<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/user', [UserController::class, 'index'])
    ->name('user.index');
Route::get('/user/{id}', [UserController::class, 'show'])
	->where('id', '[0-9]+')->name('user.show');

Route::get('/product', [ProductController::class, 'index'])
    ->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])
	->where('id', '[0-9]+')->name('product.show');
Route::get('/my-product', [ProductController::class, 'showProductsPerUser'])
    ->middleware('auth')
    ->name('product.userProduct');

require __DIR__.'/auth.php';
