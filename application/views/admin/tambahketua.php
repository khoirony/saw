<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Masukkan Data Ketua</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-7 text-center">

            <form class="user" method="POST" action="">
            <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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