<x-admin-layout>
    <x-slot:heading>
        KARTU KELUARGA
    </x-slot:heading>

    <!-- Pengajuan Perubahan KK -->
     <!-- Pengajuan -->
    <x-table.container variant="main">
        <div class="bg-blue-400/80 w-full flex justify-between items-center px-4 py-2 rounded-t-lg">
            <form method="GET" action="{{ route('admin.kartu_keluarga.search') }}">
                <div class="flex items-center gap-2">                    
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama penduduk..." class="bg-slate-100 px-3 py-1 rounded-sm">
                    <button type="submit" class="bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">Cari</button>
                </div>
            </form>

            <form method="GET" action="{{ route('admin.kartu_keluarga.filter') }}" id="filterForm">
                <div class="w-full flex items-center gap-2">
                    <a href="{{ route('admin.kartu_keluarga.create') }}" class="inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">+ Buat</a>

                    <label for="filter_status" class="font-medium text-xl text-slate-100">Filter:</label>
                    <select name="filter" id="filter" class="outline-none tet-slate-700 text-lg" onchange="document.getElementById('filterForm').submit();">
                        <option value="">None</option>
                        <option value="">All</option>
                        <option value="Terbaru" {{ request('filter') == 'Terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="Terlama" {{ request('filter') == 'Terlama' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </div>
            </form>
        </div>
        
        <x-table.container variant="table">
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.td variant="head">No.</x-table.td>
                        <x-table.td variant="head">Nama Penduduk</x-table.td>
                        <x-table.td variant="head">No. Kartu Keluarga</x-table.td>
                        <x-table.td variant="head">Kepala keluarga</x-table.td>
                        <x-table.td variant="head">Alamat</x-table.td>
                        <x-table.td variant="head">Kelurahan/Desa</x-table.td>
                        <x-table.td variant="head">Kecamatan</x-table.td>
                        <x-table.td variant="head">Kabupaten</x-table.td>
                        <x-table.td variant="head">Provinsi</x-table.td>
                        <x-table.td variant="head">Kode Pos</x-table.td>
                        <x-table.td variant="head">Tanggal penerbitan</x-table.td>
                        <x-table.td variant="head">Status</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($pengajuanPerubahanKKs as $pengajuanPerubahanKK)
                    <x-table.tr variant="body">
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->nama }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->no_kk }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->kepala_keluarga }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->alamat }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->kelurahan_desa }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->kecamatan }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->kabupaten }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->provinsi }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->kode_pos }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->tanggal_penerbitan }}</x-table.td>
                            <x-table.td>{{ $pengajuanPerubahanKK->status }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                   @if ($pengajuanPerubahanKKs->currentPage() === 1 && $loop->first)
                                        @can('acceptOrReject', $pengajuanPerubahanKK)
                                            @if ($pengajuanPerubahanKK->status === 'Diajukan')
                                                <x-table.form action="{{ route('admin.pengajuan_perubahan_kk.accept', $pengajuanPerubahanKK) }}">
                                                    @method('PATCH')
                                                    <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                                </x-table.form>
                                                <x-table.form action="{{ route('admin.pengajuan_perubahan_kk.reject', $pengajuanPerubahanKK) }}">
                                                    @method('PATCH')
                                                    <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                                </x-table.form>
                                            @else
                                                <span>-</span>
                                            @endif
                                        @endcan

                                        @can('completeOrEditOrDelete', $pengajuanPerubahanKK)
                                            @if ($pengajuanPerubahanKK->status !== 'Selesai')
                                                <x-table.form action="{{ route('admin.pengajuan_perubahan_kk.complete', $pengajuanPerubahanKK) }}">
                                                    @method('PATCH')
                                                    <x-table.button variant="complete" type="submit">Selesai</x-table.button>
                                                </x-table.form>
                                                <x-table.form action="{{ route('admin.pengajuan_perubahan_kk.destroy', $pengajuanPerubahanKK) }}">
                                                    @method('DELETE')
                                                    <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                                </x-table.form>
                                            @else
                                                <span>-</span>
                                            @endif
                                        @endcan
                                    @else
                                        @if (Auth::user()->role === 'super_admin')
                                            @if ($pengajuanPerubahanKK->status === 'Diproses')
                                                <span class="text-black-600 font-semibold">Menunggu</span>
                                            @else
                                                <span>-</span>
                                            @endif
                                        @elseif (Auth::user()->role === 'admin')
                                            @if ($pengajuanPerubahanKK->status === 'Diajukan')
                                                <span class="text-black-500 font-semibold">Menunggu</span>
                                            @else
                                                <span>-</span>
                                            @endif
                                        @else
                                            <span>-</span> {{-- Default fallback supaya pasti hanya satu tanda '-' muncul --}}
                                        @endif
                                    @endif

                                </x-table.container>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $kartukeluargas->links() }}
        </x-table.container>
    </x-table.container>
    
    <!-- Kartu keluarga -->
    <x-table.container variant="main">
        <div class="bg-blue-400/80 w-full flex justify-between items-center px-4 py-2 rounded-t-lg">
            <form method="GET" action="{{ route('admin.kartu_keluarga.search') }}">
                <div class="flex items-center gap-2">                    
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama penduduk..." class="bg-slate-100 px-3 py-1 rounded-sm">
                    <button type="submit" class="bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">Cari</button>
                </div>
            </form>

            <form method="GET" action="{{ route('admin.kartu_keluarga.filter') }}" id="filterForm">
                <div class="w-full flex items-center gap-2">
                    <a href="{{ route('admin.kartu_keluarga.create') }}" class="inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">+ Buat</a>

                    <label for="filter_status" class="font-medium text-xl text-slate-100">Filter:</label>
                    <select name="filter" id="filter" class="outline-none tet-slate-700 text-lg" onchange="document.getElementById('filterForm').submit();">
                        <option value="">None</option>
                        <option value="">All</option>
                        <option value="Terbaru" {{ request('filter') == 'Terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="Terlama" {{ request('filter') == 'Terlama' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </div>
            </form>
        </div>
        
        <x-table.container variant="table">
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.td variant="head">No.</x-table.td>
                        <x-table.td variant="head">Nama Penduduk</x-table.td>
                        <x-table.td variant="head">No. Kartu Keluarga</x-table.td>
                        <x-table.td variant="head">Kepala keluarga</x-table.td>
                        <x-table.td variant="head">Alamat</x-table.td>
                        <x-table.td variant="head">Kelurahan/Desa</x-table.td>
                        <x-table.td variant="head">Kecamatan</x-table.td>
                        <x-table.td variant="head">Kabupaten</x-table.td>
                        <x-table.td variant="head">Provinsi</x-table.td>
                        <x-table.td variant="head">Kode Pos</x-table.td>
                        <x-table.td variant="head">Tanggal penerbitan</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($kartukeluargas as $kartukeluarga)
                    <x-table.tr variant="body">
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                            @foreach ($kartukeluarga->penduduk as $penduduk)
                                <x-table.td>{{ $penduduk->nama }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->no_kk }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->kepala_keluarga }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->alamat }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->kelurahan_desa }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->kecamatan }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->kabupaten }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->provinsi }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->kode_pos }}</x-table.td>
                                <x-table.td>{{ $kartukeluarga->tanggal_penerbitan }}</x-table.td>
                                <x-table.td>
                                    <x-table.container variant="button">
                                        @can ('editOrDelete', $kartukeluarga)
                                            <x-table.button-link variant="edit" href="{{ route('admin.kartu_keluarga.edit', $kartukeluarga) }}">Edit</x-table.button-link>
                                            <x-table.form action="{{ route('admin.kartu_keluarga.destroy', $kartukeluarga) }}">
                                                @method('DELETE')
                                                <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                            </x-table.form>
                                        @endcan
                                    </x-table.container>
                                </x-table.td>
                            @endforeach
                        </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $kartukeluargas->links() }}
        </x-table.container>
    </x-table.container>

</x-admin-layout>