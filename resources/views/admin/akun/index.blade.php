<x-admin-layout>
    <x-slot:heading>
        AKUN
    </x-slot:heading>

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
                        <x-table.td variant="head">Username</x-table.td>
                        <x-table.td variant="head">Role</x-table.td>
                        <x-table.td variant="head">Email</x-table.td>
                        <x-table.td variant="head">Password</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($users as $user)
                        <x-table.tr variant="body">
                            <x-table.td>{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $user->name }}</x-table.td>
                            <x-table.td>{{ $user->role }}</x-table.td>
                            <x-table.td>{{ $user->email }}</x-table.td>
                            <x-table.td>{{ $user->password }}</x-table.td>
                            <x-table.td>
                                @can ('editOrDelete', $user)
                                    <x-table.container variant="button">
                                        <x-table.button-link variant="edit" href="{{ route('admin.akun.edit', $user) }}">Edit</x-table.button-link>
                                        <x-table.form action="#">
                                            @method('DELETE')
                                            <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                        </x-table.form>
                                    </x-table.container>
                                @endcan
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $users->links() }}
        </x-table.container>
    </x-table.container>

</x-admin-layout>