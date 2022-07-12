<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <br>
    
    <div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/carikriteria'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nama kriteria..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
                <a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahkriteria'); ?>">Tambah Kriteria</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Bobot</th>
                <th scope="col" width="14%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data_kriteria as $kriteria) {

            ?>
                <tr>
                    <th scope="row">C<?= $kriteria['id_kriteria']; ?></th>
                    <td><?= $kriteria['nama']; ?></td>
                    <td><?= $kriteria['bobot']*100; ?>%</td>
                    <td class="text-center">
                        <a href="<?= base_url('Admin/editkriteria/' . $kriteria['id_kriteria']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuskriteria/' . $kriteria['id_kriteria']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr class="bg-success text-white fw-bold">
                <td colspan="2">Total</td>
                <td><?= $bobot['total']*100; ?>%</td>
                <td> </td>
            </tr>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->