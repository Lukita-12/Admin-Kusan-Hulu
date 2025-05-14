<x-layout>
    <div class="bg-slate-200 rounded-lg shadow-md shadow-slate-500/80 px-8 py-6 mx-24 my-4">
        <form method="POST" action="{{ route('user.akun.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="w-full flex flex-col gap-3">
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

                <div class="w-full flex flex-col gap-2">
                    <label for="username" class="block px-4 font-bold text-slate-700 text-xl">Username</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Username..."
                        class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required />
                    @error ('name')
                        <div class="px-1 italic text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="email" class="block px-4 font-bold text-slate-700 text-xl">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Email..."
                        class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" required />
                    @error ('name')
                        <div class="px-1 italic text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="Password" class="block px-4 font-bold text-slate-700 text-xl">Password</label>
                    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Isi hanya jika ingin mengganti password..."
                        class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg" />
                    @error ('name')
                        <div class="px-1 italic text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 my-3">
                    <a href="{{ route('user.akun.index') }}" class="w-1/10 inline-block bg-red-500/80 font-bold text-xl text-white text-center px-4 py-1 rounded-md">Batal</a>
                    <button type="submit" class="w-1/10 bg-blue-400/80 font-bold text-xl text-center text-slate-100 px-4 py-1 rounded-md">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    
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