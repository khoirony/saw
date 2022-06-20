<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kriteria Penilaian Anggota</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <div class="text-start ms-3 mb-3">
                Id Anggota : <?= $anggota['id_anggota']; ?> <br>
                Nama Anggota : <?= $anggota['nama']; ?><br>
            </div>

            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">C1 - Besarnya Simpanan (35%)</p>
                    <?php 
                    if($hitung){
                        echo '<input type="text" class="form-control form-control-user" id="c1" name="c1" value="'.$penilaian['c1'].'">';
                    }else{
                        echo'<input type="text" class="form-control form-control-user" id="c1" name="c1" placeholder="Rp.">';
                    }
                    ?>
                    <?= form_error('c1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">C2 - Banyaknya Transaksi (50%)</p>
                    <?php 
                    if($hitung){
                        echo '<input type="text" class="form-control form-control-user" id="c2" name="c2" value="'.$penilaian['c2'].'">';
                    }else{
                        echo'<input type="text" class="form-control form-control-user" id="c2" name="c2" placeholder="Banyaknya Transaksi">';
                    }
                    ?>
                    
                    <?= form_error('c2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">C3 - Besarnya Keuntungan (15%)</p>
                    <?php 
                    if($hitung){
                        echo '<input type="text" class="form-control form-control-user" id="c3" name="c3" value="'.$penilaian['c3'].'"';
                    }else{
                        echo'<input type="text" class="form-control form-control-user" id="c3" name="c3" placeholder="Rp.">';
                    }
                    ?>
                    
                    <?= form_error('c3', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-user px-5 mt-3">
                        Simpan
                    </button>
                </div>
            </form>
            <br>
        </div>

    </div>

</div>

<!-- <script type="text/javascript">
    // C1
    var c1 = document.getElementById('c1');
    c1.addEventListener('keyup', function(e)
    {
        c1.value = formatRupiah(this.value);
    });

	// C3
    var c3 = document.getElementById('c3');
    c3.addEventListener('keyup', function(e)
    {
        c3.value = formatRupiah(this.value);
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script> -->
<!-- /.container-fluid -->