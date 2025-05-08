<x-admin-layout>
    <x-slot:heading>AKTA KEMATIAN</x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="header">
            <x-table.container variant="search-create">
                <x-table.search type="text" placeholder="Cari..." />
                <x-table.button-link variant="create" href="{{ route('admin.akta_kematian.create') }}">+ Buat</x-table.button-link>
            </x-table.container>
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
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.form action="{{ route('admin.akta_kematian.accept', $aktaKematian) }}">
                                        @method('PATCH')
                                        <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                    </x-table.form>
                                    <x-table.form action="{{ route('admin.akta_kematian.reject', $aktaKematian) }}">
                                        @method('PATCH')
                                        <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                    </x-table.form>
                                    <x-table.form action="{{ route('admin.akta_kematian.complete', $aktaKematian) }}">
                                        @method('PATCH')
                                        <x-table.button variant="complete" type="submit">Selesai</x-table.button>
                                    </x-table.form>
    
                                    <x-table.button-link variant="edit" href="{{ route('admin.akta_kematian.edit', $aktaKematian) }}">Edit</x-table.button-link>
                                    <x-table.form action="{{ route('admin.akta_kematian.destroy', $aktaKematian) }}">
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
            {{ $aktaKematians->links() }}
        </x-table.container>
    </x-table.container>

</x-admin-layout>