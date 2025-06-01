<x-user-layout>
    
    <x-slot:heading>
        PENERBITAN AKTA KELAHIRAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('user.penerbitan_akta_kelahiran.store') }}" enctype="multipart/form-data">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="nik">Nik</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nik" id="nik" :value="old('nik', $user->dataPenduduk->nik)" placeholder="nik" readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="nik" />
                    </x-form.container>
                </x-form.container>

                <!-- Penduduk id -->
                <x-form.input type="hidden" id="data_penduduk_id" name="data_penduduk_id" :value="old('nik', $user->dataPenduduk->id)"/>

                <x-form.container variant="label-input">
                    <x-form.label for="nama">Nama</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama" id="nama" :value="old('nama', $user->dataPenduduk->nama)" placeholder="Nama" readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="nama" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_lahir">Tanggal Lahir</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="tanggal_lahir" id="tanggal_lahir" :value="old('tanggal_lahir', $user->dataPenduduk->tanggal_lahir)" placeholder="tanggal lahir..." readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="tanggal_lahir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="jenis_kelamin">Jenis Kelamin</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="jenis_kelamin" id="jenis_kelamin" :value="old('jenis_kelamin', $user->dataPenduduk->jenis_kelamin)" placeholder="Jenis kelamin..." readonly onfocus="this.blur();" required/>
                        <x-form.error errorFor="jenis_kelamin" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="agama">Agama</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="agama" id="agama" :value="old('agama', $user->dataPenduduk->agama)" placeholder="Agama..." readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="agama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="pekerjaan">Pekerjaan</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" id="pekerjaan" name="pekerjaan" :value="old('pekerjaan', $user->dataPenduduk->pekerjaan)" placeholder="Pekerjaan..." readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="warga_negara" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_lengkap">Alamat</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea type="text" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat..." readonly onfocus="this.blur();" required>
                            {{ old('alamat_lengkap', $user->dataPenduduk->alamat_lengkap) }}
                        </x-form.textarea>
                    </x-form.container>
                    <x-form.error errorFor="alamat_lengkap" />
                </x-form.container>

                <x-form.span variant="dashed" />

                <x-form.container variant="label-input">
                    <x-form.label for="nama_anak">Nama Anak</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_anak" id="nama_anak" :value="old('nama_anak')" placeholder="Nama anak..." />
                        <x-form.error errorFor="nama_anak" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nama_ayah">Nama ayah</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_ayah" id="nama_ayah" :value="old('nama_ayah')" placeholder="Nama ayah..." required />
                        <x-form.error errorFor="nama_ayah" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nama_ibu">Nama ibu</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_ibu" id="nama_ibu" :value="old('nama_ibu')" placeholder="Nama ibu..." required />
                        <x-form.error errorFor="nama_ibu" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tempat_kelahiran">Tempat kelahiran</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea name="tempat_kelahiran" id="tempat_kelahiran" placeholder="Tempat kelahiran..." required >{{ old('tempat_kelahiran') }}</x-form.textarea>
                        <x-form.error errorFor="tempat_kelahiran" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="jenis_kelamin">Jenis kelamin</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.select name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </x-form.select>
                        <x-form.error errorFor="jenis_kelamin" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="agama">Agama</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="agama" id="agama" :value="old('agama')" placeholder="Agama..." required />
                        <x-form.error errorFor="agama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="upload_sp_bidan">Surat keterangan dari bidan</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="file" name="upload_sp_bidan" id="upload_sp_bidan" accept="image/*" :value="old('upload_sp_bidan')" />
                        <x-form.error errorFor="upload_sp_bidan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="upload_sp_rt">Surat keterangan dari RT</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="file" name="upload_sp_rt" id="upload_sp_rt" accept="image/*" :value="old('upload_sp_rt')" />
                        <x-form.error errorFor="upload_sp_rt" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('beranda') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>
                @if (session('success'))
                    <div class="mt-2 p-2 rounded bg-green-100 text-green-800 border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

            </x-form.container>
        </x-form.form>
    </x-form.container>

    <script>
        document.getElementById('btn-cari').addEventListener('click', function() {
            const no_kk = document.getElementById('no_kk').value;

            fetch("{{ route('user.penerbitan_akta_kelahiran.cari') }}?no_kk=" + no_kk)
            .then(response => {
                if (!response.ok) throw Error('No. Kartu Keluarga tidak ditemukan!');
                return response.json();
            })
            .then(data => {
                document.getElementById('penduduk_id').value    = data.penduduk_id;
                document.getElementById('nama').value           = data.nama;
                document.getElementById('ttl').value            = data.ttl;
                document.getElementById('jenis_kelamin').value  = data.jenis_kelamin;
                document.getElementById('agama').value          = data.agama;
                document.getElementById('pekerjaan').value      = data.pekerjaan;
                document.getElementById('alamat_lengkap').value = data.alamat_lengkap;
            })
            .catch(error => {
                alert(error.message);
            })
        });
    </script>
    
</x-user-layout>