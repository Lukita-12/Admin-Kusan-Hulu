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
                <x-sidebar.nav-link href="{{ url('/') }}">Beranda</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.domisili_usaha.create') }}">Domisili Usaha</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.domisili_penduduk.create') }}">Domisili Penduduk</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.pindah_domisili.create') }}">Pindah Domisili</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.kartu_keluarga.index') }}">Kartu Keluarga</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.penerbitan_akta_kelahiran.create') }}">Akta Kelahiran</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.akta_kematian.create') }}">Akta Kematian</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('user.akun.edit',Auth::user()->id) }}">Akun</x-sidebar.nav-link>
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
            <x-heading.container variant="button">
                @guest
                    <x-heading.link href="{{ url('/register') }}" variant="register">Register</x-heading.link>
                    <x-heading.link href="{{ url('/login') }}" variant="login">Log In</x-heading.link>
                @endguest
                @auth
                    <x-heading.link href="{{ route('user.akun.edit',Auth::user()->id) }}" variant="image">
                        <x-heading.image variant="profile" src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="{{ Auth::user()->name }}" />
                    </x-heading.link>
                @endauth
            </x-heading.container>
        </x-heading.container>

        <div class="w-full min-h-full flex flex-col items-center px-6 py-6">
            {{ $slot }}
        </div>
    </main>

</body>
</html>