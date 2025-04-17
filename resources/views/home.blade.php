<x-layout>

    <x-container.dashboard>
        <div class="hidden">
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
    
        <x-sidebar.sidebar />
        
    </x-container.dashboard>

</x-layout>