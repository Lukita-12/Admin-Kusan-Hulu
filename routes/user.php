<?php

use App\Http\Controllers\User\DomisiliPendudukController;
use Illuminate\Support\Facades\Route;

Route::controller(DomisiliPendudukController::class)->group(function () {
    Route::get('/domisili-penduduk/create', 'create')->name('user.domisili_usaha.create');

    Route::get('/cari-kk', 'cariKK')->name('domisili-usaha.cari');
});