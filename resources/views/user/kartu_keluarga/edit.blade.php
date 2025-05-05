<x-user-layout>
    <x-slot:heading>
        PERUBAHAN KARTU KELUARGA
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('user.kartu_keluarga.update', $kartukeluarga) }}">
            @method('PUT')

            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="no_kk">No. Kartu Keluarga</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', $kartukeluarga->no_kk) }}" placeholder="No. Kartu Keluarga..." required />
                        <x-form.error errorFor="no_kk" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kepala_keluarga">Kepala keluarga</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kepala_keluarga" id="kepala_keluarga" value="{{ old('kepala_keluarga', $kartukeluarga->kepala_keluarga) }}" placeholder="Kepala keluarga..." required />
                        <x-form.error errorFor="kepala_keluarga" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat">Alamat</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea type="text" name="alamat" id="alamat" placeholder="Alamat..." required>
                            {{ old('alamat', $kartukeluarga->alamat) }}
                        </x-form.textarea>
                        <x-form.error errorFor="alamat" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kelurahan_desa">Kelurahan/Desa</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kelurahan_desa" id="kelurahan_desa" value="{{ old('kelurahan_desa', $kartukeluarga->kelurahan_desa) }}" placeholder="Kelurahan/Desa..." required />
                        <x-form.error errorFor="kelurahan_desa" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kecamatan">Kecamatan</x-form.label>
                    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $kartukeluarga->kecamatan ?? '-') }}" placeholder="Kecamatan..." required />
                        <x-form.error errorFor="kecamatan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kabupaten">Kabupaten</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten', $kartukeluarga->kabupaten ?? '-') }}" placeholder="Kabupaten..." required />
                        <x-form.error errorFor="kabupaten" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="provinsi">Provinsi</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi', $kartukeluarga->provinsi ?? '-') }}" placeholder="Provinsi..." required />
                        <x-form.error errorFor="provinsi" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kode_pos">Kode pos</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', $kartukeluarga->kode_pos ?? '-') }}" placeholder="Kode pos..." required />
                        <x-form.error errorFor="kode_pos" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_penerbitan">Tanggal penerbitan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="date" name="tanggal_penerbitan" id="tanggal_penerbitan" value="{{ old('tanggal_penerbitan', $kartukeluarga->tanggal_penerbitan ?? '-') }}" required />
                        <x-form.error errorFor="tanggal_penerbitan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('user.kartu_keluarga.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="next" type="submit">Lanjutkan</x-form.button>
                </x-form.container>

            </x-form.container>

        </x-form.form>
    </x-form.container>
</x-user-layout>