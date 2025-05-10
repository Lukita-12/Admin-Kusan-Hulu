<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

require __DIR__. '/auth.php';
require __DIR__. '/user.php';
require __DIR__. '/admin.php';