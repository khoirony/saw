<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hasil Pencarian dari : <?= $text; ?></h1>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <!-- <th scope="col">No Peserta</th> -->
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col" width="14%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($cari as $ketua) {

            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $ketua['username']; ?></td>
                    <td><?= $ketua['password']; ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('Admin/editketua/' . $ketua['id']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapusketua/' . $ketua['id']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->