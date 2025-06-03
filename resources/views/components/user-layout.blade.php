<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasi Kec. Kusan Hulu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 flex min-h-screen">

    <x-sidebar.aside class="bg-blue-700">


        <x-sidebar.container variant="sidebar">
            <div class="flex flex-col items-center py-2">
                <img src="{{ asset('images/logo_tanbu.png') }}" alt="Logo" class="h-15 w-auto object-contain mb-2">
                <h1 class="text-white text-base font-semibold">KECAMATAN KUSAN HULU</h1>
            </div>
            <x-sidebar.span variant="line" />

            <x-sidebar.nav>
                <x-sidebar.nav-link href="{{ url('/beranda') }}">Beranda</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.data_penduduk.index') }}">Data Penduduk</x-sidebar.nav-link>

                @if (Auth::user()->dataPenduduk)
                <x-sidebar.nav-link href="{{ route('user.domisili_usaha.create') }}">Domisili Usaha</x-sidebar.nav-link>
                @else
                <x-sidebar.nav-link href="#" class="pointer-events-none opacity-50" aria-disabled="true">
                    Domisili Usaha
                </x-sidebar.nav-link>
                @endif

                @if (Auth::user()->dataPenduduk)
                <x-sidebar.nav-link href="{{ route('user.domisili_penduduk.create') }}">Domisili Penduduk
                </x-sidebar.nav-link>
                @else
                <x-sidebar.nav-link href="#" class="pointer-events-none opacity-50" aria-disabled="true">
                    Domisili Penduduk
                </x-sidebar.nav-link>
                @endif

                @if (Auth::user()->dataPenduduk)
                <x-sidebar.nav-link href="{{ route('user.pindah_domisili.create') }}">Pindah Domisili
                </x-sidebar.nav-link>
                @else
                <x-sidebar.nav-link href="#" class="pointer-events-none opacity-50" aria-disabled="true">
                    Pindah Domisili
                </x-sidebar.nav-link>
                @endif

                @if (Auth::user()->dataPenduduk)
                <x-sidebar.nav-link href="{{ route('user.pengajuan_kk.create') }}">Kartu Keluarga</x-sidebar.nav-link>
                @else
                <x-sidebar.nav-link href="#" class="pointer-events-none opacity-50" aria-disabled="true">
                    Kartu Keluarga
                </x-sidebar.nav-link>
                @endif

                @if (Auth::user()->dataPenduduk)
                <x-sidebar.nav-link href="{{ route('user.penerbitan_akta_kelahiran.create') }}">Akta Kelahiran
                </x-sidebar.nav-link>
                @else
                <x-sidebar.nav-link href="#" class="pointer-events-none opacity-50" aria-disabled="true">
                    Akta Kelahiran
                </x-sidebar.nav-link>
                @endif
                @if (Auth::user()->dataPenduduk)
                <x-sidebar.nav-link href="{{ route('user.akta_kematian.create') }}">Akta Kematian</x-sidebar.nav-link>
                @else
                <x-sidebar.nav-link href="#" class="pointer-events-none opacity-50" aria-disabled="true">
                    Akta Kematian
                </x-sidebar.nav-link>
                @endif
                @if (Auth::user()->dataPenduduk)
                <x-sidebar.nav-link href="{{ route('user.akun.edit',Auth::user()->id) }}">Akun</x-sidebar.nav-link>
                @else
                <x-sidebar.nav-link href="#" class="pointer-events-none opacity-50" aria-disabled="true">
                    Akun
                </x-sidebar.nav-link>
                @endif
            </x-sidebar.nav>
        </x-sidebar.container>
        @auth
        <x-sidebar.container variant="logout">
            <x-form.form action="{{ route('logout') }}">
                <x-sidebar.button variant="logout" type="submit">
                    Log Out
                </x-sidebar.button>
            </x-form.form>
        </x-sidebar.container>
        @endauth
    </x-sidebar.aside>

    <main class="overflow-auto h-screen flex-1">
        <x-heading.container variant="main">
            <x-heading.span variant="dot"></x-heading.span>
            <x-heading.span variant="h1">{{ $heading }}</x-heading.span>

            <div class="flex items-center gap-3">
                <a href="{{ route('user-notifikasi') }}">
                    <div class="relative cursor-pointer">
                        <!-- Ikon Lonceng -->
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C8.67 6.165 8 7.388 8 8.75V14.158c0 .538-.214 1.055-.595 1.437L6 17h5m0 0v1a3 3 0 006 0v-1m-6 0h6" />
                        </svg>
                        <!-- Badge Notifikasi -->

                    </div>
                </a>
                <x-heading.container variant="button">
                    @guest
                    <x-heading.link href="{{ url('/register') }}" variant="register">Register</x-heading.link>
                    <x-heading.link href="{{ url('/login') }}" variant="login">Log In</x-heading.link>
                    @endguest
                    @auth
                    <x-heading.link href="{{ route('user.akun.edit',Auth::user()->id) }}" variant="image">
                        <x-heading.image variant="profile" src="{{ asset('storage/' . Auth::user()->profile_pic) }}"
                            alt="{{ Auth::user()->name }}" />
                    </x-heading.link>
                    @endauth
                </x-heading.container>
            </div>
            <!-- Notifikasi Icon -->

        </x-heading.container>
        <!-- Heading Beranda dengan Notifikasi -->



        <div class="w-full min-h-full flex flex-col items-center px-6 py-6">
            {{ $slot }}
        </div>
    </main>

</body>

</html>
