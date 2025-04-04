<x-layout>

    <div>
        <x-form.form-layout action="{{ route('user.perubahan_kartu_keluarga.store') }}">
            
            <div>
                <x-form.form-label for="penduduk_name">
                    Nama
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="penduduk_name"
                    id="penduduk_name"
                    value="{{ old('penduduk_name') }}"
                    required />
                <x-form.form-error errorFor="penduduk_name" />
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
                <a href="{{ url('/') }}">Batal</a>
                <button type="submit">Lanjut</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>