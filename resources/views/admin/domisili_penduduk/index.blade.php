<x-layout>

    <x-table.container variant="main">
        <x-table.container variant="header">
            <x-table.search type="text" placeholder="Cari..." />
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
                        <x-table.td variant="head">Jenis Kelamin</x-table.td>
                        <x-table.td variant="head">Status</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($domisiliPenduduks as $domisiliPenduduk)
                        <x-table.tr variant="body">
                            <x-table.td>{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $domisiliPenduduk->tanggal->format('d M Y') }}</x-table.td>
                            <x-table.td>{{ $domisiliPenduduk->penduduk->nama }}</x-table.td>
                            <x-table.td>{{ $domisiliPenduduk->penduduk->jenis_kelamin }}</x-table.td>
                            <x-table.td>{{ $domisiliPenduduk->status }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.form action="{{ route('admin.domisili_penduduk.accept', $domisiliPenduduk) }}">
                                        @method('PATCH')
                                        <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                    </x-table.form>
                                    <x-table.form action="{{ route('admin.domisili_penduduk.reject', $domisiliPenduduk) }}">
                                        @method('PATCH')
                                        <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                    </x-table.form>
                                    <x-table.form action="{{ route('admin.domisili_penduduk.complete', $domisiliPenduduk) }}">
                                        @method('PATCH')
                                        <x-table.button variant="complete" type="submit">Selesai</x-table.button>
                                    </x-table.form>
                                    <x-table.button-link href="{{ route('admin.domisili_penduduk.edit', $domisiliPenduduk) }}">Edit</x-table.button-link>
                                </x-table.container>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $domisiliPenduduks->links() }}
        </x-table.container>

    </x-table.container>

</x-layout>