<x-layout>

    <div class="flex flex-col items-center">

        <div>
            <h1>SELAMAT DATANG</h1>
        </div>

        <x-form.form-layout action="{{ route('login.store') }}">

            <div>
                <x-form.form-label for="email">
                    Email
                </x-form.form-label>
                <x-form.form-input
                    type="email"
                    name="email"
                    id="email"
                    :value="old('email')"
                    placeholder="Email"
                    required />
                <x-form.form-error errorFor="email" />
            </div>

            <div>
                <x-form.form-label for="password">
                    Password
                </x-form.form-label>
                <x-form.form-input
                    type="password"
                    name="password"
                    id="password"
                    :value="old('password')"
                    placeholder="Password"
                    required />
                <x-form.form-error errorFor="password" />
            </div>

            <div class="flex justify-center">
                <a href="{{ url('register') }}">Belum punya akun?</a>
                <button type="submit" class="border px-3">MASUK</button>
            </div>
        </x-form.form-layout>

    </div>

</x-layout>