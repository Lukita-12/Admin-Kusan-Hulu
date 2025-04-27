<x-layout>

    <x-form.form-container>
        <x-form.form action="{{ route('user.akta_kematian.store') }}">
            <x-form.form-layout>
                <x-form.label-input>
                    <x-form.label>NIK</x-form.label>
                    <div class="w-full flex gap-3">
                        <x-form.input type="text" name="no_kk" id="no_kk" :value="old('no_kk')" placeholder="NIK..." required />
                        <x-form.button type="button" id="btn-cari" class="min-w-1/4">Cari</x-form.button>
                        <x-form.error errorFor="no_kk" />
                    </div>
                </x-form.label-input>

                <!-- Penduduk id -->
                <x-form.input type="hidden" id="penduduk_id" name="penduduk_id" />
                
                <x-form.label-input>
                    <x-form.label for="nama">Nama</x-form.label>
                    <x-form.input type="text" name="nama" id="nama" :value="old('nama')" placeholder="Nama" readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="nama" />
                </x-form.label-input>
    
                <x-form.label-input>
                    <x-form.label for="ttl">Tempat Tanggal Lahir</x-form.label>
                    <x-form.input type="text" name="ttl" id="ttl" :value="old('ttl')" placeholder="Tempat tanggal lahir..." readonly onfocus="this.blur();" required/>
                    <x-form.error errorFor="ttl" />
                </x-form.label-input>
    
                <x-form.label-input>
                    <x-form.label for="jenis_kelamin">Jenis Kelamin</x-form.label>
                    <x-form.input type="text" name="jenis_kelamin" id="jenis_kelamin" :value="old('jenis_kelamin')" placeholder="Jenis kelamin..." readonly onfocus="this.blur();" required/>
                    <x-form.error errorFor="jenis_kelamin" />
                </x-form.label-input>

                <x-form.label-input>
                    <x-form.label for="agama">Agama</x-form.label>
                    <x-form.input type="text" name="agama" id="agama" :value="old('agama')" placeholder="Agama..." readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="agama" />
                </x-form.label-input>

                <x-form.label-input>
                    <x-form.label for="alamat">Alamat</x-form.label>
                    <x-form.textarea type="text" name="alamat_lengkap" id="alamat_lengkap" :value="old('alamat_lengkap')" placeholder="Alamat..." readonly onfocus="this.blur();" required>
                        {{ old('alamat_lengkap') }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_lengkap" />
                </x-form.label-input>

                <x-form.span-dashed />

                <x-form.label-input>
                    <x-form.label for="tanggal_meninggal">Tanggal Meninggal</x-form.label>
                    <x-form.input type="date" name="tanggal_meninggal" id="tanggal_meninggal" :value="old('tanggal_meninggal')" required />
                    <x-form.error errorFor="tanggal_meninggal" />
                </x-form.label-input>

                <x-form.label-input>
                    <x-form.label for="tempat_meninggal">Tempat Meninggal</x-form.label>
                    <x-form.textarea type="date" name="tempat_meninggal" id="tempat_meninggal" placeholder="Tempat meninggal" required>
                        {{ old('tempat_meninggal') }}
                    </x-form.textarea>
                    <x-form.error errorFor="tempat_meninggal" />
                </x-form.label-input>

                <x-form.label-input>
                    <x-form.label for="penyebab_meninggal">Penyebab Meninggal</x-form.label>
                    <x-form.textarea name="penyebab_meninggal" id="penyebab_meninggal" :value="old('penyebab_meninggal')" placeholder="Penyebab meninggal" required>
                        {{ old('penyebab_meninggal') }}
                    </x-form.textarea>
                    <x-form.error errorFor="penyebab_meninggal" />
                </x-form.label-input>

                <x-form.button-container>
                    <x-form.button-link href="{{ url('/') }}" class="w-1/10">Batal</x-form.button-link>
                    <x-form.button type="submit" class="w-1/10">Kirim</x-form.button>
                </x-form.button-container>
            </x-form.form-layout>
        </x-form.form>
    </x-form.form-container>

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
    
</x-layout>