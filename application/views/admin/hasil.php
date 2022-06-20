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
                <th scope="col">Total Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($hasil as $h) {

            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $h['id_anggota']; ?></td>
                    <td><?= $h['nama']; ?></td>
                    <td><?= $h['hasil']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->