<x-layout>

    <x-table.container variant="main">
        <x-table.container variant="header">
            <x-table.container variant="search-create">
                <x-table.search type="text" placeholder="Cari..." />
                <x-table.button-link variant="create" href="{{ route('admin.desa.create') }}">+ Baru</x-table.button-link>
            </x-table.container>
            <x-table.filter>
                <option value="Terbaru">Terbaru</option>
                <option value="Terlama">Terlama</option>
            </x-table.filter>
        </x-table.container>

        <x-table.table>
            <x-table.thead>
                <x-table.tr>
                    <x-table.td>No.</x-table.td>
                    <x-table.td>Nama desa</x-table.td>
                    <x-table.td>Penduduk</x-table.td>
                    <!-- <x-table.td>Usaha</x-table.td> -->

                    <x-table.td>Aksi</x-table.td>
                </x-table.tr>
            </x-table.thead>
            <tbody>
                @foreach ($desas as $desa)
                    <x-table.tr variant="body">
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td>{{ $desa->nama_desa }}</x-table.td>
                         <x-table.td>{{ $desa->penduduk->count() }}</x-table.td>
                         <!-- <x-table.td>{{ $desa->penduduk->domisiliUsaha->count() }}</x-table.td> -->

                        <x-table.td>
                            <x-table.container variant="button">
                                <x-table.button-link variant="edit" href="{{ route('admin.desa.edit', $desa) }}">Edit</x-table.button-link>
                                <x-table.form action="{{ route('admin.desa.destroy', $desa) }}">
                                    @method('DELETE')
                                    <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                </x-table.form>
                            </x-table.container>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </tbody>
        </x-table.table>

        <x-table.container variant="footer">
            {{ $desas->links() }}
        </x-table.container>
    </x-table.container>

</x-layout>