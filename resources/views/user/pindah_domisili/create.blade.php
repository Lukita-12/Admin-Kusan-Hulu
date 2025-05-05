<x-user-layout>

    <x-slot:heading>
        PINDAH DOMISILI
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('user.pindah_domisili.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="nik">NIK</x-form.label>
                    <x-form.container variant="search">
                        <x-form.container variant="input-error">
                            <x-form.input type="text" name="no_kk" id="no_kk" :value="old('no_kk')" placeholder="NIK..." required />
                            <x-form.error errorFor="no_kk" />
                        </x-form.container>
                        <x-form.button variant="search" type="button" id="btn-cari" class="min-w-1/4">Cari</x-form.button>
                    </x-form.container>
                </x-form.container>

                <!-- Penduduk id -->
                <x-form.input type="hidden" id="penduduk_id" name="penduduk_id" />
                
                <x-form.container variant="label-input">
                    <x-form.label for="nama">Nama</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama" id="nama" :value="old('nama')" placeholder="Nama" readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="nama" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="label-input">
                    <x-form.label for="ttl">Tempat Tanggal Lahir</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="ttl" id="ttl" :value="old('ttl')" placeholder="Tempat tanggal lahir..." readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="ttl" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="jenis_kelamin">Jenis Kelamin</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="jenis_kelamin" id="jenis_kelamin" :value="old('jenis_kelamin')" placeholder="Jenis kelamin..." readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="jenis_kelamin" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="status_perkawinan">Status Perkawinan</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" id="status_perkawinan" name="status_perkawinan" :value="old('status_perkawinan')" placeholder="Status perkawinan..." readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="status_perkawinan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="agama">Agama</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="agama" id="agama" :value="old('agama')" placeholder="Agama..." readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="agama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="pekerjaan">Pekerjaan</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" id="pekerjaan" name="pekerjaan" :value="old('pekerjaan')" placeholder="Pekerjaan..." readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="warga_negara" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="warga_negara">Warga Negara</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" id="warga_negara" name="warga_negara" :value="old('warga_negara')" placeholder="Warga negara..." readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="warga_negara" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="pendidikan_terakhir">Pendidikan Terakhir</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" :value="old('pendidikan_terakhir')" placeholder="Pendidikan terakhir..." readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="pendidikan_terakhir" />
                    </x-form.container>
                </x-form.container>

                <x-form.span variant="dashed" />

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_asal">Alamat Asal</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat_asal" id="alamat_asal" placeholder="Alamat asal..." >
                            {{ old('alamat_asal') }}
                        </x-form.textarea>
                        <x-form.error errorFor="alamat_asal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tujuan">Tujuan</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea name="tujuan" id="tujuan" placeholder="Tujuan..." required>
                            {{ old('tujuan') }}
                        </x-form.textarea>
                        <x-form.error errorFor="tujuan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alasan_pindah">Alasan pindah</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea name="alasan_pindah" id="alasan_pindah" placeholder="Alasan pindah..." required>
                            {{ old('alasan_pindah') }}
                        </x-form.textarea>
                        <x-form.error errorFor="alasan_pindah" />
                    </x-form.container>
                </x-form.container>
                
                <x-form.container variant="button">
                    <x-form.button-link href="{{ url('/') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>

    <script>
        document.getElementById('btn-cari').addEventListener('click', function() {
            const no_kk = document.getElementById('no_kk').value;

            fetch("{{ route('user.pindah_domisili.cari') }}?no_kk=" + no_kk)
            .then(response => {
                if (!response.ok) throw Error('No. Kartu Keluarga tidak ditemukan!');
                return response.json();
            })
            .then(data => {
                document.getElementById('penduduk_id').value        = data.penduduk_id;
                document.getElementById('nama').value               = data.nama;
                document.getElementById('ttl').value                = data.ttl;
                document.getElementById('jenis_kelamin').value      = data.jenis_kelamin;
                document.getElementById('status_perkawinan').value  = data.status_perkawinan;
                document.getElementById('agama').value              = data.agama;
                document.getElementById('pekerjaan').value          = data.pekerjaan;
                document.getElementById('warga_negara').value       = data.warga_negara;
                document.getElementById('pendidikan_terakhir').value = data.pendidikan_terakhir;
            })
            .catch(error => {
                alert(error.message);
            })
        });
    </script>
    
</x-user-layout>