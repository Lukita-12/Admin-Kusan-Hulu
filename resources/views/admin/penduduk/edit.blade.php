<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.penduduk.update', $penduduk->id) }}">
            @method('PUT')

            <x-form.container variant="form">

                <x-form.container variant="label-input">
                    <x-form.label for="desa">Desa</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="desa_id" id="desa_id" required>
                            @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}"
                                    {{ old('desa_id', $penduduk->desa_id) == $desa->id ? 'selected' : '' }} >
                                    {{ $desa->nama_desa }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="desa_id" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="label-input">
                    <x-form.label for="kartu_keluarga">Kartu Keluarga</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="kartukeluarga_id" id="kartukeluarga_id" required>
                            @foreach ($kartukeluargas as $kartukeluarga)
                                <option value="{{ $kartukeluarga->id }}"
                                    {{ old('kartukeluarga_id', $penduduk->kartukeluarga_id ?? '') == $kartukeluarga->id ? 'selected' : '' }}>
                                    {{ $kartukeluarga->no_kk }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="kartukeluarga_id" />
                    </x-form.container>
                </x-form.container>
    
                <x-form.container variant="label-input">
                    <x-form.label for="nama">Nama</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="nama" id="nama" placeholder="Nama lengkap..." value="{{ old('nama', $penduduk->nama) }}" required />
                        <x-form.error errorFor="nama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="jenis_kelamin">Jenis kelamin</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="jenis_kelamin" id="jenis_kelamin" value="old('jenis_kelamin')" required>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </x-form.select>
                        <x-form.error errorFor="jenis_kelamin" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="status_perkawinan">Status perkawinan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.select name="status_perkawinan" id="status_perkawinan" value="old('status_perkawinan')" required>
                            <option value="Belum kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum kawin' ? 'selected' : '' }}>Belum kawin</option>
                            <option value="Kawin belum tercatat" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin belum tercatat' ? 'selected' : '' }}>Kawin belum tercatat</option>
                            <option value="Kawin tercatat" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin tercatat' ? 'selected' : '' }}>Kawin tercatat</option>
                            <option value="Cerai hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai hidup' ? 'selected' : '' }}>Cerai hidup</option>
                            <option value="Cerai mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai mati' ? 'selected' : '' }}>Cerai mati</option>
                        </x-form.select>
                        <x-form.error errorFor="status_perkawinan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tempat_lahir">Tempat lahir</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" placeholder="Tempat lahir..." required />
                        <x-form.error errorFor="tempat_lahir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="tanggal_lahir">Tanggal lahir</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir->format('Y-m-d')) }}" placeholder="Tanggal lahir..." required />
                        <x-form.error errorFor="tanggal_lahir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="agama">Agama</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="agama" id="agama" value="{{ old('agama', $penduduk->agama) }}" placeholder="Agama..." required />
                        <x-form.error errorFor="agama" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="pendidikan_terakhir">Pendidikan terakhir</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) }}" placeholder="Pendidikan terakhir..." required />
                        <x-form.error errorFor="pendidikan_terakhir" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="pekerjaan">Pekerjaan</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" placeholder="Pekerjaan..." required />
                        <x-form.error errorFor="pekerjaan" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="alamat_lengkap">Alamat lengkap</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.textarea name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat lengkap..." required>{{ old('alamat_lengkap', $penduduk->alamat_lengkap) }}</x-form.textarea>
                        <x-form.error errorFor="alamat_lengkap" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="kedudukan_dalam_keluarga">Kedudukan dalam keluarga</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="kedudukan_dalam_keluarga" id="kedudukan_dalam_keluarga" value="{{ old('kedudukan_dalam_keluarga', $penduduk->kedudukan_dalam_keluarga) }}" placeholder="Kedudukan dalam keluarga..." required />
                        <x-form.error errorFor="kedudukan_dalam_keluarga" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="warga_negara">Warga negara</x-form.label>

                    <x-form.container variant="input-error">
                        <x-form.input type="text" name="warga_negara" id="warga_negara" value="{{ old('warga_negara', $penduduk->warga_negara) }}" placeholder="Warga negara..." required />
                        <x-form.error errorFor="warga_negara" />
                    </x-form.container>
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.button-link href="{{ route('admin.penduduk.index') }}">Batal</x-form.button-link>
                    <x-form.button variant="save" type="submit">Simpan</x-form.button>
                </x-form.container>

            </x-form.container>
        </x-form.form>
    </x-form.container>
    
</x-layout>