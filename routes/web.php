<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\DataController;
use App\Http\Controllers\Backend\SiDataController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('get/list/data/kec/desa/{kecamatan}', [DataController::class, 'getDesaList'])->name('data.desa.kec');
require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('backend/admin-dashboard', [AdminController::class, 'ViewDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth','role:user'])->group(function () {
    Route::get('backend/user-dashboard',[UserController::class, 'ViewDashbaord'])->name('user.dashboard');
Route::controller(SiDataController::class)->group(function () {
    Route::get('backend/user-dashboard/my-data', 'ViewData')->name('user.data.index');
    Route::get('backend/user-dashboard/my-data/create', 'CreateData')->name('user.data.create');
    Route::post('backend/user-dashboard/my-data/buat', 'StoreData')->name('user.data.store');
});
});