<x-layout>
    <div class="w-full min-h-screen flex justify-center items-center">

        <div class="w-xl bg-slate-200 rounded-lg shadow-md shadow-slate-500/80 px-6 py-6">
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
    
                <div class="w-full flex flex-col gap-12">
                    <span class="font-bold text-slate-700 text-center text-2xl">REGISTER</span>
    
                    <div class="w-full flex flex-col gap-3">
                        <input type="text" name="name" id="name" placeholder="Username"
                            class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required>
                        <x-form.error errorFor="name" />
    
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required>
                        <x-form.error errorFor="email" />
    
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required>
                        <x-form.error errorFor="password" />
    
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi password"
                            class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required>
                        <x-form.error errorFor="password_confirmation" />
    
                    </div>
    
                    <div class="w-full flex flex-col items-center gap-1">
                        <button type="submit" class="w-full bg-blue-400/80 font-bold text-xl text-center text-slate-100 px-4 py-1 rounded-md">DAFTAR</button>
                        <a href="{{ route('login') }}" class="text-blue-500 underline italic">Sudah punya akun?</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-layout>