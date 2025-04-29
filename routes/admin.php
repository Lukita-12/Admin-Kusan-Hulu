<?php

use App\Http\Controllers\Admin\AktaKematianController;
use App\Http\Controllers\Admin\DomisiliPendudukController;
use App\Http\Controllers\Admin\DomisiliUsahaController;
use App\Http\Controllers\Admin\PenerbitanAktaKelahiranController;
use App\Http\Controllers\Admin\PindahDomisiliController;
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

    Route::controller(PindahDomisiliController::class)->group(function () {
        Route::get('/pindah-domisili', 'index')->name('admin.pindah_domisili.index');
        Route::get('/pindah-domisili/{pindahDomisili}/edit', 'edit')->name('admin.pindah_domisili.edit');
        Route::put('/pindah-domisili/{pindahDomisili}', 'update')->name('admin.pindah_domisili.update');
        Route::delete('/pindah-domisili/{pindahDomisili}', 'destroy')->name('admin.pindah_domisili.destroy');

        Route::patch('/pindah-domisili/{pindahDomisili}/accept' , 'accept')->name('admin.pindah_domisili.accept');
        Route::patch('/pindah-domisili/{pindahDomisili}/reject', 'reject')->name('admin.pindah_domisili.reject');
        Route::patch('/pindah-domisili/{pindahDomisili}/complete' , 'complete')->name('admin.pindah_domisili.complete');
    });

    /*
    Route::controller(PindahDomisiliController::class)->group(function () {
        Route::get('/pindah-domisili/create', 'create')->name('admin.pindah_domisili.create');
        Route::post('/pindah-domisili', 'store')->name('admin.pindah_domisili.store');
    });
    */

    Route::controller(PenerbitanAktaKelahiranController::class)->group(function () {
        Route::get('/penerbitan-akta-kelahiran', 'index')->name('admin.penerbitan_akta_kelahiran.index');
        Route::get('/penerbitan-akta-kelahiran/create', 'create')->name('admin.penerbitan_akta_kelahiran.create');
        Route::post('/penerbitan-akta-kelahiran', 'store')->name('admin.penerbitan_akta_kelahiran.store');
        Route::get('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}/edit', 'edit')->name('admin.penerbitan_akta_kelahiran.edit');
        Route::put('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}', 'update')->name('admin.penerbitan_akta_kelahiran.update');
        Route::delete('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}', 'destroy')->name('admin.penerbitan_akta_kelahiran.destroy');

        Route::patch('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}/accept', 'accept')->name('admin.penerbitan_akta_kelahiran.accept');
        Route::patch('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}/reject', 'reject')->name('admin.penerbitan_akta_kelahiran.reject');
        Route::patch('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}/complete', 'complete')->name('admin.penerbitan_akta_kelahiran.complete');
    });

    Route::controller(AktaKematianController::class)->group(function () {
        Route::get('/akta-kematian', 'index')->name('admin.akta_kematian.index');
        Route::get('/akta-kematian/create', 'create')->name('admin.akta_kematian.create');
        Route::post('/akta-kematian', 'store')->name('admin.akta_kematian.store');
        Route::get('/akta-kematian/{aktaKematian}/edit', 'edit')->name('admin.akta_kematian.edit');
        Route::put('/akta-kematian/{aktaKematian}', 'update')->name('admin.akta_kematian.update');
        Route::delete('/akta-kematian/{aktaKematian}', 'destroy')->name('admin.akta_kematian.destroy');

        Route::patch('/akta-kematian/{aktaKematian}/accept' , 'accept')->name('admin.akta_kematian.accept');
        Route::patch('/akta-kematian/{aktaKematian}/reject', 'reject')->name('admin.akta_kematian.reject');
        Route::patch('/akta-kematian/{aktaKematian}/complete' , 'complete')->name('admin.akta_kematian.complete');
    });
});