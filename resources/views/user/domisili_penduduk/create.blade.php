<x-layout>

    <form action="#" method="post">
        @csrf

        <div>
            <label for="no_kk">No KK</label>
            <input type="text" id="no_kk" name="no_kk" placeholder="Cari...">
            <button type="button" id="btn-cari">Cari</button>
        </div>

        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" readonly onfocus="this.blur();">
        </div>

        <div>
            <label for="ttl">Tempat, Tanggal Lahir</label>
            <input type="text" id="ttl" name="ttl" readonly onfocus="this.blur();">
        </div>


        <div>
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" id="jenis_kelamin" name="jenis_kelamin" readonly onfocus="this.blur();">
        </div>

        <div>
            <label for="status_perkawinan">Status Perkawinan</label>
            <input type="text" id="status_perkawinan" name="status_perkawinan" readonly onfocus="this.blur();">
        </div>

        <div>
            <label for="agama">Agama</label>
            <input type="text" id="agama" name="agama" readonly onfocus="this.blur();">
        </div>

        <div>
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" readonly onfocus="this.blur();">
        </div>

        <div>
            <label for="warga_negara">Warga Negara</label>
            <input type="text" id="warga_negara" name="warga_negara" readonly onfocus="this.blur();">
        </div>

        <div>
            <label for="alamat">Alamat</label>
            <textarea type="text" id="alamat" name="alamat" readonly onfocus="this.blur();"></textarea>
        </div>

        <div>
            <a href="#">Batal</a>
            <button type="submit">Buat</button>
        </div>
    </form>

    <script>
        document.getElementById('btn-cari').addEventListener('click', function() {
            const no_kk = document.getElementById('no_kk').value;

            fetch("{{ route('domisili-usaha.cari') }}?no_kk=" + no_kk)
                .then(response => {
                    if (!response.ok) throw new Error('KK tidak ditemukan');
                    return response.json();
                })
                .then(data => {
                    document.getElementById('nama').value = data.nama;
                    document.getElementById("ttl").value = data.ttl;
                    document.getElementById('jenis_kelamin').value = data.jenis_kelamin;
                    document.getElementById('status_perkawinan').value = data.status_perkawinan;
                    document.getElementById('agama').value = data.agama;
                    document.getElementById('pekerjaan').value = data.pekerjaan;
                    document.getElementById('warga_negara').value = data.warga_negara;
                    document.getElementById('alamat').value = data.alamat;
                })
                .catch(error => {
                    alert(error.message);
                });
        });
    </script>

</x-layout>