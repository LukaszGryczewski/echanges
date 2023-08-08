<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('profile.change-password');
    Route::put('/profile/update-password', [PasswordController::class, 'update'])->name('profile.update-password');
});

Route::get('/user', [UserController::class, 'index'])
    ->name('user.index');
Route::get('/user/{id}', [UserController::class, 'show'])
	->where('id', '[0-9]+')
    ->name('user.show');
Route::get('/profile', [UserController::class, 'profile'])
    ->name('user.profile');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])
	->where('id', '[0-9]+')
    ->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])
	->where('id', '[0-9]+')
    ->name('user.update');

Route::get('/product', [ProductController::class, 'index'])
    ->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])
	->where('id', '[0-9]+')
    ->name('product.show');
Route::get('/create-product', [ProductController::class, 'create'])
    ->name('product.create');
Route::post('/product', [ProductController::class, 'store'])
    ->name('product.store');
Route::get('/my-product', [ProductController::class, 'showProductsPerUser'])
    ->middleware('auth')
    ->name('product.userProduct');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])
	->where('id', '[0-9]+')
    ->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])
	->where('id', '[0-9]+')
    ->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])
	->where('id', '[0-9]+')
    ->name('product.delete');

Route::post('/product/{product_id}/comment', [CommentController::class, 'store'])
    ->where('product_id', '[0-9]+')
    ->name('comment.store');
Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->middleware('auth')
    ->name('comment.edit');
Route::put('/comment/{id}', [CommentController::class, 'update'])
    ->where('id', '[0-9]+')
    ->middleware('auth')
    ->name('comment.update');
Route::delete('/comment/{id}', [CommentController::class, 'destroy'])
	->where('id', '[0-9]+')
    ->name('comment.delete');

require __DIR__.'/auth.php';
