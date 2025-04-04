<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.penduduk.store') }}">
            
            <div>
                <x-form.form-label for="desa">
                    Desa
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="desa"
                    id="desa"
                    value="{{ old('desa') }}"
                    placeholder="Desa"
                    required />
                <x-form.form-error errorFor="desa" />
            </div>

            
            <div>
                <x-form.form-label for="nokartu">
                    No. Kartu Keluarga
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nokartu"
                    id="nokartu"
                    value="{{ old('nokartu') }}"
                    placeholder="No. Kartu keluarga"
                    required />
                <x-form.form-error errorFor="nokartu" />
            </div>
            
            <div>
                <x-form.form-label for="nama">
                    Nama lengkap
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama"
                    id="nama"
                    :value="old('nama')"
                    placeholder="Nama lengkap..."
                    required />
                <x-form.form-error errorFor="nama" />
            </div>

            <div>
                <x-form.form-label for="jenis_kelamin">
                    Jenis kelamin
                </x-form.form-label>
                <x-form.form-select
                    name="jenis_kelamin"
                    id="jenis_kelamin"
                    :value="old('jenis_kelamin')"
                    required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </x-form.form-select>
                <x-form.form-error errorFor="jenis_kelamin" />
            </div>

            <div>
                <x-form.form-label for="status_perkawinan">
                    Status perkawinan
                </x-form.form-label>
                <x-form.form-select
                    name="status_perkawinan"
                    id="status_perkawinan"
                    :value="old('status_perkawinan')"
                    required>
                    <option value="Belum kawin">Belum kawin</option>
                    <option value="Kawin belum tercatat">Kawin belum tercatat</option>
                    <option value="Kawin tercatat">Kawin tercatat</option>
                    <option value="Cerai hidup">Cerai hidup</option>
                    <option value="Cerai mati">Cerai mati</option>
                </x-form.form-select>
                <x-form.form-error errorFor="status_perkawinan" />
            </div>

            <div>
                <x-form.form-label for="tempat_lahir">
                    Tempat lahir
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="tempat_lahir"
                    id="tempat_lahir"
                    :value="old('tempat_lahir')"
                    placeholder="Tempat lahir..."
                     />
                <x-form.form-error errorFor="tempat_lahir" />
            </div>

            <div>
                <x-form.form-label for="tanggal_lahir">
                    Tanggal lahir
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal_lahir"
                    id="tanggal_lahir"
                    :value="old('tanggal_lahir')"
                    placeholder="Tanggal lahir..."
                     />
                <x-form.form-error errorFor="tanggal_lahir" />
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
                <x-form.form-label for="pendidikan_terakhir">
                    Pendidikan terakhir
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pendidikan_terakhir"
                    id="pendidikan_terakhir"
                    :value="old('pendidikan_terakhir')"
                    placeholder="Pendidikan terakhir..."
                     />
                <x-form.form-error errorFor="pendidikan_terakhir" />
            </div>

            <div>
                <x-form.form-label for="pekerjaan">
                    Pekerjaan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pekerjaan"
                    id="pekerjaan"
                    :value="old('pekerjaan')"
                    placeholder="Pekerjaan..."
                     />
                <x-form.form-error errorFor="pekerjaan" />
            </div>

            <div>
                <x-form.form-label for="alamat_lengkap">
                    Alamat lengkap
                </x-form.form-label>
                <x-form.form-textarea
                    name="alamat_lengkap"
                    id="alamat_lengkap"
                    :value="old('alamat_lengkap')"
                    placeholder="Alamat lengkap..." />
                <x-form.form-error errorFor="alamat_lengkap" />
            </div>

            <div>
                <x-form.form-label for="kedudukan_dalam_keluarga">
                    Kedudukan dalam keluarga
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="kedudukan_dalam_keluarga"
                    id="kedudukan_dalam_keluarga"
                    :value="old('kedudukan_dalam_keluarga')"
                    placeholder="Kedudukan dalam keluarga..."
                     />
                <x-form.form-error errorFor="kedudukan_dalam_keluarga" />
            </div>

            <div>
                <x-form.form-label for="warga_negara">
                    Warga negara
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="warga_negara"
                    id="warga_negara"
                    :value="old('warga_negara')"
                    placeholder="Warga negara..."
                     />
                <x-form.form-error errorFor="warga_negara" />
            </div>

            <div>
                <a href="{{ route('admin.penduduk.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>