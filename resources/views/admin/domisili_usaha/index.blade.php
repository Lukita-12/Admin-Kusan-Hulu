<x-layout>

    <div class="flex h-screen">
        <div class="h-screen min-w-64 bg-gray-700">
            //
        </div>
        
        <main class="flex-1 overflow-auto">
            <div class="bg-slate-200 px-4 py-1 flex justify-between shadow shadow-slate-500/80">
                <h1 class="text-blue-400/80 font-bold text-2xl">Domisili Usaha</h1>
                <img src="{{ asset('../public/images/peakpx_cat.jpg') }}" alt="profile" class="w-10 h-10 object-cover rounded-full">
            </div>

            <div class="mx-8 h-full flex items-center">
                <div class="w-full h-fit bg-slate-200 flex flex-col rounded-lg shadow shadow-slate-500/80">
                    <x-table.header-container>    
                        <x-table.header-search type="text" placeholder="Cari..." />
                        <x-table.header-filter>
                            <x-table.header-label for="filter_status">Filter status:</x-table.header-label>
                            <x-table.header-select name="filter_status" id="filter_status">
                                <option value="Terbaru" class="text-cyan-500">Terbaru</option>
                                <option value="Terlama" class="text-cyan-500">Terlama</option>
                                <option value="Ditunggu" class="text-cyan-500">Ditunggu</option>
                                <option value="Diterima" class="text-cyan-500">Diterima</option>
                                <option value="Ditolak" class="text-cyan-500">Ditolak</option>
                                <option value="Selesai" class="text-cyan-500">Selesai</option>
                            </x-table.header-select>
                        </x-table.header-filter>
                    </x-table.header-container>
            
                    <x-table.table-container>
                        <x-table.table>
                            <thead>
                                <x-table.tr-head>
                                    <x-table.td variant="head">No.</x-table.td>
                                    <x-table.td variant="head">Tanggal Pengajuan</x-table.td>
                                    
                                    <x-table.td variant="head">No. Kartu Keluarga</x-table.td>
                                    <x-table.td variant="head">Nama Usaha</x-table.td>
                                    <x-table.td variant="head">Tempat Tanggal Lahir</x-table.td>
                                    <x-table.td variant="head">Alamat</x-table.td>
                
                                    <x-table.td variant="head">Nama Usaha</x-table.td>
                                    <x-table.td variant="head">Jenis Usaha</x-table.td>
                                    <x-table.td variant="head">Alamat</x-table.td>
                                    <x-table.td variant="head">Status</x-table.td>
                                    <x-table.td variant="head">Aksi</x-table.td>
                                </x-table.tr-head>
                            </thead>
                            <tbody>
                                @foreach ($domisiliUsahas as $domisiliUsaha)
                                    <x-table.tr-body>
                                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                                        <x-table.td>{{ $domisiliUsaha->tanggal }}</x-table.td>
                
                                        <x-table.td>{{ $domisiliUsaha->penduduk->kartukeluarga->no_kk }}</x-table.td>
                                        <x-table.td>{{ $domisiliUsaha->penduduk->nama }}</x-table.td>
                                        <x-table.td>{{ $domisiliUsaha->penduduk->tempat_lahir }}, {{ $domisiliUsaha->penduduk->tanggal_lahir->format('d M Y') }}</x-table.td>
                                        <x-table.td>{{ $domisiliUsaha->penduduk->alamat_lengkap }}</x-table.td>
                
                                        <x-table.td>{{ $domisiliUsaha->nama_usaha }}</x-table.td>
                                        <x-table.td>{{ $domisiliUsaha->jenis_usaha }}</x-table.td>
                                        <x-table.td>{{ $domisiliUsaha->alamat_usaha }}</x-table.td>
                                        <x-table.td>{{ $domisiliUsaha->status }}</x-table.td>
                                        <x-table.td>
                                            <x-table.button-container>
                                                <form method="POST" action="{{ route('admin.domisili_usaha.accept', $domisiliUsaha) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.domisili_usaha.reject', $domisiliUsaha) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.domisili_usaha.complete', $domisiliUsaha) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <x-table.button variant="complete" type="submit">Selesai</x-table.button>
                                                </form>
                                                <x-table.button-link href="{{ route('admin.domisili_usaha.edit', $domisiliUsaha) }}">Edit</x-table.button-link>
                                            </x-table.button-container>
                                        </x-table.td>
                                    </x-table.tr-body>
                                @endforeach
                            </tbody>
                        </x-table.table>
                    </x-table.table-container>
            
                    <div>
                        {{ $domisiliUsahas->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

</x-layout>