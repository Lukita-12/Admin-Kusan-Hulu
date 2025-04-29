<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.desa.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="nama_desa">Nama desa</x-form.label>
    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_desa" id="nama_desa" :value="old('nama_desa')" placeholder="Nama desa..." />
                        <x-form.error errorFor="nama_desa" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('admin.desa.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>
    
</x-layout>