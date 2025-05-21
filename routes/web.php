<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SuratAktaKematianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AktaKematianController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

// Route::controller(SuratAktaKematianController::class)->group(function () {
//     Route::get('SuratAkta','index')->name('SuratAKta');
// });
// Route::get('/admin/akta_kematian/surat/{aktaKematian}', [AktaKematianController::class, 'showSurat'])->name('admin.SuratAktaKematian.show');
// Rute untuk melihat Surat Akta Kematian


require __DIR__. '/auth.php';
require __DIR__. '/user.php';
require __DIR__. '/admin.php';