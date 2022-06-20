<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hasil Pencarian dari : <?= $text; ?></h1>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Id Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col" width="14%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            foreach ($cari as $anggota) {

            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $anggota['id_anggota']; ?></td>
                    <td><?= $anggota['nama']; ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('Admin/editdata/' . $anggota['id_anggota']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapusdata/' . $anggota['id_anggota']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        <a href="<?= base_url('Admin/lihatdata/' . $anggota['id_anggota']); ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->