<x-admin-layout>
    <x-slot:heading>
        PENERBITAN AKTA KELAHIRAN
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="header">
            <x-table.container variant="search-create">
                <x-table.search type="text" placeholder="Cari" />
                <x-table.button-link variant="create" href="{{ route('admin.penerbitan_akta_kelahiran.create') }}">+ Buat</x-table.button-link>
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
                        <x-table.td variant="head">Tanggal</x-table.td>
                        <x-table.td variant="head">Nomor akta</x-table.td>
                        <x-table.td variant="head">Nama anak</x-table.td>
                        <x-table.td variant="head">Nama ayah</x-table.td>
                        <x-table.td variant="head">Nama ibu</x-table.td>
                        <x-table.td variant="head">Tempat kelahiran</x-table.td>
                        <x-table.td variant="head">Jenis kelamin</x-table.td>
                        <x-table.td variant="head">Agama</x-table.td>
                        <x-table.td variant="head">Upload Sp. Bidan</x-table.td>
                        <x-table.td variant="head">Upload Sp. RT</x-table.td>
                        <x-table.td variant="head">Status</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($penerbitanAktaKelahirans as $penerbitanAktaKelahiran)
    @php
        $role = auth()->user()->role;
        $status = $penerbitanAktaKelahiran->status;
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
            <x-table.td>{{ $penerbitanAktaKelahiran->tanggal->format('d M Y') }}</x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->nomor_akta }}</x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->nama_anak }}</x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->nama_ayah }}</x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->nama_ibu }}</x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->tempat_kelahiran }}</x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->jenis_kelamin }}</x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->agama }}</x-table.td>
            <x-table.td>
                <a href="{{ asset('storage/' . $penerbitanAktaKelahiran->upload_sp_bidan) }}" target="_blank" class="text-blue-600 underline">
                    {{ $penerbitanAktaKelahiran->upload_sp_bidan }}
                </a>
            </x-table.td>
            <x-table.td>
                <a href="{{ asset('storage/' . $penerbitanAktaKelahiran->upload_sp_rt) }}" target="_blank" class="text-blue-600 underline">
                    {{ $penerbitanAktaKelahiran->upload_sp_rt }}
                </a>
            </x-table.td>
            <x-table.td>{{ $penerbitanAktaKelahiran->status }}</x-table.td>
            <x-table.td>
                <x-table.container variant="button">
                    @if ($penerbitanAktaKelahirans->currentPage() === 1 && $loop->first)
    @can ('acceptOrReject', $penerbitanAktaKelahiran)
        <x-table.form action="{{ route('admin.penerbitan_akta_kelahiran.accept', $penerbitanAktaKelahiran) }}">
            @method('PATCH')
            <x-table.button variant="accept" type="submit">Terima</x-table.button>
        </x-table.form>
        <x-table.form action="{{ route('admin.penerbitan_akta_kelahiran.reject', $penerbitanAktaKelahiran) }}">
            @method('PATCH')
            <x-table.button variant="reject" type="submit">Tolak</x-table.button>
        </x-table.form>
    @endcan
@else
    @if ($penerbitanAktaKelahiran->status === 'Diajukan' && Auth::user()->role === 'admin')
        <span class="text-black-500 font-semibold">Menunggu</span>
    @elseif (in_array($penerbitanAktaKelahiran->status, ['Diproses', 'Selesai', 'Ditolak', 'Dihapus']) && Auth::user()->role === 'admin')
        <span>-</span>
    @endif
@endif

@if ($penerbitanAktaKelahirans->currentPage() === 1 && $loop->first)
    @can ('completeOrEditOrDelete', $penerbitanAktaKelahiran)
        <x-table.form action="{{ route('admin.penerbitan_akta_kelahiran.complete', $penerbitanAktaKelahiran) }}">
            @method('PATCH')
            <x-table.button variant="complete" type="submit">Selesai</x-table.button>
        </x-table.form> 
                <x-table.form action="{{ route('admin.penerbitan_akta_kelahiran.destroy', $penerbitanAktaKelahiran) }}">
            @method('DELETE')
            <x-table.button variant="delete" type="submit">Hapus</x-table.button>
        </x-table.form>
    @endcan
@else
    @if (Auth::user()->role === 'super_admin')
        @if ($penerbitanAktaKelahiran->status === 'Diproses')
            <span class="text-black-600 font-semibold">Menunggu</span>
        @else
            <span>-</span>
        @endif
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
            {{ $penerbitanAktaKelahirans->links() }}
        </x-table.container>
    </x-table.container>

</x-admin-layout>