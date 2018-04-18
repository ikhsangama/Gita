<div class="wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Home</li>
        </ol>

        <div class="panel-heading">
            <h4 class="nanoo" style="margin: 0 ">Selamat Datang, <?php echo $_SESSION['nama_jabatan']; ?>.</h4>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-sm-4 container">
        <h6>Rekapitulasi Surat</h6>
        <canvas id="myChart1"></canvas>
        <h6>
            <center>Total: <?php include "content/config/koneksi.php";
                $query1 = "SELECT * FROM surat_masuk";
                $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                $query2 = "SELECT * FROM surat_keluar";
                $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
                $jumlah = mysqli_num_rows($result1) + mysqli_num_rows($result2);
                echo $jumlah ?></center>
        </h6>
    </div>
    <div class="col-sm-4 container">
        <h6>Surat Masuk</h6>
        <canvas id="myChart2"></canvas>
        <h6>
            <center>Total: <?php
                $query1 = "SELECT * FROM surat_masuk WHERE status_surat='Sudah Disposisi'";
                $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                $query2 = "SELECT * FROM surat_masuk WHERE status_surat='Belum Disposisi'";
                $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
                $jumlah = mysqli_num_rows($result1) + mysqli_num_rows($result2);
                echo $jumlah ?></center>
        </h6>
    </div>
    <div class="container col-sm-10">
        <canvas id="myChart3"></canvas>
    </div>
</div>

<script>

    var disposisi = <?php
        $query = "SELECT * FROM surat_masuk WHERE status_surat='Sudah Disposisi'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;

    var belum_disposisi = <?php
        $query = "SELECT * FROM surat_masuk WHERE status_surat='Belum Disposisi'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;

    var surat_masuk = disposisi + belum_disposisi;

    var surat_keluar = <?php
        $query = "SELECT * FROM surat_keluar";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;


    var ctx1 = document.getElementById("myChart1");
    var myChart1 = new Chart(ctx1, {
        type: "doughnut",
        data: {
            labels: ["Surat Masuk", "Surat Keluar"],
            datasets: [{
                label: 'Total',
                data: [
                    <?php
                    $query = "SELECT * FROM surat_masuk";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    $jumlah = mysqli_num_rows($result);
                    echo $jumlah ?>,
                    <?php
                    $query = "SELECT * FROM surat_keluar";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    $jumlah = mysqli_num_rows($result);
                    echo $jumlah ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
    });

    var ctx2 = document.getElementById("myChart2");
    var myChart2 = new Chart(ctx2, {
        type: "doughnut",
        data: {
            labels: ["Disposisi", "Belum Disposisi"],
            datasets: [{
                label: 'Total',
                data: [disposisi, belum_disposisi],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',//blue
                    'rgba(54, 162, 235, 0.2)',//blue
                    // 'rgba(255, 99, 132, 0.8)',//red
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    // 'rgba(255,99,132,1)',
                ],
                borderWidth: 1
            }]
        },
    });

    var januari1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 1";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var februari1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 2";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var maret1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 3";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var april1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 4";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var mei1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 5";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var juni1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 6";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var juli1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 7";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var agustus1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 8";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var september1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 9";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var oktober1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 10";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var november1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 11";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var desember1 = <?php
        $query = "SELECT * FROM surat_masuk WHERE MONTH(`tgl_surat_diterima`) = 12";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;

    var januari2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 1";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var februari2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 2";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var maret2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 3";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var april2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 4";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var mei2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 5";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var juni2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 6";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var juli2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 7";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var agustus2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 8";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var september2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 9";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var oktober2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 10";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var november2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 11";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;
    var desember2 = <?php
        $query = "SELECT * FROM surat_keluar WHERE MONTH(`tgl_surat_dikeluarkan`) = 12";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $jumlah = mysqli_num_rows($result);
        echo $jumlah ?>;

    var ctx3 = document.getElementById("myChart3");
    var myChart3 = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Oktober", "November", "Desember"],
            datasets: [
                {
                    label: "Surat Masuk",
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 0.8)',
                    data: [januari1, februari1, maret1, april1, mei1, juni1, juli1, agustus1, september1, oktober1, november1, desember1],
                },
                {
                    label: "Surat Keluar",
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 0.8)',
                    data: [januari2, februari2, maret2, april2, mei2, juni2, juli2, agustus2, september2, oktober2, november2, desember2],
                }]
        },
        options: {
            elements: {
                line: {
                    tension: 0,
                }
            }
        }
    });
</script>