<?php

use App\Http\Controllers\admin\{UserController};
use Illuminate\Support\Facades\Route;


// authenticated Admin routes
Route::prefix('users')->as('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
});
