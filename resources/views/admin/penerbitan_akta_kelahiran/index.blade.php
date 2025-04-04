<x-layout>

    <div>
        <a href="{{ route('admin.penerbitan_akta_kelahiran.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Tanggal</td>
                    <td>Nomor akta</td>
                    <td>Tempat kelahiran</td>
                    <td>Nama anak</td>
                    <td>Jenis kelamin</td>
                    <td>Agama</td>
                    <td>Nama ayah</td>
                    <td>Nama ibu</td>
                    <td>Upload St. Bidan</td>
                    <td>Upload St. RT</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerbitanAktaKelahirans as $penerbitanAktaKelahiran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penerbitanAktaKelahiran->tanggal }}</td>
                        <td>{{ $penerbitanAktaKelahiran->nomor_akta }}</td>
                        <td>{{ $penerbitanAktaKelahiran->tempat_kelahiran }}</td>
                        <td>{{ $penerbitanAktaKelahiran->nama_anak }}</td>
                        <td>{{ $penerbitanAktaKelahiran->jenis_kelamin }}</td>
                        <td>{{ $penerbitanAktaKelahiran->agama }}</td>
                        <td>{{ $penerbitanAktaKelahiran->nama_ayah }}</td>
                        <td>{{ $penerbitanAktaKelahiran->nama_ibu }}</td>
                        <td>{{ $penerbitanAktaKelahiran->upload_sp_bidan }}</td>
                        <td>{{ $penerbitanAktaKelahiran->upload_sp_rt }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.penerbitan_akta_kelahiran.edit', $penerbitanAktaKelahiran->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.penerbitan_akta_kelahiran.destroy', $penerbitanAktaKelahiran->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $penerbitanAktaKelahirans->links() }}
    </div>

</x-layout>