<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Id Anggota</th>
                <th scope="col">Nama Anggota</th>
                <?php foreach ($kriteria as $k): ?>
                <th scope="col">C<?= $k['id_kriteria']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($normalisasi as $n) {

            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $n['id_anggota']; ?></td>
                    <td><?= $n['nama']; ?></td>
                    <?php foreach ($kriteria as $k): ?>
                        <td><?= $n['c'.$k['id_kriteria']]; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->