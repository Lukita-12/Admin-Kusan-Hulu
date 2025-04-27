<x-layout>

    <x-form.form-container>
        <x-form.form action="{{ route('user.pindah_domisili.store') }}">
            <x-form.form-layout>
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
                    <x-form.label for="nama">Nama</x-form.label>
                    <x-form.input type="text" name="nama" id="nama" :value="old('nama')" placeholder="Nama" readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="nama" />
                </div>
    
                <div class="flex">
                    <x-form.label for="ttl">Tempat Tanggal Lahir</x-form.label>
                    <x-form.input type="text" name="ttl" id="ttl" :value="old('ttl')" placeholder="Tempat tanggal lahir..." readonly onfocus="this.blur();" required/>
                    <x-form.error errorFor="ttl" />
                </div>
    
                <div class="flex">
                    <x-form.label for="jenis_kelamin">Jenis Kelamin</x-form.label>
                    <x-form.input type="text" name="jenis_kelamin" id="jenis_kelamin" :value="old('jenis_kelamin')" placeholder="Jenis kelamin..." readonly onfocus="this.blur();" required/>
                    <x-form.error errorFor="jenis_kelamin" />
                </div>
    
                <div class="flex">
                    <x-form.label for="pekerjaan">Pekerjaan</x-form.label>
                    <x-form.input type="text" name="pekerjaan" id="pekerjaan" :value="old('pekerjaan')" placeholder="Pekerjaan..." readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="pekerjaan" />
                </div>
    
                <div class="flex">
                    <x-form.label for="agama">Agama</x-form.label>
                    <x-form.input type="text" name="agama" id="agama" :value="old('agama')" placeholder="Agama..." readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="agama" />
                </div>
    
                <div class="flex">
                    <x-form.label for="status_perkawinan">Status Perkawinan</x-form.label>
                    <x-form.input type="text" name="status_perkawinan" id="status_perkawinan" :value="old('status_perkawinan')" placeholder="Status perkawinan..." readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="status_perkawinan" />
                </div>
    
                <div class="flex">
                    <x-form.label for="warga_negara">Warga Negara</x-form.label>
                    <x-form.input type="text" name="warga_negara" id="warga_negara" :value="old('warga_negara')" placeholder="Warga negara..." readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="warga_negara" />
                </div>
    
                <div class="flex">
                    <x-form.label for="pendidikan_terakhir">Pendidikan Terakhir</x-form.label>
                    <x-form.input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" :value="old('pendidikan_terakhir')" placeholder="Pendidikan terakhir..." readonly onfocus="this.blur();"/>
                    <x-form.error errorFor="pendidikan_terakhir" />
                </div>
    
                <x-form.span-dashed />
    
                <div class="flex">
                    <x-form.label>Alamat Asal</x-form.label>
                    <x-form.textarea type="text" name="alamat_asal" id="alamat_asal" :value="old('alamat_asal')" placeholder="Alamat asal..." required>
                        {{ old('alamat_asal') }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_asal" />
                </div>
    
                <div class="flex">
                    <x-form.label>Tujuan</x-form.label>
                    <x-form.textarea type="text" name="tujuan" id="tujuan" :value="old('tujuan')" placeholder="Tujuan..." required>
                        {{ old('tujuan') }}
                    </x-form.textarea>
                    <x-form.error errorFor="tujuan" />
                </div>
    
                <div class="flex">
                    <x-form.label>Alasan Pindah</x-form.label>
                    <x-form.textarea type="text" name="alasan_pindah" id="alasan_pindah" :value="old('alasan_pindah')" placeholder="Alasan pindah..." required>
                        {{ old('alasan_pindah') }}
                    </x-form.textarea>
                    <x-form.error errorFor="alasan_pindah" />
                </div>

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
                document.getElementById('pekerjaan').value          = data.pekerjaan;
                document.getElementById('agama').value              = data.agama;
                document.getElementById('status_perkawinan').value  = data.status_perkawinan;
                document.getElementById('warga_negara').value       = data.warga_negara;
                document.getElementById('pendidikan_terakhir').value = data.pendidikan_terakhir;
            })
            .catch(error => {
                alert(error.message);
            })
        });
    </script>
    
</x-layout>