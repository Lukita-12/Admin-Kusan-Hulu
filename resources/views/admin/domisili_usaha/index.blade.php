<x-layout>

    <x-table.container variant="main">
        <x-table.container variant="header">
            <x-table.search type="text" placeholder="Search..." />
            <x-table.filter>
                <option value="Terbaru">Terbaru</option>
                <option value="Terlama">Terlama</option>
            </x-table.filter>
        </x-table.container>

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
                        <x-table.tr variant="body">
                            <x-table.td>{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $domisiliUsaha->tanggal }}</x-table.td>
                            <x-table.td>{{ $domisiliUsaha->penduduk->nama }}</x-table.td>
                            <x-table.td>{{ $domisiliUsaha->nama_usaha }}</x-table.td>
                            <x-table.td>{{ $domisiliUsaha->jenis_usaha }}</x-table.td>
                            <x-table.td>{{ $domisiliUsaha->alamat_usaha }}</x-table.td>
                            <x-table.td>{{ $domisiliUsaha->status }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.form action="{{ route('admin.domisili_usaha.accept', $domisiliUsaha) }}">
                                        @method('PATCH')
                                        <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                    </x-table.form>
                                    <x-table.form action="{{ route('admin.domisili_usaha.reject', $domisiliUsaha) }}">
                                        @method('PATCH')
                                        <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                    </x-table.form>
                                    <x-table.form action="{{ route('admin.domisili_usaha.complete', $domisiliUsaha) }}">
                                        @method('PATCH')
                                        <x-table.button variant="complete" type="submit">Selesai</x-table.button>
                                    </x-table.form>

                                    <x-table.button-link href="#">Edit</x-table.button-link>
                                    <x-table.form action="{{ route('admin.domisili_usaha.destroy', $domisiliUsaha) }}">
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

        <x-table.container  variant="footer">
            {{ $domisiliUsahas->links() }}
        </x-table.container>
    </x-table.container>

</x-layout>