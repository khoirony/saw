<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Masukkan Data Anggota</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">

            <form class="user" method="POST" action="">
            <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="id" name="id" placeholder="Id Anggota">
                    <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Anggota">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-6 text-start">
                        <p class="ms-3">Jenis Kelamin</p>
                        <div class="row">
                            <div class="col ms-4">
                                <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki">
                                <label class="form-check-label" for="jk">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan">
                                <label class="form-check-label" for="jk">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-start ms-3 mb-0">Tanggal Masuk</p>
                        <input type="date" class="form-control form-control-user" id="tgl_masuk" name="tgl_masuk" placeholder="Tanggal Masuk">
                        <?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Nomor HP">
                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
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