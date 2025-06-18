<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.kartu_keluarga.store') }}">
            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="no_kk">Nomor Kartu Keluarga</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="no_kk" id="no_kk" :value="old('no_kk')" placeholder="Nomor kartu keluarga..." required />
                        <x-form.error errorFor="no_kk" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nik">NIK</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nik" id="nik" :value="old('nik')" placeholder="NIK..." required />
                        <x-form.error errorFor="nik" />
                    </x-form.container>
                </x-form.container>
        
                <x-form.container variant="label-input">
                    <x-form.label for="kepala_keluarga">Kepala Keluarga</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kepala_keluarga" id="kepala_keluarga" :value="old('kepala_keluarga')" placeholder="Kepala keluarga..." required />
                        <x-form.error errorFor="kepala_keluarga" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat">Alamat</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat" id="alamat" placeholder="Alamat..." required>
                            {{ old('alamat') }}
                        </x-form.textarea>
                        <x-form.error errorFor="alamat" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kelurahan_desa">Kelurahan/Desa</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kelurahan_desa" id="kelurahan_desa" :value="old('kelurahan_desa')" placeholder="Kelurahan/Desa..." />
                        <x-form.error errorFor="kelurahan_desa" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kecamatan">Kecamatan</x-form.label>
                    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kecamatan" id="kecamatan" :value="old('kecamatan')" placeholder="Kecamatan..." required />
                        <x-form.error errorFor="kecamatan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kabupaten">Kabupaten</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kabupaten" id="kabupaten" :value="old('kabupaten')" placeholder="Kabupaten..." required />
                        <x-form.error errorFor="kabupaten" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="provinsi">Provinsi</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="provinsi" id="provinsi" :value="old('provinsi')" placeholder="Provinsi..." required />
                        <x-form.error errorFor="provinsi" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kode_pos">Kode pos</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kode_pos" id="kode_pos" :value="old('kode_pos')" placeholder="Kode pos..." required />
                        <x-form.error errorFor="kode_pos" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="status_hubungan_dalam_keluarga">Status Hubungan Dalam Keluarga</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="status_hubungan_dalam_keluarga" id="status_hubungan_dalam_keluarga" :value="old('status_hubungan_dalam_keluarga')" placeholder="Status Hubungan Dalam Keluarga..." required />
                        <x-form.error errorFor="status_hubungan_dalam_keluarga" />
                    </x-form.container>
                </x-form.container>
                
                <x-form.container variant="label-input">
                    <x-form.label for="no_paspor">No Paspor</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="no_paspor" id="no_paspor" :value="old('no_paspor')" placeholder="No Paspor..." required />
                        <x-form.error errorFor="no_paspor" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="no_kitas_kitap">No kitas / Kitap</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="no_kitas_kitap" id="no_kitas_kitap" :value="old('no_kitas_kitap')" placeholder="No kitas atau kitap..." required />
                        <x-form.error errorFor="no_kitas_kitap" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="ayah">nama Ayah</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="ayah" id="ayah" :value="old('ayah')" placeholder="Nama Ayah..." required />
                        <x-form.error errorFor="ayah" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="ibu">Nama Ibu</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="ibu" id="ibu" :value="old('ibu')" placeholder="Nama Ibu..." required />
                        <x-form.error errorFor="ibu" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_penerbitan">Tanggal penerbitan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="date" name="tanggal_penerbitan" id="tanggal_penerbitan" :value="old('tanggal_penerbitan')" required />
                        <x-form.error errorFor="tanggal_penerbitan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('admin.kartu_keluarga.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
    
</x-layout>