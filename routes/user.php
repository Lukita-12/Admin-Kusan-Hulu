<?php

use App\Http\Controllers\User\DomisiliPendudukController;
use Illuminate\Support\Facades\Route;

Route::controller(DomisiliPendudukController::class)->group(function () {
    Route::get('/domisili-penduduk/create', 'create')->name('user.domisili_penduduk.create');
    Route::post('/domisili-penduduk', 'store')->name('user.domisili_penduduk.store');

    Route::get('/cari-kk', 'cariKK')->name('domisili-usaha.cari');
});