<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-center fw-bold text-gray-800">LAPORAN HASIL PERANGKINGAN ANGGOTA TERBAIK BMT KABANDUNGAN</h1>
    <br>
    <p class="fw-bold">Periode Tahun : <?= date('Y');?></p>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Simpanan</th>
                <th scope="col">Transaksi</th>
                <th scope="col">Keuntungan</th>
                <th scope="col">Total Nilai</th>
                <th scope="col">Peringkat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($perangkingan as $p) {

            ?>
                <tr>
                    <td><?= $p['id_anggota']; ?></td>
                    <td><?= $p['nama']; ?></td>
                    <td><?= $p['c1']; ?></td>
                    <td><?= $p['c2']; ?></td>
                    <td><?= $p['c3']; ?></td>
                    <td><?= $p['hasil']; ?></td>
                    <td><?= $no++; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<script>
	window.print();
</script>
<!-- /.container-fluid -->