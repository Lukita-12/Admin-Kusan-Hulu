<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.perubahan_kartu_keluarga.store') }}">

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
                    Tanggal perubahan
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal"
                    id="tanggal"
                    :value="old('tanggal')"
                    placeholder="Tanggal perubahan..."
                    required />
                <x-form.form-error errorFor="tanggal" />
            </div>

            <div>
                <x-form.form-label for="deskripsi_perubahan">
                    Deskripsi perubahan
                </x-form.form-label>
                <x-form.form-textarea
                    name="deskripsi_perubahan"
                    id="deskripsi_perubahan"
                    :value="old('deskripsi_perubahan')"
                    required />
                <x-form.form-error errorFor="deskripsi_perubahan" />
            </div>

            <div>
                <a href="{{ route('admin.perubahan_kartu_keluarga.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>