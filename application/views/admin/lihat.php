<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>
    <br>

    <div class="row ml-3">
        <div class="col-5">
            <div class="row pt-2">
                <div class="col-4">
                    Id Anggota
                </div>
                <div class="col-8">
                    : <?= $anggota['id_anggota']; ?>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-4">
                    Nama Anggota
                </div>
                <div class="col-8">
                    : <?= $anggota['nama']; ?>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-4">
                    Jenis Kelamin
                </div>
                <div class="col-8">
                    : <?= $anggota['jk']; ?>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-4">
                    Tanggal Masuk
                </div>
                <div class="col-8">
                    : <?= $anggota['tgl_masuk']; ?>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-4">
                    Pekerjaan
                </div>
                <div class="col-8">
                    : <?= $anggota['pekerjaan']; ?>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-4">
                    Nomor HP
                </div>
                <div class="col-8">
                    : <?= $anggota['no_hp']; ?>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-4">
                    Alamat
                </div>
                <div class="col-8">
                    : <?= $anggota['alamat']; ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <a href="<?= base_url('Admin/kelola');?>" class="btn btn-sm px-3 btn-primary rounded-pill">Kembali</a>
    </div>
</div>
<!-- /.container-fluid -->

