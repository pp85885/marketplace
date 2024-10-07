<?php

use App\Http\Controllers\{AuthController, HomeController, ProductController};
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// guest routes
Route::middleware('guest')->group(function () {
    Route::get('sign-up', [AuthController::class, 'signUpPage'])->name('signup.page');
    Route::post('sign-validate', [AuthController::class, 'signUpValidate'])->name('signup.validate');

    // Login routes
    Route::get('login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('login-validate', [AuthController::class, 'loginValidate'])->name('login.validate');
});


// authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('logout', [HomeController::class, 'logout'])->name('logout');

    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::post('/update', [ProductController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });
});
