<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.pindah_domisili.update', $pindahDomisili) }}">
            @method('PUT')
            
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="penduduk">Nama Penduduk</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="penduduk_id" id="penduduk_id" required>
                            @foreach ($penduduks as $penduduk)
                                <option value="{{ $penduduk->id }}"
                                    {{ old('penduduk_id', $pindahDomisili->penduduk_id) == $penduduk->id ? 'selected' : '' }} >
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
                        <x-form.input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $pindahDomisili->tanggal->format('Y-m-d')) }}" placeholder="Tanggal pengajuan..." required />
                        <x-form.error errorFor="tanggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_asal">Alamat Asal</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat_asal" id="alamat_asal" placeholder="Alamat asal...">
                            {{ old('alamat_asal', $pindahDomisili->alamat_asal) }}
                        </x-form.textarea>
                        <x-form.error errorFor="alamat_asal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tujuan">Tujuan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="tujuan" id="tujuan" placeholder="Tujuan...">
                            {{ old('tujuan', $pindahDomisili->tujuan) }}
                        </x-form.textarea>
                        <x-form.error errorFor="tujuan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alasan_pindah">Alasan pindah</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alasan_pindah" id="alasan_pindah" placeholder="Alasan pindah...">
                            {{ old('alasan_pindah', $pindahDomisili->alasan_pindah) }}
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