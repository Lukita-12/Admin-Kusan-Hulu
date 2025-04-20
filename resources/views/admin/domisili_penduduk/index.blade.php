<x-layout>

    <x-container.dashboard>
        <x-sidebar.sidebar />

        <x-container.main class="overflow-auto h-sceen">
            <div class="min-h-fit sticky top-0 bg-slate-200 w-full px-4 py-1 flex justify-between items-center shadow shadow-slate-500/80">
                <div>
                    <input type="text" placeholder="Cari" class="bg-slate-100 px-3 py-1 rounded-md">
                </div>
                <div>
                    <img src="{{ asset('../public/images/peakpx_cat.jpg') }}" alt="profile" class="w-10 h-10 rounded-full">
                </div>
            </div>

            <div class="h-full flex flex-col justify-center">
                <div class="mx-8 bg-white flex flex-col rounded-lg shadow-md shadow-slate-500/50">
                    <div class="bg-cyan-600/80 px-4 py-1 flex min-w-full justify-between items-center rounded-t-lg shadow-sm shadow-slate-500/80">
                        <h1 class="font-bold text-slate-100 text-2xl">Domsisili Penduduk</h1>
                        <input type="text" placeholder="Cari..." class="bg-slate-100 w-1/5 px-3 py-1 text-lg rounded-lg">
                    </div>
            
                    <div class="w-full overflow-x-auto ">
                        <table class="table-auto min-w-full">
                            <thead>
                                <tr class="border-b-2 border-slate-500">
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">No.</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Nomor Surat</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">No. Kartu Keluarga</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Tanggal Pengajuan</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Nama Lengkap</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Tempat Tanggal Lahir</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Jenis Kelamin</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Status Perkawinan</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Agama</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Pekerjaan</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Warga Negara</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Alamat</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Status</th>
                                    <th class="px-12 py-4 font-semibold text-slate-700 text-lg text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($domisiliPenduduks as $domisiliPenduduk)
                                    <tr class="odd:bg-white even:bg-gray-100">
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->nomor_surat ?? '-' }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->kartukeluarga->no_kk }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->tanggal_pengajuan->format('d M Y') }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->nama }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->tempat_lahir }}, {{ $domisiliPenduduk->penduduk->tanggal_lahir->format('d M Y') }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->jenis_kelamin }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->status_perkawinan }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->agama }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->pekerjaan }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->warga_negara }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->penduduk->alamat_lengkap }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">{{ $domisiliPenduduk->status }}</td>
                                        <td class="px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap">
                                            <div class="flex gap-1 items-center">
                                                <form method="POST" action="{{ route('admin.domisili_penduduk.accept', $domisiliPenduduk) }}" class="bg-blue-400/80 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit">Terima</button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.domisili_penduduk.reject', $domisiliPenduduk) }}" class="bg-red-500/80 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit">Tolak</button>
                                                </form>
                                                <span class="py-2 border-2 border-slate-500 mx-2"></span>
                                                <form method="POST" action="{{ route('admin.domisili_penduduk.complete', $domisiliPenduduk) }}" class="bg-cyan-500/80 font-semibold text-sm text-white text-center px-3 py-1 rounded-sm">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit">Selesai</button>
                                                </form>
                                                <a href="{{ route('admin.domisili_penduduk.edit', $domisiliPenduduk) }}" class="inline-block bg-green-500 px-3 py-1 font-semibold text-white text-sm rounded-sm">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            
                    <div class="w-full h-12 px-3 py-1">
                        {{ $domisiliPenduduks->links() }}
                    </div>
                </div>
            </div>
        </x-container.main>
    </x-container.dashboard>

</x-layout>