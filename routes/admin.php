<?php

use App\Http\Controllers\Admin\AktaKematianController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\DesaController;
use App\Http\Controllers\Admin\DomisiliPendudukController;
use App\Http\Controllers\Admin\DomisiliUsahaController;
use App\Http\Controllers\Admin\KartukeluargaController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\PenerbitanAktaKelahiranController;
use App\Http\Controllers\Admin\PengajuanPerubahanKKController;
use App\Http\Controllers\Admin\PerubahanKartuKeluargaController;
use App\Http\Controllers\Admin\PindahDomisiliController;
use App\Http\Controllers\SuratAktaKelahiranController;
use App\Http\Controllers\SuratAktaKematianController;
use App\Http\Controllers\SuratDomisiliPendudukController;
use App\Http\Controllers\SuratDomisiliUsahaController;
use App\Http\Controllers\SuratKartuKeluargaController;
use App\Http\Controllers\SuratPindahDomisiliController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

Route::prefix('admin')->middleware(['auth', 'role:admin,super_admin'])->group(function () {
    Route::controller(DesaController::class)->group(function () {
        Route::get('/desa', 'index')->name('admin.desa.index');
        Route::get('/desa/create', 'create')->name('admin.desa.create');
        Route::post('/desa', 'store')->name('admin.desa.store');
        Route::get('/desa/{desa}/edit', 'edit')->name('admin.desa.edit');
        Route::put('/desa/{desa}', 'update')->name('admin.desa.update');
        Route::delete('/desa/{desa}', 'destroy')->name('admin.desa.destroy');
    });

    Route::controller(KartukeluargaController::class)->group(function () {
        Route::get('/kartu-keluarga', 'index')->name('admin.kartu_keluarga.index');
        Route::get('/kartu-keluarga/create', 'create')->name('admin.kartu_keluarga.create');
        Route::post('/kartu-keluarga', 'store')->name('admin.kartu_keluarga.store');
        Route::get('/kartu-keluarga/{kartukeluarga}/edit', 'edit')->name('admin.kartu_keluarga.edit');
        Route::put('/kartu-keluarga/{kartukeluarga}', 'update')->name('admin.kartu_keluarga.update');
        Route::delete('/kartu-keluarga/{kartukeluarga}', 'destroy')->name('admin.kartu_keluarga.destroy');

        Route::get('/kartu-keluarga/search', 'search')->name('admin.kartu_keluarga.search');
        Route::get('/kartu-keluarga/filter', 'filter')->name('admin.kartu_keluarga.filter');
    });
    
    Route::controller(AkunController::class)->group(function () {
        Route::get('/akun', 'index')->name('admin.akun.index');
        Route::get('/akun/create', 'create')->name('admin.akun.create');
        Route::post('/akun', 'store')->name('admin.akun.store');
        Route::get('/akun/{user}/edit', 'edit')->name('admin.akun.edit');
        Route::put('/akun/{user}', 'update')->name('admin.akun.update');
        Route::delete('/akun/{user}', 'destroy')->name('admin.akun.destroy');
    });

    Route::controller(PendudukController::class)->group(function () {
        Route::get('/penduduk', 'index')->name('admin.penduduk.index');
        Route::get('/penduduk/create', 'create')->name('admin.penduduk.create');
        Route::post('/penduduk', 'store')->name('admin.penduduk.store');
        Route::get('/penduduk/{penduduk}/edit', 'edit')->name('admin.penduduk.edit');
        Route::put('/penduduk/{penduduk}', 'update')->name('admin.penduduk.update');
        Route::delete('/penduduk/{penduduk}', 'destroy')->name('admin.penduduk.destroy');

        Route::get('/penduduk/search', 'search')->name('admin.penduduk.search');
        Route::get('/penduduk/filter', 'filter')->name('admin.penduduk.filter');
    });

    Route::controller(DomisiliPendudukController::class)->group(function () {
        Route::get('/domisili-penduduk', 'index')->name('admin.domisili_penduduk.index');
        Route::get('/domisili-penduduk/{domisiliPenduduk}/edit', 'edit')->name('admin.domisili_penduduk.edit');
        Route::put('/domisili-penduduk/{domisiliPenduduk}', 'update')->name('admin.domisili_penduduk.update');

        Route::get('/domisili-penduduk/search', 'search')->name('admin.domisili_penduduk.search');
        Route::get('/domisili-penduduk/filter', 'filter')->name('admin.domisili_penduduk.filter');
        
        Route::delete('/domisili-penduduk/{domisiliPenduduk}', 'destroy')->name('admin.domisili_penduduk.destroy');
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

        Route::get('/domisili-usaha/search', 'search')->name('admin.domisili_usaha.search');
        Route::get('/domisili-usaha/filter', 'filter')->name('admin.domisili_usaha.filter');

        Route::patch('/domisili-usaha/{domisiliUsaha}/accept' , 'accept')->name('admin.domisili_usaha.accept');
        Route::patch('/domisili-usaha/{domisiliUsaha}/reject', 'reject')->name('admin.domisili_usaha.reject');
        Route::patch('/domisili-usaha/{domisiliUsaha}/complete' , 'complete')->name('admin.domisili_usaha.complete');
    });

    Route::controller(PindahDomisiliController::class)->group(function () {
        Route::get('/pindah-domisili', 'index')->name('admin.pindah_domisili.index');
        Route::get('/pindah-domisili/create', 'create')->name('admin.pindah_domisili.create');
        Route::post('/pindah-domisili', 'store')->name('admin.pindah_domisili.store');
        Route::get('/pindah-domisili/{pindahDomisili}/edit', 'edit')->name('admin.pindah_domisili.edit');
        Route::put('/pindah-domisili/{pindahDomisili}', 'update')->name('admin.pindah_domisili.update');
        Route::delete('/pindah-domisili/{pindahDomisili}', 'destroy')->name('admin.pindah_domisili.destroy');

        Route::get('/pindah-domisili/search', 'search')->name('admin.pindah_domisili.search');
        Route::get('/pindah-domisili/filter', 'filter')->name('admin.pindah_domisili.filter');

        Route::patch('/pindah-domisili/{pindahDomisili}/accept' , 'accept')->name('admin.pindah_domisili.accept');
        Route::patch('/pindah-domisili/{pindahDomisili}/reject', 'reject')->name('admin.pindah_domisili.reject');
        Route::patch('/pindah-domisili/{pindahDomisili}/complete' , 'complete')->name('admin.pindah_domisili.complete');
    });

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

        Route::get('/akta-kematian/search', 'search')->name('admin.akta_kematian.search');
        Route::get('/akta-kematian/filter', 'filter')->name('admin.akta_kematian.filter');

        Route::patch('/akta-kematian/{aktaKematian}/accept' , 'accept')->name('admin.akta_kematian.accept');
        Route::patch('/akta-kematian/{aktaKematian}/reject', 'reject')->name('admin.akta_kematian.reject');
        Route::patch('/akta-kematian/{aktaKematian}/complete' , 'complete')->name('admin.akta_kematian.complete');
    });

    Route::controller(PerubahanKartuKeluargaController::class)->group(function () {
        Route::get('/perubahan-kartu-keluarga', 'index')->name('admin.perubahan_kartu_keluarga.index');
        Route::get('/perubahan-kartu-keluarga/create', 'create')->name('admin.perubahan_kartu_keluarga.create');
        Route::post('/perubahan-kartu-keluarga', 'store')->name('admin.perubahan_kartu_keluarga.store');
        Route::get('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}/edit', 'edit')->name('admin.perubahan_kartu_keluarga.edit');
        Route::put('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}', 'update')->name('admin.perubahan_kartu_keluarga.update');
        Route::delete('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}', 'destroy')->name('admin.perubahan_kartu_keluarga.destroy');

        Route::patch('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}/accept' , 'accept')->name('admin.perubahan_kartu_keluarga.accept');
        Route::patch('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}/reject', 'reject')->name('admin.perubahan_kartu_keluarga.reject');
        Route::patch('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}/complete' , 'complete')->name('admin.perubahan_kartu_keluarga.complete');
    });

    Route::controller(SuratAktaKematianController::class)->group(function () {
        Route::get('/SuratAktaKematian','index')->name('admin.SuratAktaKematian.index');
        Route::get('/akta-kematian/surat/{id}', 'show')->name('akta_kematian.surat');
    //    Route::patch('/admin/akta-kematian/{aktaKematian}/complete', [AktaKematianController::class, 'complete'])->name('admin.akta_kematian.complete');
    });

    Route::controller(PengajuanPerubahanKKController::class)->group(function () {
        Route::delete('/pengajuan-perubahan-kk/{pengajuanPerubahanKK}', 'destroy')->name('admin.pengajuan_perubahan_kk.destroy');

        Route::patch('/pengajuan-perubahan-kk/{pengajuanPerubahanKK}/accept', 'accept')->name('admin.pengajuan_perubahan_kk.accept');
        Route::patch('/pengajuan-perubahan-kk/{pengajuanPerubahanKK}/reject', 'reject')->name('admin.pengajuan_perubahan_kk.reject');
        Route::patch('/pengajuan-perubahan-kk/{pengajuanPerubahanKK}/complete', 'complete')->name('admin.pengajuan_perubahan_kk.complete');
    });

    Route::controller(SuratDomisiliUsahaController::class)->group(function(){
        Route::get('/SuratDomisiliUsaha','index')->name('admin.SuratDomisiliUsaha.index');
        Route::get('/domisili-usaha/surat/{id}','show')->name('domisili-usaha.surat');
    });
    
    Route::controller(SuratDomisiliPendudukController::class)->group(function(){
        Route::get('/SuratDomisiliPenduduk', 'index')->name('admin.SuratDomisiliPenduduk.index');
        Route::get('/domisili-penduduk/surat/{id}', 'show')->name('domisili-penduduk.surat');
    });

    Route::controller(SuratKartuKeluargaController::class)->group(function(){
        Route::get('/SuratKartuKeluarga', 'index')->name('admin.SuratKartuKeluarga.index');
        Route::get('/kartu-keluarga/surat/{id}','show')->name('kartu-keluarga.surat');
    });

    Route::controller(SuratAktaKelahiranController::class)->group(function(){
        Route::get('/SuratAktaKelahiran','index')->name('admin.SuratAktaKelahiran.index');
        Route::get('/penerbitan_akta_kelahiran/surat/{id}','show')->name('penerbitan-akta-kelahiran.surat');
    });

    Route::controller(SuratPindahDomisiliController::class)->group(function(){
        Route::get('/SuratPindahDomisili','index')->name('admin.SuratPindahDomisili.index');
        Route::get('/pindah_domisili/surat/{id}','show')->name('pindah-domisili.surat');
    });
});