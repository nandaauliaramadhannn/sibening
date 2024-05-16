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
    // Start Menu
    Route::get('backend/admin-dashboard/menu-main', function(){
        return view('admin.layouts.menu-main');
    })->name('admin.menu-main');
    Route::get('backend/admin-dashboard/menu-highlights', function(){
        return view('admin.layouts.menu-highlights');
    })->name('admin.menu-highlights');
    Route::get('backend/admin-dashboard/menu-bell', function(){
        return view('admin.layouts.menu-bell');
    })->name('admin.menu-bell');
    // End Menu

    Route::get('backend/admin-dashboard', [AdminController::class, 'ViewDashboard'])->name('admin.dashboard');
    Route::get('backend/admin-dashboard/data-grafik-kecamatan', [AdminController::class, 'GetChartKecamatan'])->name('admin.getChartKecamatan');
    Route::get('backend/admin-dashboard/grafik-kecamatan', [AdminController::class, 'ViewChartKecamatan'])->name('admin.viewChartKecamatan');

    Route::get('backend/admin-dashboard/data-grafik-desa', [AdminController::class, 'GetChartDesa'])->name('admin.getChartDesa');
    Route::get('backend/admin-dashboard/grafik-desa', [AdminController::class, 'ViewChartDesa'])->name('admin.viewChartDesa');

    Route::get('backend/admin-dashboard/data-grafik-keluarga-stunting', [AdminController::class, 'GetChartKeluargaStunting'])->name('admin.getChartKeluargaStunting');
    Route::get('backend/admin-dashboard/grafik-keluarga-stunting', [AdminController::class, 'ViewChartKeluargaStunting'])->name('admin.viewChartKeluargaStunting');

    Route::get('backend/admin-dashboard/data-grafik-anak-stunting', [AdminController::class, 'GetChartAnakStunting'])->name('admin.getChartAnakStunting');
    Route::get('backend/admin-dashboard/grafik-anak-stunting', [AdminController::class, 'ViewChartAnakStunting'])->name('admin.viewChartAnakStunting');
});

Route::middleware(['auth','role:user'])->group(function () {
    // Start Menu
    Route::get('backend/user-dashboard/menu-main', function(){
        return view('user.layouts.menu-main');
    })->name('user.menu-main');
    Route::get('backend/user-dashboard/menu-highlights', function(){
        return view('user.layouts.menu-highlights');
    })->name('user.menu-highlights');
    Route::get('backend/user-dashboard/menu-bell', function(){
        return view('user.layouts.menu-bell');
    })->name('user.menu-bell');
    // End Menu

    Route::get('backend/user-dashboard',[UserController::class, 'ViewDashbaord'])->name('user.dashboard');
    Route::controller(SiDataController::class)->group(function () {
        Route::get('backend/user-dashboard/my-data', 'ViewData')->name('user.data.index');
        Route::get('backend/user-dashboard/datagrafik/bulan', 'Grafik');
        Route::get('backend/user-dashboard/getdata', 'getData')->name('user.data.get');
        Route::get('backend/user-dashboard/my-data/create', 'CreateData')->name('user.data.create');
        Route::post('backend/user-dashboard/my-data/buat', 'StoreData')->name('user.data.store');
    });
});
