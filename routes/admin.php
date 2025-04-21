<?php

use App\Http\Controllers\Admin\DomisiliPendudukController;
use App\Http\Controllers\Admin\DomisiliUsahaController;
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

    Route::controller(DomisiliUsahaController::class)->group(function () {
        Route::get('/domisili-usaha', 'index')->name('admin.domisili_usaha.index');
        Route::get('/domisili-usaha/create', 'create')->name('admin.domisili_usaha.create');
        Route::post('/domisili-usaha', 'store')->name('admin.domisili_usaha.store');
        Route::get('/domisili-usaha/{domisiliUsaha}/edit', 'edit')->name('admin.domisili_usaha.edit');
        Route::post('/domisili-usaha/{domisiliUsaha}', 'update')->name('admin.domisili_usaha.update');
        Route::delete('/domisili-usaha/{domisiliUsaha}', 'destroy')->name('admin.domisili_usaha.destroy');

        Route::patch('/domisili-usaha/{domisiliUsaha}/accept' , 'accept')->name('admin.domisili_usaha.accept');
        Route::patch('/domisili-usaha/{domisiliUsaha}/reject', 'reject')->name('admin.domisili_usaha.reject');
        Route::patch('/domisili-usaha/{domisiliUsaha}/complete' , 'complete')->name('admin.domisili_usaha.complete');
    });
});