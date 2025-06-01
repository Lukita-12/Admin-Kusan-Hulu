<x-admin-layout>
    <x-slot:heading>
        DOMISILI USAHA
    </x-slot:heading>

    <x-table.container variant="main">
        <div class="bg-blue-400/80 w-full flex justify-between items-center px-4 py-2 rounded-t-lg">
            <form method="GET" action="{{ route('admin.domisili_usaha.search') }}">
                <div class="flex items-center gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama penduduk..."
                        class="bg-slate-100 px-3 py-1 rounded-sm">
                    <button type="submit"
                        class="bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">Cari</button>
                </div>
            </form>

            <form method="GET" action="{{ route('admin.domisili_usaha.filter') }}" id="filterForm">
                <div class="w-full flex items-center gap-2">
                    <a href="{{ route('admin.domisili_usaha.create') }}"
                        class="inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">+
                        Buat</a>
                   

                    <label for="filter_status" class="font-medium text-xl text-slate-100">Filter:</label>
                    <select name="status" id="status" class="outline-none tet-slate-700 text-lg"
                        onchange="document.getElementById('filterForm').submit();">
                        <option value="">None</option>
                        <option value="">All</option>
                        <option value="Diajukan" {{ request('status') == 'Diajukan' ? 'selected' : '' }}>Diajukan
                        </option>
                        <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses
                        </option>
                        <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </form>
        </div>

        <x-table.container variant="table">
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.td variant="head">No.</x-table.td>
                        <x-table.td variant="head">Tanggal Pengajuan</x-table.td>
                        <x-table.td variant="head">Nama Penduduk</x-table.td>
                        <x-table.td variant="head">Nama Usaha</x-table.td>
                        <x-table.td variant="head">Jenis Usaha</x-table.td>
                        <x-table.td variant="head">Alamat Usaha</x-table.td>
                        <x-table.td variant="head">Status</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($domisiliUsahas as $domisiliUsaha)
                    @php
                    $role = auth()->user()->role;
                    $status = $domisiliUsaha->status;
                    $tampilkan = false;

                    if ($role === 'super_admin' && in_array($status, ['Diproses', 'Selesai'])) {
                    $tampilkan = true;
                    } elseif ($role === 'admin' && in_array($status, ['Diajukan', 'Ditolak','Diproses', 'Selesai'])) {
                    $tampilkan = true;
                    }
                    @endphp

                    @if ($tampilkan)
                    <x-table.tr variant="body">
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td>{{ $domisiliUsaha->tanggal->format('d M Y') }}</x-table.td>
                        <x-table.td>{{ $domisiliUsaha->dataPenduduk->nama }}</x-table.td>
                        <x-table.td>{{ $domisiliUsaha->nama_usaha }}</x-table.td>
                        <x-table.td>{{ $domisiliUsaha->jenis_usaha }}</x-table.td>
                        <x-table.td>{{ $domisiliUsaha->alamat_usaha }}</x-table.td>
                        <x-table.td>{{ $domisiliUsaha->status }}</x-table.td>
                        <x-table.td>
                            <x-table.container variant="button">
                               @if ($domisiliUsahas->currentPage() === 1 && $loop->first)
                                    @can('acceptOrReject', $domisiliUsaha)
                                        @if ($domisiliUsaha->status === 'Diajukan')
                                            <x-table.form action="{{ route('admin.domisili_usaha.accept', $domisiliUsaha) }}">
                                                @method('PATCH')
                                                <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                            </x-table.form>

                                            <x-table.form action="{{ route('admin.domisili_usaha.reject', $domisiliUsaha) }}">
                                                @method('PATCH')
                                                <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                            </x-table.form>
                                        @else
                                            @if (Auth::user()->role === 'admin' && in_array($domisiliUsaha->status, ['Diproses', 'Selesai']))
                                                <span>-</span>
                                            @endif
                                        @endif
                                    @endcan
                                @else
                                    @if ($domisiliUsaha->status === 'Diajukan')
                                        <span class="text-black-500 font-semibold">Menunggu</span>
                                    @elseif (Auth::user()->role === 'admin' && in_array($domisiliUsaha->status, ['Diproses', 'Selesai']))
                                        <span>-</span>
                                    @endif
                                @endif
                                @if ($domisiliUsahas->currentPage() === 1 && $loop->first)
                                    @can('completeOrEditOrDelete', $domisiliUsaha)
                                        @if ($domisiliUsaha->status !== 'Selesai')
                                            <x-table.form action="{{ route('admin.domisili_usaha.complete', $domisiliUsaha) }}">
                                                @method('PATCH')
                                                <x-table.button variant="complete" type="submit">Selesai</x-table.button>
                                            </x-table.form>

                                            <x-table.form action="{{ route('admin.domisili_usaha.destroy', $domisiliUsaha) }}">
                                                @method('DELETE')
                                                <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                            </x-table.form>
                                        @else
                                            <span>-</span>
                                        @endif
                                    @endcan
                                @else
                                    @if (Auth::user()->role === 'super_admin')
                                        @if ($domisiliUsaha->status === 'Diproses')
                                            <span class="text-black-600 font-semibold">Menunggu</span>
                                        @else
                                            <span>-</span>
                                        @endif
                                    @endif
                                @endif

                            </x-table.container>
                        </x-table.td>
                    </x-table.tr>
                    @endif
                    @endforeach

                    

                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $domisiliUsahas->links() }}
        </x-table.container>
    </x-table.container>

</x-admin-layout>