<?php

use App\Http\Controllers\User\AktaKematianController;
use App\Http\Controllers\User\AkunController;
use App\Http\Controllers\User\DataPendudukController;
use App\Http\Controllers\User\DomisiliPendudukController;
use App\Http\Controllers\User\DomisiliUsahaController;
use App\Http\Controllers\User\KartuKeluargaController;
use App\Http\Controllers\User\PendudukController;
use App\Http\Controllers\User\PenerbitanAktaKelahiranController;
use App\Http\Controllers\User\PengajuanPerubahanKKController;
use App\Http\Controllers\User\PerubahanKartuKeluargaController;
use App\Http\Controllers\User\PindahDomisiliController;
use Illuminate\Support\Facades\Route;

Route::controller(DomisiliPendudukController::class)->group(function () {
    Route::get('/domisili-penduduk', 'index')->name('user.domisili_penduduk.index');
    Route::get('/domisili-penduduk/create', 'create')->name('user.domisili_penduduk.create');
    Route::post('/domisili-penduduk', 'store')->name('user.domisili_penduduk.store');

    Route::get('/cari-kk', 'cariKK')->name('domisili_penduduk.cari');
});

Route::controller(DomisiliUsahaController::class)->group(function () {
    Route::get('/domisili-usaha', 'index')->name('user.domisili_usaha.index');
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

Route::controller(PenerbitanAktaKelahiranController::class)->group(function () {
    Route::get('/penerbitan-akta-kelahiran', 'index')->name('user.penerbitan_akta_kelahiran.index');
    Route::get('/penerbitan-akta-kelahiran/create', 'create')->name('user.penerbitan_akta_kelahiran.create');
    Route::post('/penerbitan-akta-kelahiran', 'store')->name('user.penerbitan_akta_kelahiran.store');

    Route::get('/penerbitan-akta-kelahiran/cari-kk', 'cariKK')->name('user.penerbitan_akta_kelahiran.cari');
});

Route::controller(AktaKematianController::class)->group(function () {
    Route::get('/akta-kematian', 'index')->name('user.akta_kematian.index');
    Route::get('/akta-kematian/create', 'create')->name('user.akta_kematian.create');
    Route::post('/akta-kematian', 'store')->name('user.akta_kematian.store');

    Route::get('/akta-kematian/cari-KK', 'cariKK')->name('user.akta_kematian.cari');
});

Route::controller(AkunController::class)->group(function() {
    Route::get('/akun', 'index')->name('user.akun.index');

    Route::get('/akun/{user}/edit', 'edit')->name('user.akun.edit');
    Route::put('/akun/{user}', 'update')->name('user.akun.update');

    Route::post('/akun/update-picture', 'updateProfilePic')->name('user.akun.updatePic');
});

Route::controller(KartuKeluargaController::class)->group(function () {
    Route::get('/kartu-keluarga', 'index')->name('user.kartu_keluarga.index');
    Route::get('/kartu-keluarga/create', 'create')->name('user.kartu_keluarga.create');
    Route::post('/kartu-keluarga', 'store')->name('user.kartu_keluarga.store');
    Route::get('/kartu-keluarga/{kartukeluarga}/edit', 'edit')->name('user.kartu_keluarga.edit');
    Route::put('/kartu-keluarga/{kartuKeluarga}', 'update')->name('user.kartu_keluarga.update');
});

Route::controller(PendudukController::class)->group(function () {
    Route::get('/penduduk/create', 'create')->name('user.penduduk.create');
    Route::post('/penduduk', 'store')->name('user.penduduk.store');
    Route::get('/penduduk/{penduduk}/edit', 'edit')->name('user.penduduk.edit');
    Route::put('/penduduk/{penduduk}', 'update')->name('user.penduduk.update');
});

Route::controller(PengajuanPerubahanKKController::class)->group(function () {
    Route::get('/pengajuan-kk/create', 'create')                    ->name('user.pengajuan_kk.create');
    Route::post('/pengajuan-kk', 'store')                           ->name('user.pengajuan_kk.store');
    Route::get('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}', 'show')    ->name('user.perubahan_kartu_keluarga.show');
});

// Route::controller(PengajuanPerubahanKKController::class)->group(function () {
//     Route::get('/pengajuan-perubahan-kk/create', 'create')->name('user.pengajuan_perubahan_kk.create');
//     Route::post('/pengajuan-perubahan-kk/', 'store')->name('user.pengajuan_perubahan_kk.store');
// });

Route::controller(DataPendudukController::class)->group(function(){
    Route::get('/data-penduduk','index')->name('user.data_penduduk.index')->middleware('auth');
    Route::get('/data-penduduk/create','create')->name('user.data_penduduk.create')->middleware('auth');
    Route::post('/data-penduduk','store')->name('user.data_penduduk.store');
    Route::get('/data-penduduk/{dataPenduduk}/edit','edit')->name('user.data_penduduk.edit')->middleware('auth');
    Route::put('/data-penduduk/{dataPenduduk}','update')->name('user.data_penduduk.update')->middleware('auth');
});