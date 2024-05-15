<?php
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'ViewLogin'])->name('login');
    Route::post('login', [AuthController::class, 'PostLogin']);
    Route::get('daftar/sibening', [AuthController::class, 'ViewDaftar'])->name('daftar');
    Route::post('daftar', [AuthController::class, 'PostRegister'])->name('daftar.post');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'PostLogout'])->name('logout');
});
