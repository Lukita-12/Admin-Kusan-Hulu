<x-user-layout>
    <x-slot:heading>
        PERUBAHAN KARTU KELUARGA
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('user.pengajuan_kk.store') }}">
            <x-form.container variant="form">
                <span class="font-bold text-blue-500/80 text-center text-4xl my-3">- KARTU KELUARGA -</span>

                <!-- Penduduk id -->
                <x-form.input type="hidden" id="data_penduduk_id" name="data_penduduk_id" :value="old( 'nik',$user->dataPenduduk->id)"/>
                
                <x-form.container variant="label-input">
                    <x-form.label for="no_kk">No. Kartu Keluarga</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', $user->dataPenduduk->no_kk) }}" placeholder="No. Kartu Keluarga..."  readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="no_kk" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nik">Nik</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nik" id="nik" value="{{ old('nik', $user->dataPenduduk->nik) }}" placeholder="Nik..."  readonly onfocus="this.blur();" required />
                        <x-form.error errorFor="nik" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kepala_keluarga">Kepala keluarga</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kepala_keluarga" id="kepala_keluarga" value="{{ old('kepala_keluarga') }}" placeholder="Kepala keluarga..." required />
                        <x-form.error errorFor="kepala_keluarga" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat">Alamat</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.textarea type="text" name="alamat" id="alamat" placeholder="Alamat..." required>
                            {{ old('alamat') }}
                        </x-form.textarea>
                        <x-form.error errorFor="alamat" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kelurahan_desa">Kelurahan/Desa</x-form.label>
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kelurahan_desa" id="kelurahan_desa" value="{{ old('kelurahan_desa') }}" placeholder="Kelurahan/Desa..." required />
                        <x-form.error errorFor="kelurahan_desa" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kecamatan">Kecamatan</x-form.label>
                    
                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}" placeholder="Kecamatan..." required />
                        <x-form.error errorFor="kecamatan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kabupaten">Kabupaten</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten') }}" placeholder="Kabupaten..." required />
                        <x-form.error errorFor="kabupaten" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="provinsi">Provinsi</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}" placeholder="Provinsi..." required />
                        <x-form.error errorFor="provinsi" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kode_pos">Kode pos</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos') }}" placeholder="Kode pos..." required />
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

                <span class="font-bold text-blue-500/80 text-center text-4xl my-3">- PENDUDUK -</span>

                <x-form.container variant="label-input">
                    <x-form.label for="nama">Nama</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama" id="nama" placeholder="Nama lengkap..." value="{{ old('nama', $user->dataPenduduk->nama) }}" required />
                        <x-form.error errorFor="nama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="jenis_kelamin">Jenis kelamin</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="jenis_kelamin" id="jenis_kelamin" value="old('jenis_kelamin')" required>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $user->dataPenduduk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $user->dataPenduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </x-form.select>
                        <x-form.error errorFor="jenis_kelamin" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="status_perkawinan">Status perkawinan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="status_perkawinan" id="status_perkawinan" value="old('status_perkawinan')" required>
                            <option value="Belum kawin" {{ old('status_perkawinan', $user->dataPenduduk->status_perkawinan) == 'Belum kawin' ? 'selected' : '' }}>Belum kawin</option>
                            <option value="Kawin belum tercatat" {{ old('status_perkawinan', $user->dataPenduduk->status_perkawinan) == 'Kawin belum tercatat' ? 'selected' : '' }}>Kawin belum tercatat</option>
                            <option value="Kawin tercatat" {{ old('status_perkawinan', $user->dataPenduduk->status_perkawinan) == 'Kawin tercatat' ? 'selected' : '' }}>Kawin tercatat</option>
                            <option value="Cerai hidup" {{ old('status_perkawinan', $user->dataPenduduk->status_perkawinan) == 'Cerai hidup' ? 'selected' : '' }}>Cerai hidup</option>
                            <option value="Cerai mati" {{ old('status_perkawinan', $user->dataPenduduk->status_perkawinan) == 'Cerai mati' ? 'selected' : '' }}>Cerai mati</option>
                        </x-form.select>
                        <x-form.error errorFor="status_perkawinan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tempat_lahir">Tempat lahir</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $user->dataPenduduk->tempat_lahir) }}" placeholder="Tempat lahir..." required />
                        <x-form.error errorFor="tempat_lahir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_lahir">Tanggal lahir</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $user->dataPenduduk->tanggal_lahir) }}" placeholder="Tanggal lahir..." required />
                        <x-form.error errorFor="tanggal_lahir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="agama">Agama</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="agama" id="agama" value="{{ old('agama', $user->dataPenduduk->agama) }}" placeholder="Agama..." required />
                        <x-form.error errorFor="agama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="pendidikan_terakhir">Pendidikan terakhir</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $user->dataPenduduk->pendidikan_terakhir) }}" placeholder="Pendidikan terakhir..." required />
                        <x-form.error errorFor="pendidikan_terakhir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="pekerjaan">Pekerjaan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $user->dataPenduduk->pekerjaan) }}" placeholder="Pekerjaan..." required />
                        <x-form.error errorFor="pekerjaan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_lengkap">Alamat lengkap</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat lengkap..." required>{{ old('alamat_lengkap', $user->dataPenduduk->alamat_lengkap) }}</x-form.textarea>
                        <x-form.error errorFor="alamat_lengkap" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kedudukan_dalam_keluarga">Kedudukan dalam keluarga</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kedudukan_dalam_keluarga" id="kedudukan_dalam_keluarga" value="{{ old('kedudukan_dalam_keluarga', $user->dataPenduduk->kedudukan_dalam_keluarga) }}" placeholder="Kedudukan dalam keluarga..." required />
                        <x-form.error errorFor="kedudukan_dalam_keluarga" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="warga_negara">Warga negara</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="warga_negara" id="warga_negara" value="{{ old('warga_negara', $user->dataPenduduk->warga_negara) }}" placeholder="Warga negara..." required />
                        <x-form.error errorFor="warga_negara" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('user.kartu_keluarga.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="next" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>

        </x-form.form>
    </x-form.container>
</x-user-layout>