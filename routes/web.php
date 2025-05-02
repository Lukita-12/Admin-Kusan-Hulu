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

Route::prefix('user')->group(function () {
    Route::controller(UserPendudukController::class)->group(function () {
        Route::get('/penduduk/create', 'create')    ->name('user.penduduk.create');
        Route::post('/penduduk', 'store')           ->name('user.penduduk.store');
        Route::get('/penduduk/{penduduk}', 'show')  ->name('user.penduduk.show');
    });

    Route::controller(UserKartuKeluargaController::class)->group(function () {
        Route::get('/kartu-keluarga/create', 'create')          ->name('user.kartu_keluarga.create');
        Route::post('/kartu-keluarga', 'store')                 ->name('user.kartu_keluarga.store');
        Route::get('/kartu-keluarga/{kartuKeluarga}', 'show')   ->name('user.kartu_keluarga.show');
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

require __DIR__. '/user.php';
require __DIR__. '/admin.php';