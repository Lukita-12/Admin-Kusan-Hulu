<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.pindah_domisili.store') }}">

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
                    placeholder="Tanggal..."
                    required />
                <x-form.form-error errorFor="tanggal" />
            </div>

            <div>
                <x-form.form-label for="alamat_asal">
                    Alamat asal
                </x-form.form-label>
                <x-form.form-textarea
                    name="alamat_asal"
                    id="alamat_asal"
                    placeholder="Alamat asal..."
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
                    placeholder="Tujuan..."
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
                    placeholder="Alasan pindah..."
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alasan_pindah" />
            </div>
            
            <div>
                <a href="{{ route('admin.pindah_domisili.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>