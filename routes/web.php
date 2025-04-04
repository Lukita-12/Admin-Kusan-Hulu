<?php

use App\Http\Controllers\Admin\DesaController;
use App\Http\Controllers\Admin\KartukeluargaController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\AktaKematianController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\PenerbitanAktaKelahiranController;
use App\Http\Controllers\Admin\PerubahanKartuKeluargaController;
use App\Http\Controllers\Admin\PindahDomisiliController;
use App\Http\Controllers\Admin\DomisiliUsahaController;

use App\Http\Controllers\User\AktaKematianController            as UserAktaKematianController;
use App\Http\Controllers\User\DomisiliUsahaController           as UserDomisiliUsahaController;
use App\Http\Controllers\User\KartuKeluargaController           as UserKartuKeluargaController;
use App\Http\Controllers\User\PendudukController                as UserPendudukController;
use App\Http\Controllers\User\PenerbitanAktaKelahiranController as UserPenerbitanAktaKelahiranController;
use App\Http\Controllers\User\PindahDomisiliController          as UserPindahDomisiliController;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\User\AkunController as UserAkunController;
use App\Http\Controllers\User\PerubahanKartuKeluargaController as UserPerubahanKartuKeluargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::prefix('admin')->group(function() {
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
    });

    Route::controller(PendudukController::class)->group(function () {
        Route::get('/penduduk', 'index')->name('admin.penduduk.index');
        Route::get('/penduduk/create', 'create')->name('admin.penduduk.create');
        Route::post('/penduduk', 'store')->name('admin.penduduk.store');
        Route::get('/penduduk/{penduduk}/edit', 'edit')->name('admin.penduduk.edit');
        Route::put('/penduduk/{penduduk}', 'update')->name('admin.penduduk.update');
        Route::delete('/penduduk/{penduduk}', 'destroy')->name('admin.penduduk.destroy');
    });

    Route::controller(AktaKematianController::class)->group(function () {
        Route::get('/akta-kematian', 'index')->name('admin.akta_kematian.index');
        Route::get('/akta-kematian/create', 'create')->name('admin.akta_kematian.create');
        Route::post('/akta-kematian', 'store')->name('admin.akta_kematian.store');
        Route::get('/akta-kematian/{aktaKematian}/edit', 'edit')->name('admin.akta_kematian.edit');
        Route::put('/akta-kematian/{aktaKematian}', 'update')->name('admin.akta_kematian.update');
        Route::delete('/akta-kematian/{aktaKematian}', 'destroy')->name('admin.akta_kematian.destroy');
    });

    Route::controller(PenerbitanAktaKelahiranController::class)->group(function () {
        Route::get('/penerbitan-akta-kelahiran', 'index')->name('admin.penerbitan_akta_kelahiran.index');
        Route::get('/penerbitan-akta-kelahiran/create', 'create')->name('admin.penerbitan_akta_kelahiran.create');
        Route::post('/penerbitan-akta-kelahiran', 'store')->name('admin.penerbitan_akta_kelahiran.store');
        Route::get('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}/edit', 'edit')->name('admin.penerbitan_akta_kelahiran.edit');
        Route::put('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}', 'update')->name('admin.penerbitan_akta_kelahiran.update');
        Route::delete('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}', 'destroy')->name('admin.penerbitan_akta_kelahiran.destroy');
    });

    Route::controller(PerubahanKartuKeluargaController::class)->group(function () {
        Route::get('/perubahan-kartu-keluarga', 'index')->name('admin.perubahan_kartu_keluarga.index');
        Route::get('/perubahan-kartu-keluarga/create', 'create')->name('admin.perubahan_kartu_keluarga.create');
        Route::post('/perubahan-kartu-keluarga', 'store')->name('admin.perubahan_kartu_keluarga.store');
        Route::get('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}/edit', 'edit')->name('admin.perubahan_kartu_keluarga.edit');
        Route::put('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}', 'update')->name('admin.perubahan_kartu_keluarga.update');
        Route::delete('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}', 'destroy')->name('admin.perubahan_kartu_keluarga.destroy');
    });

    Route::controller(PindahDomisiliController::class)->group(function () {
        Route::get('/pindah-domisili', 'index')->name('admin.pindah_domisili.index');
        Route::get('/pindah-domisili/create', 'create')->name('admin.pindah_domisili.create');
        Route::post('/pindah-domisili', 'store')->name('admin.pindah_domisili.store');
        Route::get('/pindah-domisili/{pindahDomisili}/edit', 'edit')->name('admin.pindah_domisili.edit');
        Route::put('/pindah-domisili/{pindahDomisili}', 'update')->name('admin.pindah_domisili.update');
        Route::delete('/pindah-domisili/{pindahDomisili}', 'destroy')->name('admin.pindah_domisili.destroy');
    });

    Route::controller(DomisiliUsahaController::class)->group(function () {
        Route::get('/domisili-usaha', 'index')->name('admin.domisili_usaha.index');
        Route::get('/domisili-usaha/create', 'create')->name('admin.domisili_usaha.create');
        Route::post('/domisili-usaha', 'store')->name('admin.domisili_usaha.store');
        Route::get('/domisili-usaha/{domisiliUsaha}/edit', 'edit')->name('admin.domisili_usaha.edit');
        Route::put('/domisili-usaha/{domisiliUsaha}', 'update')->name('admin.domisili_usaha.update');
        Route::delete('/domisili-usaha/{domisiliUsaha}', 'destroy')->name('admin.domisili_usaha.destroy');
    });

    Route::controller(AkunController::class)->group(function () {
        Route::get('/akun', 'index')->name('admin.akun.index');
        Route::get('/akun/create', 'create')->name('admin.akun.create');
        Route::post('/akun', 'store')->name('admin.akun.store');
        Route::get('/akun/{akun}/edit', 'edit')->name('admin.akun.edit');
        Route::put('/akun/{akun}', 'update')->name('admin.akun.update');
        Route::delete('/akun/{akun}', 'destroy')->name('admin.akun.destroy');
    });
});

Route::prefix('user')->group(function () {
    Route::controller(UserAktaKematianController::class)->group(function () {
        Route::get('/akta-kematian/create', 'create')       ->name('user.akta_kematian.create');
        Route::post('/akta-kematian', 'store')              ->name('user.akta_kematian.store');
        Route::get('/akta-kematian/{aktaKematian}', 'show') ->name('user.akta_kematian.show');
    });

    Route::controller(UserDomisiliUsahaController::class)->group(function () {
        Route::get('/domisili-usaha/create', 'create')          ->name('user.domisili_usaha.create');
        Route::post('/domisili-usaha', 'store')                 ->name('user.domisili_usaha.store');
        Route::get('/domisili-usaha/{domisiliUsaha}', 'show')   ->name('user.domisili_usaha.show');
    });

    Route::controller(UserPendudukController::class)->group(function () {
        Route::get('/penduduk/create', 'create')    ->name('user.penduduk.create');
        Route::post('/penduduk', 'store')           ->name('user.penduduk.store');
        Route::get('/penduduk/{penduduk}', 'show')  ->name('user.penduduk.show');
    });

    Route::controller(UserPindahDomisiliController::class)->group(function () {
        Route::get('/pindah-domisili/create', 'create')         ->name('user.pindah_domisili.create');
        Route::post('/pindah-domisili', 'store')                ->name('user.pindah_domisili.store');
        Route::get('/pindah-domisili/{pindahDomisili}', 'show') ->name('user.pindah_domisili.show');
    });

    Route::controller(UserKartuKeluargaController::class)->group(function () {
        Route::get('/kartu-keluarga/create', 'create')          ->name('user.kartu_keluarga.create');
        Route::post('/kartu-keluarga', 'store')                 ->name('user.kartu_keluarga.store');
        Route::get('/kartu-keluarga/{kartuKeluarga}', 'show')   ->name('user.kartu_keluarga.show');
    });

    Route::controller(UserPenerbitanAktaKelahiranController::class)->group(function () {
        Route::get('/penerbitan-akta-kelahiran/create', 'create')                   ->name('user.penerbitan_akta_kelahiran.create');
        Route::post('/penerbitan-akta-kelahiran', 'store')                          ->name('user.penerbitan_akta_kelahiran.store');
        Route::get('/penerbitan-akta-kelahiran/{penerbitanAktaKelahiran}', 'show')  ->name('user.penerbitan_akta_kelahiran.show');
    });

    Route::controller(UserPerubahanKartuKeluargaController::class)->group(function () {
        Route::get('/perubahan-kartu-keluarga/create', 'create')                    ->name('user.perubahan_kartu_keluarga.create');
        Route::post('/perubahan-kartu-keluarga', 'store')                           ->name('user.perubahan_kartu_keluarga.store');
        Route::get('/perubahan-kartu-keluarga/{perubahanKartuKeluarga}', 'show')    ->name('user.perubahan_kartu_keluarga.show');
    });

    Route::controller(UserAkunController::class)->group(function () {
        Route::get('/akun', 'index')->name('user.akun.index');
    });
});

