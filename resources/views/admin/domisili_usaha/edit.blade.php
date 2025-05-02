<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.domisili_usaha.update', $domisiliUsaha->id) }}">

            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="penduduk">Nama Penduduk</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="penduduk_id" id="penduduk_id" required>
                            @foreach ($penduduks as $penduduk)
                                <option value="{{ $penduduk->id }}"
                                    {{ old('penduduk_id', $domisiliUsaha->penduduk_id) == $penduduk->id ? 'selected' : '' }} >
                                    {{ $penduduk->kartukeluarga->no_kk }}, {{ $penduduk->nama }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="penduduk_id" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_pengajuan">Tanggal Pengajuan</x-form.label>

                    <x-form.container variant=input-error>
                        <x-form.input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $domisiliUsaha->tanggal->format('Y-m-d')) }}" placeholder="Tanggal pengajuan..." required />
                        <x-form.error errorFor="tanggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nama_usaha">Nama Usaha</x-form.label>
    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_usaha" id="nama_usaha" value="{{ old('nama_usaha', $domisiliUsaha->nama_usaha) }}" placeholder="Nama usaha..." required />
                        <x-form.error errorFor="nama_usaha" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="label-input">
                    <x-form.label for="jenis_usaha">Jenis Usaha</x-form.label>
    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="jenis_usaha" id="jenis_usaha" value="{{ old('jenis_usaha', $domisiliUsaha->jenis_usaha) }}" placeholder="Jenis usaha..." required />
                        <x-form.error errorFor="jenis_usaha" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_usaha">Alamat usaha</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha" required>{{ old('alamat_usaha', $domisiliUsaha->alamat_usaha) }}</x-form.textarea>
                        <x-form.error errorFor="alamat_usaha" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('admin.domisili_usaha.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>            
        </x-form.form>
    </x-form.container>
    
</x-layout>