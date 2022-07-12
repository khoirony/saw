<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Masukkan Data Kriteria</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-7 text-center">

            <form class="user" method="POST" action="">
            <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Kriteria">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="bobot" name="bobot" placeholder="Masukkan Bobot Kriteria">
                    <?= form_error('bobot', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary btn-user px-5">
                    Simpan
                </button>

            </form>
            <br>
        </div>

    </div>

</div>
<!-- /.container-fluid -->