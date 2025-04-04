<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.penerbitan_akta_kelahiran.update', $penerbitanAktaKelahiran->id) }}" enctype="multipart/form-data">
            @method('PUT')
            
            <div>
                <x-form.form-label for="nama_penduduk">
                    Nama penduduk
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_penduduk"
                    id="nama_penduduk"
                    value="{{ old('nama_penduduk', $penerbitanAktaKelahiran->penduduk->nama ) }}"
                    required />
                <x-form.form-error errorFor="nama_penduduk" />
            </div>
            
            <div>
                <x-form.form-label for="tanggal">
                    Tanggal
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal"
                    id="tanggal"
                    value="{{ $penerbitanAktaKelahiran->tanggal }}"
                    placeholder="Tanggal..."
                    required />
                <x-form.form-error errorFor="tanggal" />
            </div>

            <div>
                <x-form.form-label for="nomor_akta">
                    Nomor akta
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nomor_akta"
                    id="nomor_akta"
                    value="{{ $penerbitanAktaKelahiran->nomor_akta }}"
                    placeholder="Nomor akta..."
                     />
                <x-form.form-error errorFor="nomor_akta" />
            </div>

            <div>
                <x-form.form-label for="tempat_kelahiran">
                    Tempat kelahiran
                </x-form.form-label>
                <x-form.form-textarea
                    name="tempat_kelahiran"
                    id="tempat_kelahiran"
                    placeholder="Tempat kelahiran...">
                    {{ $penerbitanAktaKelahiran->tempat_kelahiran }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="tempat_kelahiran" />
            </div>

            <div>
                <x-form.form-label for="nama_anak">
                    Nama anak
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_anak"
                    id="nama_anak"
                    value="{{ $penerbitanAktaKelahiran->nama_anak }}"
                    placeholder="Nama anak..."
                     />
                <x-form.form-error errorFor="nama_anak" />
            </div>

            <div>
                <x-form.form-label for="jenis_kelamin">
                    Jenis kelamin
                </x-form.form-label>
                <x-form.form-select
                    name="jenis_kelamin"
                    id="jenis_kelamin"
                    required>
                    <option value="{{ $penerbitanAktaKelahiran->jenis_kelamin }}">{{ $penerbitanAktaKelahiran->jenis_kelamin }}</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </x-form.form-select>
                <x-form.form-error errorFor="jenis_kelamin" />
            </div>

            <div>
                <x-form.form-label for="agama">
                    Agama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="agama"
                    id="agama"
                    value="{{ $penerbitanAktaKelahiran->nama_anak }}"
                    placeholder="Agama..."
                     />
                <x-form.form-error errorFor="agama" />
            </div>

            <div>
                <x-form.form-label for="nama_ayah">
                    Nama ayah
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_ayah"
                    id="nama_ayah"
                    value="{{ $penerbitanAktaKelahiran->nama_ayah }}"
                    placeholder="Nama ayah..."
                     />
                <x-form.form-error errorFor="nama_ayah" />
            </div>

            <div>
                <x-form.form-label for="nama_ibu">
                    Nama ibu
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_ibu"
                    id="nama_ibu"
                    value="{{ $penerbitanAktaKelahiran->nama_ibu }}"
                    placeholder="Nama ibu..."
                     />
                <x-form.form-error errorFor="nama_ibu" />
            </div>

            <div>
                <x-form.form-label for="upload_sp_bidan">
                    Surat keterangan dari bidan
                </x-form.form-label>
                <div>
                    <img src="{{ asset('storage/' . $penerbitanAktaKelahiran->upload_sp_bidan) }}" class="w-12 h-12" alt="Profile Picture">
                </div>
                <x-form.form-input
                    type="file"
                    name="upload_sp_bidan"
                    id="upload_sp_bidan"
                    accept="image/*"
                    value="{{ $penerbitanAktaKelahiran->upload_sp_bidan }}"
                    />
                <x-form.form-error errorFor="upload_sp_bidan" />
            </div>

            <div>
                <x-form.form-label for="upload_sp_rt">
                    Surat keterangan dari RT
                </x-form.form-label>
                <div>
                    <img src="{{ asset('storage/' . $penerbitanAktaKelahiran->upload_sp_rt) }}" class="w-12 h-12" alt="Profile Picture">
                </div>
                <x-form.form-input
                    type="file"
                    name="upload_sp_rt"
                    id="upload_sp_rt"
                    accept="image/*"
                    value="{{ $penerbitanAktaKelahiran->upload_sp_rt }}"
                    />
                <x-form.form-error errorFor="upload_sp_rt" />
            </div>

            <div>
                <a href="{{ route('admin.penerbitan_akta_kelahiran.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>