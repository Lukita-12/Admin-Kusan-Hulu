<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.desa.store') }}">

            <div>
                <x-form.form-label for="nama_desa">
                    Nama desa
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_desa"
                    id="nama_desa"
                    placeholder="Nama desa..."
                     />
                <x-form.form-error errorFor="nama_desa" />
            </div>

            <div>
                <a href="{{ route('admin.desa.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>