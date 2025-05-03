<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('login.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="email" name="email" id="email" :value="old('email')" placeholder="Email..." required />
                        <x-form.error errorFor="email" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="password">Password</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="password" name="password" id="password" :value="old('password')" placeholder="Password" required />
                        <x-form.error errorFor="password" />
                    </x-form.container>
                </x-form.container>

                <div class="flex flex-col justify-center items-center gap-3 my-8">
                    <button variant="save" type="submit" class="w-full bg-blue-400/80 font-bold text-xl text-center text-slate-100 px-4 py-1 rounded-md">MASUK</button>
                    <a href="{{ url('register') }}" class="text-blue-500 underline italic">Belum punya akun?</a>
                </div>

            </x-form.container>
        </x-form.form>
    </x-form.container>

</x-layout>