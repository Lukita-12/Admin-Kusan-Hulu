<x-admin-layout>
    <x-slot:heading>
        PINDAH DOMISILI
    </x-slot:heading>

    <div class="bg-slate-200 w-full flex flex-col justify-center rounded-lg shadow shadow-slate-500/60">
        <div class="bg-blue-400/80 w-full flex justify-between items-center px-4 py-2 rounded-t-lg">
            <form method="GET" action="{{ route('admin.pindah_domisili.search') }}">
                <div class="flex items-center gap-2">                    
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="bg-slate-100 px-3 py-1 rounded-sm">
                    <button type="submit" class="bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">Cari</button>
                </div>
            </form>

            <form method="GET" action="{{ route('admin.pindah_domisili.filter') }}" id="filterForm">
                <div class="w-full flex items-center gap-2">
                    <a href="{{ route('admin.pindah_domisili.create') }}" class="inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">+ Buat</a>

                    <label for="filter_status" class="font-medium text-xl text-slate-100">Filter:</label>
                    <select name="status" id="status" class="outline-none tet-slate-700 text-lg" onchange="document.getElementById('filterForm').submit();">
                        <option value="">None</option>
                        <option value="">All</option>
                        <option value="Diajukan" {{ request('status') == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                        <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </form>
        </div>
    
        <div class="w-full overflow-auto">
            <table class="w-full table-auto">
                <thead class="border-b-2 border-slate-500 bg-slate-100">
                    <tr>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">No.</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Tanggal</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">No. Kartu Keluarga</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Nama Penduduk</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Alamat asal</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Tujuan</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Alasan pindah</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Status</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pindahDomisilis as $pindahDomisili)
                        <tr class="odd:bg-slate-200 even:bg-slate-100">
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->tanggal->format('d M Y') }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->penduduk->kartukeluarga->no_kk }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->penduduk->nama }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->alamat_asal }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->tujuan }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->alasan_pindah }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->status }}</td>
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <form method="POST" action="{{ route('admin.pindah_domisili.accept', $pindahDomisili) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-cyan-500 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">Terima</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.pindah_domisili.reject', $pindahDomisili) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-orange-500 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">Tolak</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.pindah_domisili.complete', $pindahDomisili) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-blue-500 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">Selesai</button>
                                    </form>

                                    <a href="{{ route('admin.pindah_domisili.edit', $pindahDomisili) }}" class="inline-block bg-green-500 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">Edit</a>
                                    <form method="POST" action="{{ route('admin.pindah_domisili.destroy', $pindahDomisili) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">Haput</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-full h-16 flex gap-20 items-center px-4">
            {{ $pindahDomisilis->links() }}
        </div>
    </div>

</x-admin-layout>