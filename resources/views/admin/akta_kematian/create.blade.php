<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.akta_kematian.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="penduduk">Nama Penduduk</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="penduduk_id" id="penduduk_id" requried>
                            <option value="">Pilih penduduk</option>
                            @foreach ($penduduks as $penduduk)
                                <option value="{{ $penduduk->id }}"
                                    {{ old('penduduk_id') == $penduduk->id ? 'selected' : '' }} >
                                    {{ $penduduk->kartukeluarga->no_kk }}, {{ $penduduk->nama }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="penduduk_id" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_pengajuan">Tanggal Pengajuan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="date" name="tanggal" id="tanggal" :value="old('tanggal')" placeholder="Tanggal pengajuan..." required />
                        <x-form.error errorFor="tanggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_meninggal">Tanggal Meninggal</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="tanggal_meninggal" id="tanggal_meninggal" :value="old('tanggal_meninggal')" placeholder="dd/mm/YYYY" required/>
                        <x-form.error errorFor="tanggal_meninggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tempat_meninggal">Tempat Meninggal</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="tempat_meninggal" id="tempat_meninggal" placeholder="Tempat meninggal..." required >{{ old('tempat_meninggal') }}</x-form.textarea>
                        <x-form.error errorFor="tempat_meninggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="penyebab_meninggal">Penyebab meninggal</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="penyebab_meninggal" id="penyebab_meninggal" :value="old('penyebab_meninggal')" placeholder="Penyebab meninggal..." required >{{ old('penyebab_meninggal') }}</x-form.textarea>
                        <x-form.error errorFor="penyebab_meninggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('admin.akta_kematian.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>
    
</x-layout>