<x-layout>

    <x-form.form-layout action="{{ route('register.store') }}">
        
        <div>
            <x-form.form-label for="name">
                Username
            </x-form.form-label>
            <x-form.form-input
                type="text"
                name="name"
                id="name"
                :venue="old('name')"
                placeholder="Username..."
                required />
            <x-form.form-error errorFor="name" />
        </div>

        <div>
            <x-form.form-label for="email">
                Email
            </x-form.form-label>
            <x-form.form-input
                type="email"
                name="email"
                id="email"
                :venue="old('email')"
                placeholder="Email..."
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
                :venue="old('password')"
                placeholder="Password"
                required />
            <x-form.form-error errorFor="password" />
        </div>

        <div>
            <x-form.form-label for="password_confirmation">
                Konfirmasi password
            </x-form.form-label>
            <x-form.form-input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                :venue="old('password_confirmation')"
                placeholder="Konfirmasi password"
                required />
            <x-form.form-error errorFor="password_confirmation" />
        </div>

        <div>
            <a href="{{ url('/') }}">Batal</a>
            <button type="submit">Daftar</button>
        </div>

    </x-form.form-layout>

</x-layout>