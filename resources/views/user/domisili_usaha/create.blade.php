<x-user-layout>
    <x-slot:heading>
        DOMISILI USAHA
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('user.domisili_usaha.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="nik">Nik</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nik" id="nik" :value="old('nik', $user->dataPenduduk->nik)" placeholder="nik" readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="nik" />
                    </x-form.container>
                </x-form.container>

                <!-- Penduduk id -->
                <x-form.input type="hidden" id="penduduk_id" name="penduduk_id" />
                
                <x-form.container variant="label-input">
                    <x-form.label for="nama">Nama</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama" id="nama" :value="old('nama', $user->dataPenduduk->nama)" placeholder="Nama" readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="nama" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="label-input">
                    <x-form.label for="tempat_lahir">Tempat Lahir</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="tempat_lahir" id="tempat_lahir" :value="old('tempat_lahir', $user->dataPenduduk->tempat_lahir)" placeholder="Tempat tanggal lahir..." readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="tempat_lahir" />
                    </x-form.container>
                </x-form.container>

                 <x-form.container variant="label-input">
                    <x-form.label for="tanggal_lahir">Tempat Tanggal Lahir</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="tanggal_lahir" id="tanggal_lahir" :value="old('tanggal_lahir', $user->dataPenduduk->tanggal_lahir)" placeholder="Tempat tanggal lahir..." readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="tanggal_lahir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_lengkap">alamat_lengkap</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea type="text" name="alamat_lengkap" id="alamat_lengkap" placeholder="alamat_lengkap..." readonly onfocus="this.blur();" required>
                            {{ old('alamat_lengkap', $user->dataPenduduk->alamat_lengkap) }}
                        </x-form.textarea>
                    </x-form.container>
                    <x-form.error errorFor="alamat" />
                </x-form.container>

                <x-form.span variant="dashed" />

                <x-form.container variant="label-input">
                    <x-form.label for="nama_usaha">Nama Usaha</x-form.label>
    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_usaha" id="nama_usaha" :value="old('nama_usaha')" placeholder="Nama usaha..." required />
                        <x-form.error errorFor="nama_usaha" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="label-input">
                    <x-form.label for="jenis_usaha">Jenis Usaha</x-form.label>
    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="jenis_usaha" id="jenis_usaha" :value="old('jenis_usaha')" placeholder="Jenis usaha..." required />
                        <x-form.error errorFor="jenis_usaha" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_usaha">Alamat usaha</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha" required>{{ old('alamat_usaha') }}</x-form.textarea>
                        <x-form.error errorFor="alamat_usaha" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('beranda') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>
    
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
    
</x-user-layout>