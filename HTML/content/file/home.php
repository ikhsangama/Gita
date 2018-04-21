<div class="wrapper">
    <div class="container-fluid">
        <div class="breadcrumb">
            <h5 class="nanoo" style="margin: 0 ">Selamat Datang, <?php echo $_SESSION['nama_jabatan']; ?>.</h5>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4 container" >
                <h6><center>Rekapitulasi Surat</center></h6>
                <canvas id="myChart1" style="width: 512px; height: 256px"></canvas>
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
            <div class="col-md-4 container">
                <h6><center>Surat Masuk</center></h6>
                <canvas id="myChart2" style="width: 512px; height: 256px"></canvas>
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
        </div>

        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        PEJABAT SEKOLAH</div>
                    <div class="card-body">
                        <b>Kepala Sekolah  :</b> Masduki, S.Pd, M.Pd<br>
                        <b>Waka Kurikulum  :</b> Imam Sujai, M.Kom<br>
                        <b>Waka Sarana & Prasarana :</b> Zulyany, S.Pd<br>
                        <b>Waka Kesiswaan  :</b> Rodiyanto, S.Pd<br>
                        <b>Waka Humas :</b> Drs. Bereston Sirait<br>
                        <b>Ketua Komite Sekolah :</b> Dr. Heri Susanto, Sp.A<br>
                        <b>Koordinator Tata Usaha :</b> Pono Suharto, S.Pd<br>
                        <b>Koordinator Bimbingan Konseling :</b> Subagio, S.Pd<br>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        INFORMASI SEKOLAH</div>
                    <div class="card-body">
                        <b>Nama Instansi :</b> SMA Negeri 1 Kota Tegal <br>
                        <b>Alamat        :</b> Jl. Menteri Supeno 16, Tegal, Jawa Tengah 52125 <br>
                        <b>Telepon/Fax   :</b> (0283) 353498 <br>
                        <b>E-mail        :</b> sman1_kotategal@yahoo.com <br>
                        <b>Website       :</b> www.sman1tegal.sch.id <br>
                    </div>
                </div>
            </div>        
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
</script>