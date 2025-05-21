<?php

namespace App\Providers;

use App\Models\AktaKematian;
use App\Models\DomisiliPenduduk;
use App\Models\DomisiliUsaha;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use App\Models\PenerbitanAktaKelahiran;
use App\Models\PengajuanPerubahanKK;
use App\Models\PindahDomisili;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\AktaKematianPolicy;
use App\Policies\AkunPolicy;
use App\Policies\DomisiliPendudukPolicy;
use App\Policies\DomisiliUsahaPolicy;
use App\Policies\KartukeluargaPolicy;
use App\Policies\PendudukPolicy;
use App\Policies\PenerbitanAktaKelahiranPolicy;
use App\Policies\PengajuanPerubahanKKPolicy;
use App\Policies\PindahDomisiliPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        User::class             => UserPolicy::class,
        DomisiliUsaha::class    => DomisiliUsahaPolicy::class,
        DomisiliPenduduk::class => DomisiliPendudukPolicy::class,
        PindahDomisili::class   => PindahDomisiliPolicy::class,
        Kartukeluarga::class    => KartukeluargaPolicy::class,
        PengajuanPerubahanKK::class     => PengajuanPerubahanKKPolicy::class,
        PenerbitanAktaKelahiran::class  => PenerbitanAktaKelahiranPolicy::class,
        AktaKematian::class     => AktaKematianPolicy::class,
        Penduduk::class         => PendudukPolicy::class,
        User::class             => AkunPolicy::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
