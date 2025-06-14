<x-user-layout>

    <x-slot:heading>
        AKTA KEMATIAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('user.akta_kematian.store') }}">
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
                        <x-form.input type="text" name="tanggal_lahir" id="tanggal_lahir" :value="old('tanggal_lahir', $user->dataPenduduk->tanggal_lahir)" placeholder=" tanggal lahir..." readonly onfocus="this.blur();" required/>
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
                    <x-form.label for="alamat">Alamat</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea type="text" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat..." readonly onfocus="this.blur();" required>
                            {{ old('alamat_lengkap', $user->dataPenduduk->alamat_lengkap) }}
                        </x-form.textarea>
                    </x-form.container>
                    <x-form.error errorFor="alamat_lengkap" />
                </x-form.container>

                <x-form.span variant="dashed" />

             <x-form.container variant="label-input">
                    <x-form.label for="nama_alm">Nama Alm</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_alm" id="nama_alm" :value="old('nama_alm')" placeholder="Nama Alm..." required />
                        <x-form.error errorFor="nama_alm" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_meninggal">Tanggal Meninggal</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="tanggal_meninggal" id="tanggal_meninggal" :value="old('tanggal_meninggal')" placeholder="Tanggal meninggal..." required />
                        <x-form.error errorFor="tanggal_meninggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tempat_meninggal">Tempat Meninggal</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea name="tempat_meninggal" id="tempat_meninggal" placeholder="Tempat meninggal..." required >{{ old('tempat_meninggal') }}</x-form.textarea>
                        <x-form.error errorFor="tempat_meninggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="penyebab_meninggal">Penyebab meninggal</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea name="penyebab_meninggal" id="penyebab_meninggal" :value="old('penyebab_meninggal')" placeholder="Penyebab meninggal..." required >{{ old('penyebab_meninggal') }}</x-form.textarea>
                        <x-form.error errorFor="penyebab_meninggal" />
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
                document.getElementById('alamat_lengkap').value = data.alamat_lengkap;
            })
            .catch(error => {
                alert(error.message);
            })
        });
    </script>
    
</x-user-layout>