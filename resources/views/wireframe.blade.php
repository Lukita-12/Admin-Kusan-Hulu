<x-layout>

    <div class="flex min-h-screen">
        <x-sidebar.aside>
            <x-sidebar.container variant="sidebar">
                <x-sidebar.span variant="logo">LOGO'S</x-sidebar.span>
                <x-sidebar.span variant="line" />

                <x-sidebar.nav>
                    <x-sidebar.nav-link href="#">Beranda</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ route('user.domisili_usaha.create') }}">Domisili Usaha</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ route('user.domisili_penduduk.create') }}">Domisili Penduduk</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ route('user.pindah_domisili.create') }}">Pindah Domisili</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ route('user.kartu_keluarga.create') }}">Kartu Keluarga</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ route('user.penerbitan_akta_kelahiran.create') }}">Akta Kelahiran</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ route('user.akta_kematian.create') }}">Akta Kematian</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="{{ route('user.akun.index') }}">Akun</x-sidebar.nav-link>
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

            <x-header.container variant="main">
                <x-header.span variant="dot"></x-header.span>
                <x-header.span variant="h1">AKTA KEMATIAN</x-header.span>
                <x-header.container variant="button">
                    @guest
                        <x-header.link href="{{ url('/register') }}" variant="register">Register</x-header.link>
                        <x-header.link href="{{ url('/login') }}" variant="login">Log In</x-header.link>
                    @endguest
                    @auth
                        <x-header.link href="{{ route('user.akun.index') }}" variant="image">
                            <x-header.image variant="profile" src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="{{ Auth::user()->name }}" />
                        </x-header.link>
                    @endauth
                </x-header.container>
            </x-header.container>

            <div class="w-full min-h-full flex flex-col items-center px-6 py-6">
                {{ $slot }}
            </div>
        </main>
    </div>

</x-layout>