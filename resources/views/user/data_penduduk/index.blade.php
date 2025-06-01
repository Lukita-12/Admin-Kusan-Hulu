<x-user-layout>
    <x-slot:heading>
        DATA PENDUDUK
    </x-slot:heading>
    
    <div class="h-screen flex flex-col items-center gap-6">
        <div>
            @if($dataPenduduk->isEmpty())
            <a href="{{route('user.data_penduduk.create')}}"
                class="inline-block bg-green-500 font-semibold text-lg text-white text-center px-3 py-1 rounded-md">Tambah</a>
            @else
            <a href="{{route('user.data_penduduk.edit',$dataPenduduk)}}"
                class="inline-block bg-red-500 font-semibold text-lg text-white text-center px-3 py-1 rounded-md">Edit</a>
            @endif
        </div>

        <div class="overflow-x-auto">
            @foreach($dataPenduduk as $penduduk)
            <table class="w-full border border-gray-300 mb-6">
                <thead class="bg-gray-100">
                    <tr>
                        <th colspan="2" class="px-4 py-2 text-left font-medium text-gray-700">
                            Data Penduduk
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Nama</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">NIK</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->nik ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Nomor KK</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->no_kk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Jenis Kelamin</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->jenis_kelamin ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Status Perkawinan</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->status_perkawinan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Tempat Lahir</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->tempat_lahir ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Tanggal Lahir</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->tanggal_lahir ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Agama</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->agama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Pendidikan Terakhir</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->pendidikan_terakhir ?? '-' }}</td>
                    </tr>
                     <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Pekerjaan</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->pekerjaan ?? '-' }}</td>
                    </tr>
                     <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Alamat lengkap</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->alamat_lengkap ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Kedudukan Dalam Keluarga</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->kedudukan_dalam_keluarga ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b font-medium text-gray-700">Warga Negara</td>
                        <td class="px-4 py-2 border-b">{{ $penduduk->warga_negara ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>


    </div>
</x-user-layout>
