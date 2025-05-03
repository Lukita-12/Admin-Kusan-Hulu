<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('user.akun.update', $user) }}" enctype="multipart/form-data">
            @method('PUT')
            
            <x-form.container variant="form">

                <div class="w-full flex flex-col justify-center items-center gap-3 mb-3">
                    <img id="profilePreview" 
                        src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('images/Winter-Grass.jpg') }}" 
                        alt="{{ $user->name }}" 
                        class="w-64 h-64 rounded-xl object-cover">

                    <label for="profile_pic" class="bg-slate-700 w-fit px-4 py-1 font-semibold text-xl text-center text-slate-100 rounded-lg cursor-pointer">
                        Ganti Gambar
                        <input type="file" name="profile_pic" accept="image/*" id="profile_pic" class="hidden">
                    </label>
                </div>

                <x-form.container variant="label-input">
                    <x-form.label for="username">Username</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Username..." required />
                        <x-form.error errorFor="name" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Email..." required />
                        <x-form.error errorFor="email" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="Password">Password</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Isi hanya jika ingin mengganti password..." />
                        <x-form.error errorFor="password" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('user.akun.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>

    <script>
        document.getElementById('profile_pic').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profilePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</x-layout>