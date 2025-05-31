<x-layout>
    <div class="w-full min-h-screen flex justify-center items-center">

        <div class="w-1/3 bg-slate-200 rounded-lg shadow-md shadow-slate-500/80 px-6 py-6">
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
    
                <div class="w-full flex flex-col gap-12">
                    <span class="font-bold text-slate-700 text-center text-2xl">SELAMAT DATANG</span>
                    
                    <div class="w-full flex flex-col gap-3">
                        <input type="email" name="email" id="email" :value="old(email)" placeholder="Email..."
                            class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required>
        
                        <input type="password" name="password" id="password" :value="old('password')" placeholder="Password..."
                            class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required>
                            @error ('password')
                            <span class="text-red-500 text-sm italic">{{ $message }}</span>
                            @enderror
                    </div>
    
                    <div class="w-full flex flex-col items-center">
                        <button type="submit" class="w-full bg-blue-400/80 font-bold text-xl text-center text-slate-100 px-4 py-1 rounded-md">MASUK</button>
                        <a href="{{ url('register') }}" class="text-blue-500 underline italic">Belum punya akun</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-layout>