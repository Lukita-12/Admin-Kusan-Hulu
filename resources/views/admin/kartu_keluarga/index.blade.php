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
                        <x-table.td variant="head">No. Kartu Keluarga</x-table.td>
                        <x-table.td variant="head">Kepala keluarga</x-table.td>
                        <x-table.td variant="head">Alamat</x-table.td>
                        <x-table.td variant="head">Kelurahan/Desa</x-table.td>
                        <x-table.td variant="head">Kecamatan</x-table.td>
                        <x-table.td variant="head">Kabupaten</x-table.td>
                        <x-table.td variant="head">Provinsi</x-table.td>
                        <x-table.td variant="head">Kode Pos</x-table.td>
                        <x-table.td variant="head">Tanggal penerbitan</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($kartukeluargas as $kartukeluarga)
                        <x-table.tr variant="body">
                            <x-table.td>{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->no_kk }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->kepala_keluarga }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->alamat }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->kelurahan_desa }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->kecamatan }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->kabupaten }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->provinsi }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->kode_pos }}</x-table.td>
                            <x-table.td>{{ $kartukeluarga->tanggal_penerbitan }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.button-link href="{{ route('admin.kartu_keluarga.edit', $kartukeluarga) }}">Edit</x-table.button-link>
                                    <x-table.form action="{{ route('admin.kartu_keluarga.destroy', $kartukeluarga) }}">
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
            {{ $kartukeluargas->links() }}
        </x-table.container>
    </x-table.container>

</x-layout>