<x-admin-layout>
    <x-slot:heading>AKTA KEMATIAN</x-slot:heading>

    <x-table.container variant="main">
        <div class="bg-blue-400/80 w-full flex justify-between items-center px-4 py-2 rounded-t-lg">
            <form method="GET" action="{{ route('admin.akta_kematian.search') }}">
                <div class="flex items-center gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama penduduk..."
                        class="bg-slate-100 px-3 py-1 rounded-sm">
                    <button type="submit"
                        class="bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">Cari</button>
                </div>
            </form>

            <form method="GET" action="{{ route('admin.akta_kematian.filter') }}" id="filterForm">
                <div class="w-full flex items-center gap-2">
                    <a href="{{ route('admin.akta_kematian.create') }}"
                        class="inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-sm">+
                        Buat</a>

                    <label for="filter_status" class="font-medium text-xl text-slate-100">Filter:</label>
                    <select name="status" id="status" class="outline-none tet-slate-700 text-lg"
                        onchange="document.getElementById('filterForm').submit();">
                        <option value="">None</option>
                        <option value="">All</option>
                        <option value="Diajukan" {{ request('status') == 'Diajukan' ? 'selected' : '' }}>Diajukan
                        </option>
                        <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses
                        </option>
                        <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </form>
        </div>

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
                    @php
                    $role = auth()->user()->role;
                    $status = $aktaKematian->status;
                    $tampilkan = false;

                    if ($role === 'super_admin' && in_array($status, ['Diproses', 'Selesai'])) {
                    $tampilkan = true;
                    } elseif ($role === 'admin' && in_array($status, ['Diajukan', 'Ditolak','Diproses', 'Selesai'])) {
                    $tampilkan = true;
                    }
                    @endphp

                    @if ($tampilkan)
                    <x-table.tr variant="body">
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td>{{ $aktaKematian->tanggal->format('d M Y') }}</x-table.td>
                        <x-table.td>{{ $aktaKematian->dataPenduduk->nama }}</x-table.td>
                        <x-table.td>{{ $aktaKematian->tanggal_meninggal }}</x-table.td>
                        <x-table.td>{{ $aktaKematian->tempat_meninggal }}</x-table.td>
                        <x-table.td>{{ $aktaKematian->penyebab_meninggal }}</x-table.td>
                        <x-table.td>{{ $aktaKematian->status }}</x-table.td>
                        <x-table.td>
                            <x-table.container variant="button">
                                 @if ($aktaKematians->currentPage() === 1 && $loop->first)
    @can('acceptOrReject', $aktaKematian)
        @if ($aktaKematian->status === 'Diajukan')
            <x-table.form action="{{ route('admin.akta_kematian.accept', $aktaKematian) }}">
                @method('PATCH')
                <x-table.button variant="accept" type="submit">Terima</x-table.button>
            </x-table.form>
            <x-table.form action="{{ route('admin.akta_kematian.reject', $aktaKematian) }}">
                @method('PATCH')
                <x-table.button variant="reject" type="submit">Tolak</x-table.button>
            </x-table.form>
        @else
            <span>-</span>
        @endif
    @endcan

    @can('completeOrEditOrDelete', $aktaKematian)
        @if ($aktaKematian->status !== 'Selesai')
            <x-table.form action="{{ route('admin.akta_kematian.complete', $aktaKematian) }}">
                @method('PATCH')
                <x-table.button variant="complete" type="submit">Selesai</x-table.button>
            </x-table.form>
            <x-table.form action="{{ route('admin.akta_kematian.destroy', $aktaKematian) }}">
                @method('DELETE')
                <x-table.button variant="delete" type="submit">Hapus</x-table.button>
            </x-table.form>
        @else
            <span>-</span>
        @endif
    @endcan
@else
    @if (Auth::user()->role === 'super_admin')
        @if ($aktaKematian->status === 'Diproses')
            <span class="text-black-600 font-semibold">Menunggu</span>
        @else
            <span>-</span>
        @endif
    @elseif (Auth::user()->role === 'admin')
        @if ($aktaKematian->status === 'Diajukan')
            <span class="text-black-500 font-semibold">Menunggu</span>
        @else
            <span>-</span>
        @endif
    @else
        <span>-</span> {{-- Fallback default --}}
    @endif
@endif

                            </x-table.container>
                        </x-table.td>
                    </x-table.tr>
                    @endif
                    @endforeach


                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $aktaKematians->links() }}
        </x-table.container>
    </x-table.container>

</x-admin-layout>
