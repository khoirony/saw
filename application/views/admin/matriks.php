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
                <th scope="col">C1</th>
                <th scope="col">C2</th>
                <th scope="col">C3</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($matriks as $m) {

            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $m['id_anggota']; ?></td>
                    <td><?= $m['nama']; ?></td>
                    <td><?= $m['c1']; ?></td>
                    <td><?= $m['c2']; ?></td>
                    <td><?= $m['c3']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->