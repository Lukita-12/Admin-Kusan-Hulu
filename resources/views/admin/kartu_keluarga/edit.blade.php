<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.kartu_keluarga.update', $kartukeluarga->id) }}">
            @method('PUT')
            
            <div>
                <x-form.form-label for="no_kk">
                    No. Kartu Keluarga
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="no_kk"
                    id="no_kk"
                    value="{{ $kartukeluarga->no_kk }}"
                    placeholder="No. Kartu Keluarga..."
                    required />
                <x-form.form-error errorFor="no_kk" />
            </div>

            <div>
                <x-form.form-label for="kepala_keluarga">
                    Kepala keluarga
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="kepala_keluarga"
                    id="kepala_keluarga"
                    value="{{ $kartukeluarga->kepala_keluarga }}"
                    placeholder="Kepala keluarga..."
                    required />
                <x-form.form-error errorFor="kepala_keluarga" />
            </div>

            <div>
                <x-form.form-label for="alamat">
                    Alamat
                </x-form.form-label>
                <x-form.form-textarea
                    name="alamat"
                    id="alamat"
                    placeholder="Alamat...">
                    {{ $kartukeluarga->alamat }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat" />
            </div>

            <div>
                <x-form.form-label for="kelurahan_desa">
                    Kelurahan/Desa
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="kelurahan_desa"
                    id="kelurahan_desa"
                    value="{{ $kartukeluarga->kelurahan_desa }}"
                    placeholder="Kelurahan/Desa..."
                    required />
                <x-form.form-error errorFor="kelurahan_desa" />
            </div>

            <div>
                <x-form.form-label for="kecamatan">
                    Kecamatan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="kecamatan"
                    id="kecamatan"
                    value="{{ $kartukeluarga->kecamatan }}"
                    placeholder="Kecamatan..."
                    required />
                <x-form.form-error errorFor="kecamatan" />
            </div>

            <div>
                <x-form.form-label for="kabupaten">
                    Kabupaten
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="kabupaten"
                    id="kabupaten"
                    value="{{ $kartukeluarga->kabupaten }}"
                    placeholder="Kabupaten..."
                    required />
                <x-form.form-error errorFor="kabupaten" />
            </div>

            <div>
                <x-form.form-label for="provinsi">
                    Provinsi
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="provinsi"
                    id="provinsi"
                    value="{{ $kartukeluarga->provinsi }}"
                    placeholder="Provinsi..."
                    required />
                <x-form.form-error errorFor="provinsi" />
            </div>

            <div>
                <x-form.form-label for="kode_pos">
                    Kode pos
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="kode_pos"
                    id="kode_pos"
                    value="{{ $kartukeluarga->kode_pos }}"
                    placeholder="Kode pos..."
                    required />
                <x-form.form-error errorFor="kode_pos" />
            </div>

            <div>
                <x-form.form-label for="tanggal_penerbitan">
                    Tanggal penerbitan
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal_penerbitan"
                    id="tanggal_penerbitan"
                    value="{{ $kartukeluarga->tanggal_penerbitan }}"
                    required />
            </div>

            <div>
                <a href="{{ route('admin.kartu_keluarga.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>