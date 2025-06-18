<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrasi Kec. Kusan Hulu</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-100 flex min-h-screen">

        <x-sidebar.aside class="bg-slate-800">

            <x-sidebar.container variant="sidebar">
            <div class="flex flex-col items-center py-2">
    <img src="{{ asset('images/logo_tanbu.png') }}" alt="Logo" class="h-15 w-auto object-contain mb-2">
    <h1 class="text-white text-base font-semibold">KECAMATAN KUSAN HULU</h1>
</div>
                <x-sidebar.span variant="line" />

                <x-sidebar.nav>
                    <x-sidebar.nav-link href="{{ url('/dashboard') }}">Dashboard</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/domisili-usaha') }}">Domisili usaha</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/domisili-penduduk') }}">Domisili penduduk</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/pindah-domisili') }}">Pindah domisili</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/kartu-keluarga') }}">Kartu keluarga</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/penerbitan-akta-kelahiran') }}">Akta kelahiran</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/akta-kematian') }}">Akta kematian</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/penduduk') }}">Penduduk</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ url('/admin/akun') }}">Akun</x-sidebar.nav-link>
                </x-sidebar.nav>
            </x-sidebar.container>

            @auth
            <x-sidebar.container variant="logout">
                <x-form.form action="{{ route('logout') }}">
                    <x-sidebar.button variant="logout" type="submit">Log Out</x-sidebar.button>
                </x-form.form>
            </x-sidebar.container>
            @endauth
        </x-sidebar.aside>

        <main class="overflow-auto h-screen flex-1">
            <x-heading.container variant="main">
                <x-heading.span variant="dot" />

                <x-heading.span variant="h1">{{ $heading }}</x-heading.span>

                <x-heading.container variant="button">
                    @guest
                        <x-heading.link variant="register" href="{{ route('register') }}">Register</x-heading.link>
                        <x-heading.link variant="login" href="{{ route('login') }}">Log In</x-heading.link>
                    @endguest
                    @auth
                        <x-heading.link variant="image" href="#">
                            <x-heading.image variant="profile" src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="{{ Auth::user()->name }}" />
                        </x-heading.link>
                    @endauth
                </x-heading.container>
            </x-heading.container>
            
            <div class="w-full min-h-full flex flex-col justify-start items-start px-6 py-6 gap-6">
            {{ $slot }}
        </div>
        </main>

    </body>
</html>