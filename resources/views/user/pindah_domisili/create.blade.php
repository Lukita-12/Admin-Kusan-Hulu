<x-layout>

    <div>
        <x-form.form-layout action="{{ route('user.pindah_domisili.store') }}">

            <div>
                <x-form.form-label for="penduduk_name">
                    Nama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="penduduk_name"
                    id="penduduk_name"
                    :value="old('penduduk_name')"
                    placeholder="Nama"
                    required />
                <x-form.form-error errorFor="penduduk_name" />
            </div>

            <div>
                <x-form.form-label for="tempat_tanggal_lahir">
                    Tempat tanggal lahir
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="tempat_tanggal_lahir"
                    id="tempat_tanggal_lahir"
                    :value="old('tempat_tanggal_lahir')"
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
                    name="jenis_kelamin"
                    id="jenis_kelamin"
                    :value="old('jenis_kelamin')"
                    placeholder="Jenis kelamin..."
                    required />
                <x-form.form-error errorFor="jenis_kelamin" />
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
                    required />
                <x-form.form-error errorFor="pekerjaan" />
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
                    required />
                <x-form.form-error errorFor="agama" />
            </div>

            <div>
                <x-form.form-label for="status_perkawinan">
                    Status perkawinan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="status_perkawinan"
                    id="status_perkawinan"
                    :value="old('status_perkawinan')"
                    placeholder="Status perkawinan..."
                    required />
                <x-form.form-error errorFor="status_perkawinan" />
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
                    required />
                <x-form.form-error errorFor="warga_negara" />
            </div>

            <div>
                <x-form.form-label for="pendidikan">
                    Pendidikan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pendidikan"
                    id="pendidikan"
                    :value="old('pendidikan')"
                    placeholder="Pendidikan..."
                    required />
                <x-form.form-error errorFor="pendidikan" />
            </div>

            <div>
                <x-form.form-label for="alamat_asal">
                    Alamat asal
                </x-form.form-label>
                <x-form.form-textarea
                    name="alamat_asal"
                    id="alamat_asal"
                    placeholder="Alamat asal"
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat_asal" />
            </div>

            <div>
                <x-form.form-label for="tujuan">
                    Tujuan
                </x-form.form-label>
                <x-form.form-textarea
                    name="tujuan"
                    id="tujuan"
                    placeholder="Tujuan"
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="tujuan" />
            </div>

            <div>
                <x-form.form-label for="alasan_pindah">
                    Alasan pindah
                </x-form.form-label>
                <x-form.form-textarea
                    name="alasan_pindah"
                    id="alasan_pindah"
                    placeholder="Alasan pindah"
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alasan_pindah" />
            </div>
            
            <div>
                <a href="{{ url('/') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>