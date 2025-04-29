<x-layout>

    <div class="bg-slate-200 w-full flex flex-col justify-center rounded-lg shadow shadow-slate-500/60">
        <div class="bg-blue-400/80 w-full flex justify-between items-center px-4 py-2 rounded-t-lg">
            <input type="text" placeholder="Search..." class="bg-slate-100 w-1/5 px-3 py-1 rounded-lg">
            <div class="flex items-center gap-2">
                <label for="filter_status" class="font-medium text-xl text-slate-100">Filter:</label>
                <select name="filter_status" id="filter_status" class="outline-none tet-slate-700 text-lg">
                    <option value="Terbaru">Terbaru</option>
                    <option value="Terlama">Terlama</option>
                </select>
            </div>
        </div>
    
        <div class="w-full overflow-auto">
            <table class="w-full table-auto">
                <thead class="border-b-2 border-slate-500 bg-slate-100">
                    <tr>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">No.</td>
                        <td class="font-bold px-12 py-2 text-slate-700 text-lg text-center whitespace-nowrap">Tanggal</td>
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
                            <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $pindahDomisili->tanggal }}</td>
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

</x-layout>