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
            <div>
                <a href="{{ url('/dashboard') }}">Beranda</a>
                <a href="{{ url('/admin/domisili-usaha') }}">Domisili usaha</a>
                <a href="{{ url('/admin/penduduk') }}">Domisili penduduk</a>
                <a href="{{ url('/admin/pindah-domisili') }}">Pindah domisili</a>
                <a href="{{ url('/admin/kartu-keluarga') }}">Kartu keluarga</a>
                <a href="{{ url('/admin/penerbitan-akta-kelahiran') }}">Akta kelahiran</a>
                <a href="{{ url('/admin/akta-kematian') }}">Akta kematian</a>
                <a href="{{ url('/admin/akun') }}">Akun</a>
            </div>
        </aside>
    </div>

</x-layout>