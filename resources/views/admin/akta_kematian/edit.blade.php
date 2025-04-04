<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.akta_kematian.update', $aktaKematian->id) }}">
            @method('PUT')

            <div>
                <x-form.form-label for="tanggal">
                    Tanggal pelaporan
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal"
                    id="tanggal"
                    value="{{ $aktaKematian->tanggal }}"
                    placeholder="Tanggal..."
                    required />
                <x-form.form-error errorFor="tanggal" />
            </div>

            <div>
                <x-form.form-label for="nama_pelapor">
                    Nama pelapor
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_pelapor"
                    id="nama_pelapor"
                    value="{{ old('nama_pelapor', $pelapor?->nama) }}"
                    required />
                <x-form.form-error errorFor="nama_pelapor" />
            </div>

            <div>
                <x-form.form-label for="nama_dilapor">
                    Nama yang dilaporkan
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_dilapor"
                    id="nama_dilapor"
                    value="{{ old('nama_dilapor', $dilapor?->nama) }}"
                    required />
                <x-form.form-error errorFor="nama_dilapor" />
            </div>

            <div>
                <x-form.form-label for="tanggal_meninggal">
                    Tanggal meninggal
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="tanggal_meninggal"
                    id="tanggal_meninggal"
                    value="{{ $aktaKematian->tanggal_meninggal }}"
                    placeholder="Tanggal meninggal..."
                     />
                <x-form.form-error errorFor="tanggal_meninggal" />
            </div>

            <div>
                <x-form.form-label for="tempat_meninggal">
                    Tempat meninggal
                </x-form.form-label>
                <x-form.form-textarea
                    name="tempat_meninggal"
                    id="tempat_meninggal"
                    placeholder="Tempat meninggal...">
                        {{ $aktaKematian->tempat_meninggal }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="tempat_meninggal" />
            </div>
            
            <div>
                <x-form.form-label for="penyebab_meninggal">
                    Penyebab meninggal
                </x-form.form-label>
                <x-form.form-textarea
                    name="penyebab_meninggal"
                    id="penyebab_meninggal"
                    placeholder="Penyebab meninggal...">
                        {{ $aktaKematian->penyebab_meninggal }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="penyebab_meninggal" />
            </div>
            
            <div>
                <a href="{{ route('admin.akta_kematian.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>
    
</x-layout>