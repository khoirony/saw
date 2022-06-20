<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <br>
    <div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripenilaian'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nama..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
                
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <!-- <th scope="col">No Peserta</th> -->
                <th scope="col">Id Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col" width="14%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data_anggota as $anggota) {

            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $anggota['id_anggota']; ?></td>
                    <td><?= $anggota['nama']; ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('Admin/tambahpenilaian/' . $anggota['id_anggota']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-external-link-alt"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->