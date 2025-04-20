<?php

use App\Http\Controllers\Admin\DomisiliPendudukController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::controller(DomisiliPendudukController::class)->group(function () {
        Route::get('/domisili-penduduk', 'index')->name('admin.domisili_penduduk.index');
        Route::get('/domisili-penduduk/{domisiliPenduduk}/edit', 'edit')->name('admin.domisili_penduduk.edit');
        Route::put('/domisili-penduduk/{domisiliPenduduk}', 'update')->name('admin.domisili_penduduk.update');

        Route::patch('/domisili-penduduk/{domisiliPenduduk}/accept', 'accept')->name('admin.domisili_penduduk.accept');
        Route::patch('/domisili-penduduk/{domisiliPenduduk}/reject', 'reject')->name('admin.domisili_penduduk.reject');
        Route::patch('/domisili-penduduk/{domisiliPenduduk}/complete', 'complete')->name('admin.domisili_penduduk.complete');
    });
});