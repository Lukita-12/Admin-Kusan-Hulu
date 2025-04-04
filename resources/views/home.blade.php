<x-layout>

    <div>
        @guest
            <a href="{{ url('/register') }}">Register</a>
            <a href="{{ url('/login') }}">Log In</a>
        @endguest
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        @endauth
    </div>

    <div>
        <aside>
            <div class="flex flex-col">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/user/domisili-usaha/create') }}">Domisili usaha</a>
                <a href="{{ url('/user/penduduk/create') }}">Domisili penduduk</a>
                <a href="{{ url('/user/pindah-domisili/create') }}">Pindah domisili</a>
                <a href="{{ url('/user/perubahan-kartu-keluarga/create') }}">Kartu keluarga</a>
                <a href="{{ url('/user/penerbitan-akta-kelahiran/create') }}">Akta kelahiran</a>
                <a href="{{ url('/user/akta-kematian/create') }}">Akta kematian</a>
                <a href="{{ url('/user/akun') }}">Akun</a>
            </div>
        </aside>
    </div>

</x-layout>