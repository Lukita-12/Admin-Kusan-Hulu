<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.penerbitan_akta_kelahiran.store') }}" enctype="multipart/form-data">
            
            <div>
                <x-form.form-label for="nama_penduduk">
                    Nama penduduk
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_penduduk"
                    id="nama_penduduk"
                    value="{{ old('nama_penduduk') }}"
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
                    :value="old('tanggal')"
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
                    :value="old('nomor_akta')"
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
                    :value="old('tempat_kelahiran')"
                    placeholder="Tempat kelahiran..." />
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
                    :value="old('nama_anak')"
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
                    :value="old('agama')"
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
                    :value="old('nama_ayah')"
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
                    :value="old('nama_ibu')"
                    placeholder="Nama ibu..."
                     />
                <x-form.form-error errorFor="nama_ibu" />
            </div>

            <div>
                <x-form.form-label for="upload_sp_bidan">
                    Surat keterangan dari bidan
                </x-form.form-label>
                <x-form.form-input
                    type="file"
                    name="upload_sp_bidan"
                    id="upload_sp_bidan"
                    accept="image/*"
                    :value="old('upload_sp_bidan')"
                    required />
                <x-form.form-error errorFor="upload_sp_bidan" />
            </div>

            <div>
                <x-form.form-label for="upload_sp_rt">
                    Surat keterangan dari RT
                </x-form.form-label>
                <x-form.form-input
                    type="file"
                    name="upload_sp_rt"
                    id="upload_sp_rt"
                    accept="image/*"
                    :value="old('upload_sp_rt')"
                    required />
                <x-form.form-error errorFor="upload_sp_rt" />
            </div>

            <div>
                <a href="{{ route('admin.penerbitan_akta_kelahiran.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>