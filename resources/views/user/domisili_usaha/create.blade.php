<x-layout>

    <div class="min-h-screen flex justify-center items-center overflow-auto">
        <div class="bg-slate-200 w-4xl px-4 py-6 rounded-lg shadow-md shadow-slate-500/80">
            <form method="POST" action="{{ route('user.domisili_usaha.store') }}">
                @csrf
                <div class="w-full flex flex-col gap-3">
                    <div class="flex">
                        <x-form.label>NIK</x-form.label>
                        <div class="w-full flex gap-3">
                            <x-form.input type="text" name="no_kk" id="no_kk" :value="old('no_kk')" placeholder="NIK..." required />
                            <x-form.button type="button" id="btn-cari" class="min-w-1/4">Cari</x-form.button>
                            <x-form.error errorFor="no_kk" />
                        </div>
                    </div>

                    <!-- Penduduk id -->
                     <x-form.input type="hidden" id="penduduk_id" name="penduduk_id" />

                    <div class="flex">
                        <x-form.label>Nama</x-form.label>
                        <x-form.input type="text" name="nama" id="nama" :value="old('nama')" placeholder="Nama" readonly onfocus="this.blur();"/>
                        <x-form.error errorFor="nama" />
                    </div>
                    <div class="flex">
                        <x-form.label>Tempat Tanggal Lahir</x-form.label>
                        <x-form.input type="text" name="ttl" id="ttl" :value="old('ttl')" placeholder="Tempat tanggal lahir..." readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="ttl" />
                    </div>
                    <div class="flex">
                        <x-form.label>Alamat</x-form.label>
                        <x-form.textarea type="text" name="alamat" id="alamat" :value="old('alamat')" placeholder="Alamat..." readonly onfocus="this.blur();" required>
                            {{ old('alamat') }}
                        </x-form.textarea>
                        <x-form.error errorFor="alamat" />
                    </div>

                    <span class="mx-2 my-4 w-full border-2 border-dashed border-slate-700"></span>
        
                    <div class="flex">
                        <x-form.label>Nama Usaha</x-form.label>
                        <div class="w-full flex flex-col gap-1">
                            <x-form.input type="text" name="nama_usaha" id="nama_usaha" :value="old('nama_usaha')" placeholder="Nama usaha" required/>
                            <x-form.error errorFor="nama_usaha" />
                        </div>
                    </div>
                    <div class="flex">
                        <x-form.label>Jenis Usaha</x-form.label>
                        <div class="w-full flex flex-col gap-1">
                            <x-form.input type="text" name="jenis_usaha" id="jenis_usaha" :value="old('jenis_usaha')" placeholder="Jenis usaha" required/>
                            <x-form.error errorFor="jenis_usaha" />
                        </div>
                    </div>
                    <div class="flex">
                        <x-form.label>Alama Usaha</x-form.label>
                        <div class="w-full flex flex-col gap-1">
                            <x-form.textarea name="alamat_usaha" id="alamat_usaha" :value="old('alamat_usaha')" placeholder="Alamat usaha">
                                {{ old('alamat_usaha') }}
                            </x-form.textarea>
                            <x-form.error errorFor="alamat_usaha" />
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 my-3">
                        <x-form.button-link href="{{ url('/') }}" class="w-1/10">Batal</x-form.button-link>
                        <x-form.button type="submit" class="w-1/10">Kirim</x-form.button>
                    </div>
                </div>
            </form> 
            
            <script>
                document.getElementById('btn-cari').addEventListener('click', function() {
                    const no_kk = document.getElementById('no_kk').value;

                    fetch("{{ route('user.domisili_usaha.cari') }}?no_kk=" + no_kk)
                    .then(response => {
                        if (!response.ok) throw Error('No. Kartu Keluarga tidak ditemukan!');
                        return response.json();
                    })
                    .then(data => {
                        document.getElementById('penduduk_id').value = data.penduduk_id;
                        document.getElementById('nama').value       = data.nama;
                        document.getElementById('ttl').value        = data.ttl;
                        document.getElementById('alamat').value     = data.alamat;
                    })
                    .catch(error => {
                        alert(error.message);
                    })
                });
            </script>
        </div>
    </div>
    
</x-layout>