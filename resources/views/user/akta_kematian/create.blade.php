<x-layout>

    <div>
        <x-form.form-layout action="{{ route('user.akta_kematian.store') }}">

            <div>
                <h1>YANG MELAPORKAN</h1>
            </div>

            <div>
                <x-form.form-label for="nama_pelapor">
                    Nama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_pelapor"
                    id="nama_pelapor"
                    value="{{ old('nama_pelapor') }}"
                    placeholder="Nama yang melaporkan"
                    required />
                <x-form.form-error errorFor="nama_pelapor" />
            </div>

            <div>
                <x-form.form-label for="nik_pelapor">
                    NIK
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nik_pelapor"
                    id="nik_pelapor"
                    value="{{ old('nik_pelapor') }}"
                    placeholder="NIK..."
                    required />
                <x-form.form-error errorFor="nik_pelapor" />
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
                <h1>YANG DILAPORKAN</h1>
            </div>

            <div>
                <x-form.form-label for="nama_dilapor">
                    Nama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_dilapor"
                    id="nama_dilapor"
                    value="{{ old('nama_dilapor') }}"
                    placeholder="Nama lengkap"
                    required />
                <x-form.form-error errorFor="nama_dilapor" />
            </div>

            <div>
                <x-form.form-label for="nik_dilapor">
                    NIK
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nik_dilapor"
                    id="nik_dilapor"
                    value="{{ old('nik_dilapor') }}"
                    placeholder="NIK..."
                    required />
                <x-form.form-error errorFor="nik_dilapor" />
            </div>

            <div>
                <x-form.form-label for="jenis_kelamin_dilapor">
                    Jenis kelamin
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="jenis_kelamin_dilapor"
                    id="jenis_kelamin_dilapor"
                    value="{{ old('jenis_kelamin_dilapor') }}"
                    placeholder="Jenis kelamin..."
                    required />
                <x-form.form-error errorFor="jenis_kelamin_dilapor" />
            </div>

            <div>
                <x-form.form-label for="agama_dilapor">
                    Agama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="agama_dilapor"
                    id="agama_dilapor"
                    value="{{ old('agama_dilapor') }}"
                    placeholder="Agama..."
                    required />
                <x-form.form-error errorFor="agama_dilapor" />
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
                <h1>MENINGGAL PADA</h1>
            </div>

            <div>
                <x-form.form-label for="tanggal_meninggal">
                    Tanggal meninggal
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="tanggal_meninggal"
                    id="tanggal_meninggal"
                    :value="old('tanggal_meninggal')"
                    placeholder="Tanggal meninggal"
                     />
                <x-form.form-error errorFor="tanggal_meninggal" />
            </div>

            <div>
                <x-form.form-label for="tempat_meninggal">
                    Tempat meninggal
                </x-form.form-label>
                <x-form.form-textarea
                    name="tempat_meninggal"
                    id="tempat_meninggal"
                    :value="old('tempat_meninggal')"
                    placeholder="Tempat meninggal" />
                <x-form.form-error errorFor="tempat_meninggal" />
            </div>
            
            <div>
                <x-form.form-label for="penyebab_meninggal">
                    Penyebab meninggal
                </x-form.form-label>
                <x-form.form-textarea
                    name="penyebab_meninggal"
                    id="penyebab_meninggal"
                    :value="old('penyebab_meninggal')"
                    placeholder="Penyebab meninggal" />
                <x-form.form-error errorFor="penyebab_meninggal" />
            </div>
            
            <div>
                <a href="{{ route('user.akta_kematian.create') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>