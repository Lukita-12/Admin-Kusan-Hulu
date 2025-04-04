<x-layout>

    <div>
        <x-form.form-layout action="{{ route('user.penerbitan_akta_kelahiran.store') }}" enctype="multipart/form-data">
            
        <div>
                <x-form.form-label for="tanggal">
                    Tanggal pendaftaran
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal"
                    id="tanggal"
                    :value="old('tanggal')"
                    placeholder="Tanggal"
                    required />
                <x-form.form-error errorFor="tanggal" />
            </div>

            <div>
                <h1>YANG MENDAFTARKAN</h1>
            </div>

            <div>
                <x-form.form-label for="nama_pendaftar">
                    Nama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_pendaftar"
                    id="nama_pendaftar"
                    value="{{ old('nama_pendaftar') }}"
                    placeholder="Nama"
                    required />
                <x-form.form-error errorFor="nama_pendaftar" />
            </div>

            <div>
                <x-form.form-label for="tempat_tanggal_lahir">
                    Tempat tanggal lahir
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="tempat_tanggal_lahir"
                    id="tempat_tanggal_lahir"
                    value="{{ old('tempat_tanggal_lahir') }}"
                    placeholder="Tempat tanggal lahir..."
                    required />
                <x-form.form-error errorFor="tempat_tanggal_lahir" />
            </div>

            <div>
                <x-form.form-label for="jenis_kelamin_pendaftar">
                    Jenis kelamin
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="jenis_kelamin_pendaftar"
                    id="jenis_kelamin_pendaftar"
                    value="{{ old('jenis_kelamin_pendaftar') }}"
                    placeholder="Jenis kelamin..."
                    required />
                <x-form.form-error errorFor="jenis_kelamin_pendaftar" />
            </div>

            <div>
                <x-form.form-label for="agama">
                    Agama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="agama_pendaftar"
                    id="agama"
                    value="{{ old('agama') }}"
                    placeholder="Agama..."
                    required />
                <x-form.form-error errorFor="agama" />
            </div>

            <div>
                <x-form.form-label for="pekerjaan">
                    Pekerjaan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pekerjaan"
                    id="pekerjaan"
                    value="{{ old('pekerjaan') }}"
                    placeholder="Pekerjaan..."
                    required />
                <x-form.form-error errorFor="pekerjaan" />
            </div>

            <div>
                <x-form.form-label for="alamat">
                    Alamat
                </x-form.form-label>
                <x-form.form-textarea
                    type="text"
                    name="alamat"
                    id="alamat"
                    value="{{ old('alamat') }}"
                    placeholder="Alamat..."
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat" />
            </div>

            <div>
                <x-form.form-label for="hubungan_dengan_anakname">
                    Hubungan dengan anak
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="hubungan_dengan_anakname"
                    id="hubungan_dengan_anakname"
                    value="{{ old('hubungan_dengan_anakname') }}"
                    placeholder="Hubungan dengan anak..."
                    required />
                <x-form.form-error errorFor="hubungan_dengan_anakname" />
            </div>

            <div>
                <h1>MANGAJUKAN AKTA KELAHIRAN</h1>
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
                    placeholder="Nomor akta"
                     />
                <x-form.form-error errorFor="nomor_akta" />
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
                    placeholder="Nama anak"
                     />
                <x-form.form-error errorFor="nama_anak" />
            </div>

            <div>
                <x-form.form-label for="tempat_kelahiran">
                    Tempat tanggal kelahiran
                </x-form.form-label>
                <x-form.form-textarea
                    name="tempat_kelahiran"
                    id="tempat_kelahiran"
                    :value="old('tempat_kelahiran')"
                    placeholder="Hari-Bulan_Tahun" />
                <x-form.form-error errorFor="tempat_kelahiran" />
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
                <x-form.form-label for="jenis_kelahiran">
                    Jenis kelahiran
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="jenis_kelahiran"
                    id="jenis_kelahiran"
                    :value="old('jenis_kelahiran')"
                    placeholder="Jenis kelahiran..."
                     />
                <x-form.form-error errorFor="jenis_kelahiran" />
            </div>

            <div>
                <x-form.form-label for="anak_ke">
                    Anak ke
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="anak_ke"
                    id="anak_ke"
                    :value="old('anak_ke')"
                    placeholder="Anak ke..."
                     />
                <x-form.form-error errorFor="anak_ke" />
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
                <h1>ADALAH ANAK PERKAWINAN SAH</h1>
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
                    placeholder="Nama ayah"
                     />
                <x-form.form-error errorFor="nama_ayah" />
            </div>

            <div>
                <x-form.form-label for="tempat_tanggal_lahir">
                    Tempat tanggal lahir
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="tempat_tanggal_lahir"
                    id="tempat_tanggal_lahir"
                    value="{{ old('tempat_tanggal_lahir') }}"
                    placeholder="Tempat tanggal lahir..."
                    required />
                <x-form.form-error errorFor="tempat_tanggal_lahir" />
            </div>

            <div>
                <x-form.form-label for="jenis_kelamin">
                    Jenis kelamin
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="jenis_kelamin_ayah"
                    id="jenis_kelamin"
                    value="{{ old('jenis_kelamin') }}"
                    placeholder="Jenis kelamin..."
                    required />
                <x-form.form-error errorFor="jenis_kelamin" />
            </div>

            <div>
                <x-form.form-label for="agama">
                    Agama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="agama_ayah"
                    id="agama"
                    value="{{ old('agama') }}"
                    placeholder="Agama..."
                    required />
                <x-form.form-error errorFor="agama" />
            </div>

            <div>
                <x-form.form-label for="pekerjaan">
                    Pekerjaan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pekerjaan"
                    id="pekerjaan"
                    value="{{ old('pekerjaan') }}"
                    placeholder="Pekerjaan..."
                    required />
                <x-form.form-error errorFor="pekerjaan" />
            </div>

            <div>
                <x-form.form-label for="alamat">
                    Alamat
                </x-form.form-label>
                <x-form.form-textarea
                    type="text"
                    name="alamat"
                    id="alamat"
                    value="{{ old('alamat') }}"
                    placeholder="Alamat..."
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat" />
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
                    placeholder="Nama ibu"
                     />
                <x-form.form-error errorFor="nama_ibu" />
            </div>

            <div>
                <x-form.form-label for="tempat_tanggal_lahir">
                    Tempat tanggal lahir
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="tempat_tanggal_lahir"
                    id="tempat_tanggal_lahir"
                    value="{{ old('tempat_tanggal_lahir') }}"
                    placeholder="Tempat tanggal lahir..."
                    required />
                <x-form.form-error errorFor="tempat_tanggal_lahir" />
            </div>

            <div>
                <x-form.form-label for="jenis_kelamin">
                    Jenis kelamin
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="jenis_kelamin_ibu"
                    id="jenis_kelamin"
                    value="{{ old('jenis_kelamin') }}"
                    placeholder="Jenis kelamin..."
                    required />
                <x-form.form-error errorFor="jenis_kelamin" />
            </div>

            <div>
                <x-form.form-label for="agama">
                    Agama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="agama_ibu"
                    id="agama"
                    value="{{ old('agama') }}"
                    placeholder="Agama..."
                    required />
                <x-form.form-error errorFor="agama" />
            </div>

            <div>
                <x-form.form-label for="pekerjaan">
                    Pekerjaan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pekerjaan"
                    id="pekerjaan"
                    value="{{ old('pekerjaan') }}"
                    placeholder="Pekerjaan..."
                    required />
                <x-form.form-error errorFor="pekerjaan" />
            </div>

            <div>
                <x-form.form-label for="alamat">
                    Alamat
                </x-form.form-label>
                <x-form.form-textarea
                    type="text"
                    name="alamat"
                    id="alamat"
                    value="{{ old('alamat') }}"
                    placeholder="Alamat..."
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat" />
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
                <a href="{{ url('/') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>