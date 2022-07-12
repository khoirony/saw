<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row text-white pt-3 pb-5 justify-content-center">
        <div class="card bg-info col-5 mr-5">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Jumlah Anggota</h5>
                <div class="display-4">
                    <?= $jumlah_anggota; ?>
                </div>
                <a href="<?= base_url('ketua/hasil'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

        <div class="card bg-success col-5">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h5 class="card-title">Jumlah Kriteria</h5>
                <div class="display-4">
                    <?= $jumlah_kriteria; ?>
                </div>
                <a href="<?= base_url('ketua/hasil'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- diagram garis akan ditampilkan disini -->
        <canvas id="myChart2"></canvas>               
    </div>

    <!-- Menggunakan library chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script>
        //mebuat chart
        var myChart2 = new Chart(
            //masukan chart ke element canvas dengan id myChart2
            document.getElementById('myChart2'),
            {
                //tipe chart yg digunakan adalah line chart atau diagram garis
                type: 'line',
                data: {
                    //data labels akan diganti dengan data api pada step berikutnya
                    labels: [
                        // menampilkan inputan ke-
                        
                        <?php
                            foreach($perangkingan as $p):
                                echo $p['id_anggota'] . ',';
                            endforeach;
                        ?>
                    ],
                    datasets: [{
                        label: 'Total Nilai',
                        //data akan diganti dengan data api pada step berikutnya
                        data: [
                            // menampilkan isi inputan
                            <?php
                            foreach($perangkingan as $p):
                                echo $p['hasil'] . ',';
                            endforeach; 
                        ?>
                        ],
                        //line akan diwarnai dengan warna merah
                        backgroundColor: [
                        'rgb(255, 99, 132)',
                        ],
                        hoverOffset: 4
                    }]
                }
            }
        );
    </script>
</div>
<!-- /.container-fluid -->