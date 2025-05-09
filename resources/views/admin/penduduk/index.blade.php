<x-admin-layout>
    <x-slot:heading>
        PENDUDUK
    </x-slot:heading>

    <x-table.container variant="main">
        <div class="bg-blue-400/80 w-full flex justify-between items-center px-4 py-2 rounded-t-lg">
            <form method="GET" action="{{ route('admin.penduduk.search') }}">
                <div class="flex items-center gap-2">                    
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama penduduk..." class="bg-slate-100 px-3 py-1 rounded-sm">
                    <button type="submit" class="bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">Cari</button>
                </div>
            </form>

            <form method="GET" action="{{ route('admin.penduduk.filter') }}" id="filterForm">
                <div class="w-full flex items-center gap-2">
                    <a href="{{ route('admin.penduduk.create') }}" class="inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">+ Buat</a>

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
                        <x-table.td variant="head">Nama</x-table.td>
                        <x-table.td variant="head">Jenis kelamin</x-table.td>
                        <x-table.td variant="head">Status perkawinan</x-table.td>
                        <x-table.td variant="head">Tempat tanggal lahir</x-table.td>
                        <x-table.td variant="head">Agama</x-table.td>
                        <x-table.td variant="head">Pendidikan terakhir</x-table.td>
                        <x-table.td variant="head">Pekerjaan</x-table.td>
                        <x-table.td variant="head">Alamat lengkap</x-table.td>
                        <x-table.td variant="head">Kedudukan dalam keluarga</x-table.td>
                        <x-table.td variant="head">Warga Negara</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($penduduks as $penduduk)
                        <x-table.tr variant="body">
                            <x-table.td>{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $penduduk->nama }}</x-table.td>
                            <x-table.td>{{ $penduduk->jenis_kelamin }}</x-table.td>
                            <x-table.td>{{ $penduduk->status_perkawinan }}</x-table.td>
                            <x-table.td>{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d M Y') }}</x-table.td>
                            <x-table.td>{{ $penduduk->agama }}</x-table.td>
                            <x-table.td>{{ $penduduk->pendidikan_terakhir }}</x-table.td>
                            <x-table.td>{{ $penduduk->pekerjaan }}</x-table.td>
                            <x-table.td>{{ $penduduk->alamat_lengkap }}</x-table.td>
                            <x-table.td>{{ $penduduk->kedudukan_dalam_keluarga }}</x-table.td>
                            <x-table.td>{{ $penduduk->warga_negara }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.button-link variant="edit" href="{{ route('admin.penduduk.edit', $penduduk) }}">Edit</x-table.button-link>
                                    <x-table.form action="{{ route('admin.penduduk.destroy', $penduduk) }}">
                                        @method('DELETE')
                                        <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                    </x-table.form>
                                </x-table.container>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $penduduks->links() }}
        </x-table.container>
    </x-table.container>

</x-admin-layout>