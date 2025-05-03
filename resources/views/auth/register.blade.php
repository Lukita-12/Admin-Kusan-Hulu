<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('register.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="name">Username</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="name" id="name" :venue="old('name')" placeholder="Username..." required />
                        <x-form.error errorFor="name" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="email" name="email" id="email" :venue="old('email')" placeholder="Email..." required />
                        <x-form.error errorFor="email" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="password">Password</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="password" name="password" id="password" :venue="old('password')" placeholder="Password" required />
                        <x-form.error errorFor="password" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="password_confirmation">Konfirmasi password</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="password" name="password_confirmation" id="password_confirmation" :venue="old('password_confirmation')" placeholder="Konfirmasi password" required />
                        <x-form.error errorFor="password_confirmation" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ url('/') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Daftar</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>

</x-layout>