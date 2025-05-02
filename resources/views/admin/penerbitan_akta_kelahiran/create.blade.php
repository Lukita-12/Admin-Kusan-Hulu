<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.penerbitan_akta_kelahiran.store') }}" enctype="multipart/form-data">
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
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal">Tanggal Pengajuan</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="date" name="tanggal" id="tanggal" :value="old('tanggal')" placeholder="Tanggal pengajuan..." required />
                        <x-form.error errorFor="tanggal" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nomor_akta">Nomor Akta</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nomor_akta" id="nomor_akta" :value="old('nomor_akta')" placeholder="Nomor akta..." required />
                        <x-form.error errorFor="nomor_akta" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nama_anak">Nama anak</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_anak" id="nama_anak" :value="old('nama_anak')" placeholder="Nama anak..." required />
                        <x-form.error errorFor="nama_anak" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nama_ayah">Nama ayah</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_ayah" id="nama_ayah" :value="old('nama_ayah')" placeholder="Nama ayah..." required />
                        <x-form.error errorFor="nama_ayah" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nama_ibu">Nama ibu</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama_ibu" id="nama_ibu" :value="old('nama_ibu')" placeholder="Nama ibu..." required />
                        <x-form.error errorFor="nama_ibu" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tempat_kelahiran">Tempat kelahiran</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea name="tempat_kelahiran" id="tempat_kelahiran" placeholder="Tempat kelahiran..." required >{{ old('tempat_kelahiran') }}</x-form.textarea>
                        <x-form.error errorFor="tempat_kelahiran" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="jenis_kelamin">Jenis kelamin</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.select name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </x-form.select>
                        <x-form.error errorFor="jenis_kelamin" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="agama">Agama</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="agama" id="agama" :value="old('agama')" placeholder="Agama..." required />
                        <x-form.error errorFor="agama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="upload_sp_bidan">Surat keterangan dari bidan</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="file" name="upload_sp_bidan" id="upload_sp_bidan" accept="image/*" :value="old('upload_sp_bidan')" required />
                        <x-form.error errorFor="upload_sp_bidan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="upload_sp_rt">Surat keterangan dari RT</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="file" name="upload_sp_rt" id="upload_sp_rt" accept="image/*" :value="old('upload_sp_rt')" required />
                        <x-form.error errorFor="upload_sp_rt" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('admin.penerbitan_akta_kelahiran.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>
    
</x-layout>