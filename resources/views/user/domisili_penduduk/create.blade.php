<x-layout>

    <x-container.dashboard>
        <x-sidebar.sidebar />
        
        <x-container.main class="px-12 py-6">
            <x-form.form action="{{ route('user.domisili_penduduk.store') }}" class="w-full flex flex-col items-center shadow">
                @csrf

                <x-container.form>
                    <x-container.label-input>
                        <x-form.label for="no_kk">Nomor Kartu Keluarga</x-form.label>
                        <div class="flex gap-3">
                            <x-form.input type="text" id="no_kk" name="no_kk" placeholder="Cari..." />
                            <x-form.button type="button" id="btn-cari" class="w-1/4">Cari</x-form.button>
                        </div>
                        <x-form.error errorFor="no_kk" />
                    </x-container.label-input>

                    <!-- Penduduk ID -->
                    <x-form.input type="hidden" id="penduduk_id" name="penduduk_id" />
            
                    <x-container.label-input>
                        <x-form.label for="nama">Nama</x-form.label>
                        <x-form.input type="text" id="nama" name="nama" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="ttl">Tempat, Tanggal Lahir</x-form.label>
                        <x-form.input type="text" id="ttl" name="ttl" readonly onfocus="this.blur();" />
                    </x-container.label-input>    
            
                    <x-container.label-input>
                        <x-form.label for="jenis_kelamin">Jenis Kelamin</x-form.label>
                        <x-form.input type="text" id="jenis_kelamin" name="jenis_kelamin" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="status_perkawinan">Status Perkawinan</x-form.label>
                        <x-form.input type="text" id="status_perkawinan" name="status_perkawinan" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="agama">Agama</x-form.label>
                        <x-form.input type="text" id="agama" name="agama" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="pekerjaan">Pekerjaan</x-form.label>
                        <x-form.input type="text" id="pekerjaan" name="pekerjaan" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="warga_negara">Warga Negara</x-form.label>
                        <x-form.input type="text" id="warga_negara" name="warga_negara" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="alamat">Alamat</x-form.label>
                        <x-form.textarea type="text" id="alamat" name="alamat" rows="4" readonly onfocus="this.blur();"></x-form.textarea>
                    </x-container.label-input>
            
                    <div class="flex justify-end gap-3">
                        <x-form.button-link href="#">Batal</x-form.button-link>
                        <x-form.button type="submit">Buat</x-form.button>
                    </div>
                </x-container.form>
            </x-form.form>

            <script>
                document.getElementById('btn-cari').addEventListener('click', function() {
                    const no_kk = document.getElementById('no_kk').value;

                    fetch("{{ route('domisili-usaha.cari') }}?no_kk=" + no_kk)
                        .then(response => {
                            if (!response.ok) throw new Error('KK tidak ditemukan');
                            return response.json();
                        })
                        .then(data => {
                            document.getElementById('penduduk_id').value = data.penduduk_id;
                            document.getElementById('nama').value = data.nama;
                            document.getElementById("ttl").value = data.ttl;
                            document.getElementById('jenis_kelamin').value = data.jenis_kelamin;
                            document.getElementById('status_perkawinan').value = data.status_perkawinan;
                            document.getElementById('agama').value = data.agama;
                            document.getElementById('pekerjaan').value = data.pekerjaan;
                            document.getElementById('warga_negara').value = data.warga_negara;
                            document.getElementById('alamat').value = data.alamat;
                        })
                        .catch(error => {
                            alert(error.message);
                        });
                });
            </script>
        </x-container.main>
    </x-container.dashboard>

</x-layout>