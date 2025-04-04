<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.domisili_usaha.store') }}">

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
                <x-form.form-label for="tanggal">
                    Tanggal
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
                <x-form.form-label for="nama_usaha">
                    Nama usaha
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_usaha"
                    id="nama_usaha"
                    :value="old('nama_usaha')"
                    placeholder="Nama usaha"
                    required />
                <x-form.form-error errorFor="nama_usaha" />
            </div>

            <div>
                <x-form.form-label for="jenis_usaha">
                    Jenis usaha
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="jenis_usaha"
                    id="jenis_usaha"
                    :value="old('jenis_usaha')"
                    placeholder="Jenis usaha"
                    required />
                <x-form.form-error errorFor="jenis_usaha" />
            </div>

            <div>
                <x-form.form-label for="alamat_usaha">
                    Alamat usaha
                </x-form.form-label>
                <x-form.form-textarea
                    name="alamat_usaha"
                    id="alamat_usaha"
                    :value="old('alamat_usaha')"
                    placeholder="Alamat usaha"
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat_usaha" />
            </div>
            
            <div>
                <a href="{{ route('admin.domisili_usaha.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>