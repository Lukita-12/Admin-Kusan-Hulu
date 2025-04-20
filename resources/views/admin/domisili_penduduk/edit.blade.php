<x-layout>
    <x-container.dashboard>

        <x-sidebar.sidebar />

        <x-container.main class="px-12 py-6">
            <x-form.form action="{{ route('admin.domisili_penduduk.update', $domisiliPenduduk) }}">
                @method('PUT')
        
                <x-container.form>
                    <x-container.label-input>
                        <x-form.label for="nomor_surat">Nomor Surat</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->nomor_surat }}"
                            type="text" name="nomor_surat" id="nomor_surat" placeholder="Nomor surat" required />
                    </x-container.label-input>

                    <div class="w-full flex gap-3">
                        <x-container.label-input>
                            <x-form.label for="tanggal_pengajuan">Tanggal Pengajuan</x-form.label>
                            <x-form.input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan"
                                value="{{ $domisiliPenduduk->tanggal_pengajuan->format('Y-m-d') }}" />
                        </x-container.label-input>

                        <x-container.label-input>
                            <x-form.label for="status">Status</x-form.label>
                            <select type="text" id="status" name="status" class="bg-slate-100 w-full px-4 py-1 text-xl text-slate-700 rounded-lg">
                                <option value="{{ $domisiliPenduduk->status }}">{{ $domisiliPenduduk->status }}</option>
                                <option value="Diajukan">Diajukan</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </x-container.label-input>
                    </div>
        
                    <x-container.label-input>
                        <x-form.label for="no_kk">No. Kartu Keluarga</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->penduduk->kartukeluarga->no_kk }}"
                            type="text" id="nama" name="nama" readonly onfocus="this.blur();" />
                    </x-container.label-input>
        
                    <x-container.label-input>
                        <x-form.label for="nama">Nama</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->penduduk->nama }}"
                            type="text" id="nama" name="nama" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="ttl">Tempat, Tanggal Lahir</x-form.label>
                        <div class="flex gap-2">
                            <x-form.input value="{{ $domisiliPenduduk->penduduk->tempat_lahir }}"
                                type="text" id="tempat_lahir" name="tempat_lahir" readonly onfocus="this.blur();" />
                            <x-form.input value="{{ $domisiliPenduduk->penduduk->tanggal_lahir->format('d M Y') }}"
                            type="text" id="tanggal_lahir" name="tanggal_lahir" readonly onfocus="this.blur();" />
                        </div>
                    </x-container.label-input>    
            
                    <x-container.label-input>
                        <x-form.label for="jenis_kelamin">Jenis Kelamin</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->penduduk->jenis_kelamin }}"
                            type="text" id="jenis_kelamin" name="jenis_kelamin" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="status_perkawinan">Status Perkawinan</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->penduduk->status_perkawinan }}"
                            type="text" id="status_perkawinan" name="status_perkawinan" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="agama">Agama</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->penduduk->agama }}"
                            type="text" id="agama" name="agama" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="pekerjaan">Pekerjaan</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->penduduk->pekerjaan }}"
                            type="text" id="pekerjaan" name="pekerjaan" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="warga_negara">Warga Negara</x-form.label>
                        <x-form.input value="{{ $domisiliPenduduk->penduduk->warga_negara }}"
                            type="text" id="warga_negara" name="warga_negara" readonly onfocus="this.blur();" />
                    </x-container.label-input>
            
                    <x-container.label-input>
                        <x-form.label for="alamat">Alamat</x-form.label>
                        <x-form.textarea type="text" id="alamat" name="alamat" rows="4" readonly onfocus="this.blur();">
                            {{ $domisiliPenduduk->penduduk->alamat_lengkap }}
                        </x-form.textarea>
                    </x-container.label-input>
        
                    <x-container.form-button>
                        <x-form.button-link href="{{ route('admin.domisili_penduduk.index') }}" class="w-1/10">Batal</x-form.button-link>
                        <x-form.button type="submit" class="w-1/10">Simpan</x-form.button>
                    </x-container.form-button>
                </x-container.form>
        
            </x-form.form>
        </x-container.main>

    </x-container.dashboard>


</x-layout>