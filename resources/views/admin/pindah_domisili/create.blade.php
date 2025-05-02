<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.pindah_domisili.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="penduduk">Nama Penduduk</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="penduduk_id" id="penduduk_id" required>
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
                    <x-form.label for="alamat_asal">Alamat Asal</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat_asal" id="alamat_asal" placeholder="Alamat asal..." required>
                            {{ old('alamat_asal') }}
                        </x-form.textarea>
                        <x-form.error errorFor="alamat_asal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tujuan">Tujuan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="tujuan" id="tujuan" placeholder="Tujuan..." required>
                            {{ old('tujuan') }}
                        </x-form.textarea>
                        <x-form.error errorFor="tujuan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alasan_pindah">Alasan pindah</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alasan_pindah" id="alasan_pindah" placeholder="Alasan pindah..." required>
                            {{ old('alasan_pindah') }}
                        </x-form.textarea>
                        <x-form.error errorFor="alasan_pindah" />
                    </x-form.container>
                </x-form.container>
                
                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('admin.pindah_domisili.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>
    
</x-layout>