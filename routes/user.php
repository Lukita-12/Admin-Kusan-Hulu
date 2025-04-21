<?php

use App\Http\Controllers\User\DomisiliPendudukController;
use App\Http\Controllers\User\DomisiliUsahaController;
use App\Http\Controllers\User\PindahDomisiliController;
use Illuminate\Support\Facades\Route;

Route::controller(DomisiliPendudukController::class)->group(function () {
    Route::get('/domisili-penduduk/create', 'create')->name('user.domisili_penduduk.create');
    Route::post('/domisili-penduduk', 'store')->name('user.domisili_penduduk.store');

    Route::get('/cari-kk', 'cariKK')->name('domisili_penduduk.cari');
});

Route::controller(DomisiliUsahaController::class)->group(function () {
    Route::get('/domisili-usaha/create', 'create')->name('user.domisili_usaha.create');
    Route::post('/domisili-usaha', 'store')->name('user.domisili_usaha.store');
    Route::get('/domisili-usaha/{domisiliUsaha}/show', 'show')->name('user.domisili_usaha.show');

    Route::get('/domisili_usaha/cari-kk', 'cariKK')->name('user.domisili_usaha.cari');
});

Route::controller(PindahDomisiliController::class)->group(function() {
    Route::get('/pindah-domisili', 'index')->name('user.pindah_domisili.index');
    Route::get('/pindah-domisili/create', 'create')->name('user.pindah_domisili.create');
    Route::post('/pindah-domisili', 'store')->name('user.pindah_domisili.store');

    Route::get('/pindah-domisili/cari-kk', 'cariKK')->name('user.pindah_domisili.cari');
});