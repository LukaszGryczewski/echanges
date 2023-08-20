<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
//use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
})->name('welcome');

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

Route::get('admin/user', [AdminUserController::class, 'index'])
    ->name('admin.user.index');
Route::delete('admin/user/{id}', [AdminUserController::class, 'adminDestroy'])
    ->name('admin.user.adminDestroy');
Route::get('admin/user/{id}', [AdminUserController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('admin.user.show');
Route::get('admin/user/search', [AdminUserController::class, 'search'])
    ->name('admin.user.search');
Route::get('/admin/products', [AdminProductController::class, 'index'])
    ->middleware('auth')
    ->name('admin.product.index');
Route::get('admin/create-product', [AdminProductController::class, 'create'])
    ->name('admin.product.create');
Route::post('admin/product', [AdminProductController::class, 'store'])
    ->name('admin.product.store');
Route::delete('admin/product/{id}', [AdminProductController::class, 'destroy'])
    ->where('id', '[0-9]+')
    ->name('admin.product.delete');
Route::get('admin/product/edit/{id}', [AdminProductController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->name('admin.product.edit');
Route::put('admin/product/{id}', [AdminProductController::class, 'update'])
    ->where('id', '[0-9]+')
    ->name('admin.product.update');

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
Route::get('/user/update-password/{id}', [UserController::class, 'showUpdatePasswordForm'])
    ->where('id', '[0-9]+')
    ->name('user.update-password');
Route::put('/user/update-password/{id}', [UserController::class, 'updatePassword'])
    ->where('id', '[0-9]+')
    ->name('user.updatepassword');
Route::delete('/user/{id}', [UserController::class, 'destroy'])
    ->name('user.destroy');



Route::get('/product', [ProductController::class, 'index'])
    ->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('product.show');
Route::get('/create-product', [ProductController::class, 'create'])
    ->name('product.create');
Route::post('/product', [ProductController::class, 'store'])
    ->name('product.store');


Route::get('/products/search', [ProductController::class, 'search'])
    ->name('product.search');

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


Route::post('/cart/add/{productId}', [CartController::class, 'addProduct'])
    ->name('cart.addProduct');
Route::delete('/cart/remove/{productId}', [CartController::class, 'removeProduct'])
    ->name('cart.removeProduct');
Route::post('/cart/{productId}/update', [CartController::class, 'updateProduct'])
    ->name('cart.updateProduct');
Route::get('/cart', [CartController::class, 'show'])
    ->name('cart.show');

Route::get('/order/confirm', [OrderController::class, 'confirm'])
    ->name('order.confirm');
Route::get('/order/address-payment', [OrderController::class, 'addressPayment'])
    ->name('order.address-payment');
Route::post('/order/finalize', [OrderController::class, 'finalize'])
    ->name('order.finalize');

Route::post('/payment/{orderId}', [PaymentController::class, 'processPayment'])
    ->name('payment.process');
Route::get('/payment/form/{orderId}', [PaymentController::class, 'showPaymentForm'])
    ->name('payment.show');
Route::get('/payment/success', [PaymentController::class, 'success'])
    ->name('payment.success');
Route::get('/payment/failed', [PaymentController::class, 'failed'])
    ->name('payment.failed');



Route::get('/invoice/{invoiceId}', [InvoiceController::class, 'showInvoice'])
    ->name('invoice.show');
Route::get('/invoice/download/{invoiceId}', [InvoiceController::class, 'downloadInvoice'])
    ->name('invoice.download')->middleware('auth');
    Route::get('/seller-invoice/{invoiceId}', [InvoiceController::class,'showSellerInvoice'])
    ->name('invoice.seller-show');

//Multilanguage
Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])
    ->name('set-locale');



require __DIR__ . '/auth.php';
