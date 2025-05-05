<x-user-layout>
    <x-slot:heading>
        AKUN
    </x-slot:heading>

    @guest
    <div class="w-1/2 bg-slate-200 rounded-lg shadow-md shadow-slate-500/80 px-8 py-6">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="w-full flex flex-col gap-3">
                <span class="font-bold text-slate-700 text-2xl text-center my-6">SELAMAT DATANG</span>

                <div class="w-full flex flex-col items-center gap-1">
                    <input type="email" name="email" id="email" :value="old('email')" placeholder="Email..."
                        class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required />
                    @error ('email')
                        <div class="px-1 italic text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full flex flex-col items-center gap-1">
                    <input type="password" name="password" id="password" :value="old('password')" placeholder="Password"
                        class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required />
                    @error ('password')
                        <div class="px-1 italic text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col justify-center items-center gap-3 my-8">
                    <button variant="save" type="submit" class="w-full bg-blue-400/80 font-bold text-xl text-center text-slate-100 px-4 py-1 rounded-md">MASUK</button>
                    <a href="{{ url('register') }}" class="text-blue-500 underline italic">Belum punya akun?</a>
                </div>

            </div>
        </form>
    </div>
    @endguest

    @auth
    <div class="w-1/2 flex flex-col justify-center items-center border-slate-700 gap-3">
        @if (Auth::user()->profile_pic)
            <a href="{{ asset('storage/' . Auth::user()->profile_pic) }}" target="_blank" class="hover:opacity-75 transition">
                <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="{{ Auth::user()->name }}" class="w-64 h-64 rounded-xl object-cover" />
            </a>
        @else
            <img src="{{ asset('images/Winter-Grass.jpg') }}" alt="{{ Auth::user()->name }}" class="w-64 h-64 rounded-xl object-cover" />
        @endif

        <a href="{{ route('user.akun.edit', Auth::user()) }}" class="bg-slate-700 font-semibold text-center text-slate-100 px-3 py-1 rounded-md">Edit profile</a>

        <span class="text-center">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est distinctio ducimus id ea modi vitae molestias repellat numquam adipisci eveniet blanditiis repudiandae quas amet unde corrupti itaque tenetur natus quia, vero animi, maxime magni sequi? Asperiores minus iusto eaque sit, dicta cum voluptate excepturi ut incidunt recusandae earum quasi labore!
        </span>
    </div>
    @endauth

</x-user-layout>