<?php

use App\Http\Controllers\Admin\DomisiliPendudukController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::controller(DomisiliPendudukController::class)->group(function () {
        Route::get('/domisili-penduduk/{domisiliPenduduk}/edit', 'edit')->name('admin.domisili_penduduk.edit');
        Route::put('/domisili-penduduk/{domisiliPenduduk}', 'update')->name('admin.domisili_penduduk.update');
    });
});