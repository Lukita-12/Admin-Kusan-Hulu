<x-sidebar.aside>
    <x-container.sidebar>
        <div class="w-full flex flex-col gap-3">
            <x-sidebar.logo>
                <h1 class="font-bold italic text-3xl text-white">LOGO'S</h1>
            </x-sidebar.logo>

            <nav class="w-full flex flex-col space-y-2">
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/') }}">Beranda</x-sidebar.nav-link>
                </x-container.icon-navlink>
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/domisili-usaha/create') }}">Domisili usaha</x-sidebar.nav-link>
                </x-container.icon-navlink>
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/domisili-penduduk/create') }}">Domisili penduduk</x-sidebar.nav-link>
                </x-container.icon-navlink>
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/user/pindah-domisili/create') }}">Pindah domisili</x-sidebar.nav-link>
                </x-container.icon-navlink>
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/user/perubahan-kartu-keluarga/create') }}">Kartu keluarga</x-sidebar.nav-link>
                </x-container.icon-navlink>
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/user/penerbitan-akta-kelahiran/create') }}">Akta kelahiran</x-sidebar.nav-link>
                </x-container.icon-navlink>
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/user/akta-kematian/create') }}">Akta kematian</x-sidebar.nav-link>
                </x-container.icon-navlink>
                <x-container.icon-navlink>
                    <x-sidebar.icon></x-sidebar.icon>
                    <x-sidebar.nav-link href="{{ url('/user/akun') }}">Akun</x-sidebar.nav-link>
                </x-container.icon-navlink>
            </nav>
        </div>
        
        <div class="w-full">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-sidebar.button type="submit" class="">Log Out</x-sidebar.button>
                </form>
            @endauth
        </div>
    </x-container.sidebar>
</x-sidebar.aside>