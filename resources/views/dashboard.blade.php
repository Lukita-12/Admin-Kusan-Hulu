<x-admin-layout>
    <x-slot:heading>
        DASHBOARD
    </x-slot:heading>

    <div class="w-full flex gap-6">
        <a href="{{ route('admin.domisili_usaha.index') }}" class="w-full bg-slate-200 rounded-sm shadow-sm shadow-slate-500">
            <div class="w-full flex justify-center items-center px-4 py-2 gap-2">
                <span class="bg-slate-700 w-16 h-16"></span>
                <div class="flex flex-col">
                    <span class="">DOMISILI USAHA</span>
                    <span>0</span>
                </div>
            </div>
        </a>
    
        <a href="{{ route('admin.domisili_penduduk.index') }}" class="w-full bg-slate-200 rounded-sm shadow-sm shadow-slate-500">
            <div class="w-full flex justify-center items-center px-4 py-2 gap-2">
                <span class="bg-slate-700 w-16 h-16"></span>
                <div class="flex flex-col">
                    <span class="">Domisili Pend.</span>
                    <span>0</span>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.domisili_usaha.index') }}" class="w-full bg-slate-200 rounded-sm shadow-sm shadow-slate-500">
            <div class="w-full flex justify-center items-center px-4 py-2 gap-2">
                <span class="bg-slate-700 w-16 h-16"></span>
                <div class="flex flex-col">
                    <span class="">DOMISILI USAHA</span>
                    <span>0</span>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.domisili_usaha.index') }}" class="w-full bg-slate-200 rounded-sm shadow-sm shadow-slate-500">
            <div class="w-full flex justify-center items-center px-4 py-2 gap-2">
                <span class="bg-slate-700 w-16 h-16"></span>
                <div class="flex flex-col">
                    <span class="">DOMISILI USAHA</span>
                    <span>0</span>
                </div>
            </div>
        </a>
    </div>

    <x-table.container variant="main">
        <div class="w-full bg-blue-400/80 flex justify-between items-center px-4 py-2 gap-3 rounded-t-md">
            <span class="font-bold text-slate-100 text-xl">KARTU KELUARGA</span>
            <a href="{{ route('admin.kartu_keluarga.index') }}" class="font-bold text-slate-100 text-xl">></a>
        </div>

        <x-table.container variant="table">
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.td variant="head">No.</x-table.td>
                        <x-table.td variant="head">No. Kartu Keluarga</x-table.td>
                        <x-table.td variant="head">Kepala keluarga</x-table.td>
                        <x-table.td variant="head">Alamat</x-table.td>
                        <x-table.td variant="head">Kelurahan/Desa</x-table.td>
                        <x-table.td variant="head">Kecamatan</x-table.td>
                        <x-table.td variant="head">Kabupaten</x-table.td>
                        <x-table.td variant="head">Provinsi</x-table.td>
                        <x-table.td variant="head">Kode Pos</x-table.td>
                        <x-table.td variant="head">Tanggal penerbitan</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($kartukeluargas as $kartukeluarga)
                    <x-table.tr variant="body">
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->no_kk }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->kepala_keluarga }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->alamat }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->kelurahan_desa }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->kecamatan }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->kabupaten }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->provinsi }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->kode_pos }}</x-table.td>
                        <x-table.td>{{ $kartukeluarga->tanggal_penerbitan }}</x-table.td>
                    </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

        <div class="w-full flex justify-center py-4 px-2">
            <a href="{{ route('admin.kartu_keluarga.index') }}" class="text-blue-500 italic underline">Lebih banyak...</a>
        </div>
    </x-table.container>

    <div class="w-full flex gap-4">
        <div class="w-1/2 bg-slate-200 flex flex-col justify-center rounded-md shadow shadow-slate-500/60">
            <div class="w-full bg-blue-400/80 flex justify-between items-center px-4 py-2 gap-3 rounded-t-md">
                <span class="font-bold text-slate-100 text-xl">AKTA KEMATIAN</span>
                <a href="{{ route('admin.kartu_keluarga.index') }}" class="font-bold text-slate-100 text-xl">></a>
            </div>
    
            <x-table.container variant="table">
                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.td variant="head">No.</x-table.td>
                            <x-table.td variant="head">Tanggal Pengajuan</x-table.td>
                            <x-table.td variant="head">Nama Penduduk</x-table.td>
                            <x-table.td variant="head">Tanggal Meninggal</x-table.td>
                            <x-table.td variant="head">Tempat Meninggal</x-table.td>
                            <x-table.td variant="head">Penyebab Meninggal</x-table.td>
                            <x-table.td variant="head">Status</x-table.td>
                            <x-table.td variant="head">Aksi</x-table.td>
                        </x-table.tr>
                    </x-table.thead>
                    <tbody>
                        @foreach ($aktaKematians as $aktaKematian)
                            <x-table.tr variant="body">
                                <x-table.td>{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $aktaKematian->tanggal->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $aktaKematian->penduduk->nama }}</x-table.td>
                                <x-table.td>{{ $aktaKematian->tanggal_meninggal }}</x-table.td>
                                <x-table.td>{{ $aktaKematian->tempat_meninggal }}</x-table.td>
                                <x-table.td>{{ $aktaKematian->penyebab_meninggal }}</x-table.td>
                                <x-table.td>{{ $aktaKematian->status }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>

            <div class="w-full flex justify-center py-4 px-2">
                <a href="{{ route('admin.akta_kematian.index') }}" class="text-blue-500 italic underline">Lebih banyak...</a>
            </div>
        </div>
    
        <div class="w-1/2 bg-slate-200 flex flex-col justify-center rounded-md shadow shadow-slate-500/60">
            <div class="w-full bg-blue-400/80 flex justify-between items-center px-4 py-2 gap-3 rounded-t-md">
                <span class="font-bold text-slate-100 text-xl">AKTA KELAHIRAN</span>
                <a href="{{ route('admin.kartu_keluarga.index') }}" class="font-bold text-slate-100 text-xl">></a>
            </div>
    
            <x-table.container variant="table">
                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.td variant="head">No.</x-table.td>
                            <x-table.td variant="head">Tanggal</x-table.td>
                            <x-table.td variant="head">Nomor akta</x-table.td>
                            <x-table.td variant="head">Nama anak</x-table.td>
                            <x-table.td variant="head">Nama ayah</x-table.td>
                            <x-table.td variant="head">Nama ibu</x-table.td>
                            <x-table.td variant="head">Tempat kelahiran</x-table.td>
                            <x-table.td variant="head">Jenis kelamin</x-table.td>
                            <x-table.td variant="head">Agama</x-table.td>
                            <x-table.td variant="head">Upload St. Bidan</x-table.td>
                            <x-table.td variant="head">Upload St. RT</x-table.td>
                            <x-table.td variant="head">Status</x-table.td>
                            <x-table.td variant="head">Aksi</x-table.td>
                        </x-table.tr>
                    </x-table.thead>
                    <tbody>
                        @foreach ($penerbitanAktaKelahirans as $penerbitanAktaKelahiran)
                            <tr>
                                <x-table.td>{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->tanggal->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->nomor_akta }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->nama_anak }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->nama_ayah }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->nama_ibu }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->tempat_kelahiran }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->jenis_kelamin }}</x-table.td>
                                <x-table.td>{{ $penerbitanAktaKelahiran->agama }}</x-table.td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>

            <div class="w-full flex justify-center py-4 px-2">
                <a href="{{ route('admin.penerbitan_akta_kelahiran.index') }}" class="text-blue-500 italic underline">Lebih banyak...</a>
            </div>
        </div>
    </div>

</x-admin-layout>