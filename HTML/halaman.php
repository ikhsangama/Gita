<?php
session_start();
if (isset($_SESSION['jabatan'])) {
    echo "";
}

if (!$_SESSION) {
    header('location:login.php');
} else {
    $jabatan = $_SESSION['jabatan'];
}
require_once("content/config/koneksi.php");
$query = "SELECT * FROM user WHERE jabatan = '$jabatan'";
$result = mysqli_query($con, $query);
// $user = $result->fetch_assoc();
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Pengarsipan Surat SMA N 1 Tegal</title>
    <!-- Bootstrap core CSS-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/styles.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>


<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#" style="color: #E6E6FA;">Sistem Pengarsipan Surat</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Sidebar -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <br>
                <br>
                <p class="centered"><span class="nav-link-text"><img src="../Images/tes.png" width="60"></span></p>
                <h5 class="centered" style="font-size: 16px; color: #DCDCDC;"><span
                            class="nav-link-text"><?php echo $user['nama']; ?></span></h5>
                <br>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                <a class="nav-link" href="halaman.php?s=home">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>

            <?php
            if ($_SESSION['jabatan'] == 0) {
                ?>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Masuk">
                    <a class="nav-link" href="halaman.php?s=lihat_surat_masuk_admin">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="nav-link-text">Surat Masuk</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
                    <a class="nav-link" href="halaman.php?s=lihat_surat_keluar_admin">
                        <i class="fa fa-fw fa-envelope-o"></i>
                        <span class="nav-link-text">Surat Keluar</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pengguna">
                    <a class="nav-link" href="halaman.php?s=info_pengguna">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Pengguna</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pengguna">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                       data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Kelola Akun</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="halaman.php?s=ubah_data_pengguna">Ubah Data Pengguna</a>
                        </li>
                        <li>
                            <a href="halaman.php?s=ubah_data_password">Ubah Password</a>
                        </li>
                    </ul>
                </li>

                <?php
            } else if ($_SESSION['jabatan'] == 1) {
                ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Masuk">
                    <a class="nav-link" href="halaman.php?s=lihat_surat_masuk_kepsek">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="nav-link-text">Surat Masuk</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
                    <a class="nav-link" href="halaman.php?s=lihat_surat_keluar_kepsek">
                        <i class="fa fa-fw fa-envelope-o"></i>
                        <span class="nav-link-text">Surat Keluar</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kelola Akun">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                       data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Kelola Akun</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="halaman.php?s=ubah_data_pengguna">Ubah Data Pengguna</a>
                        </li>
                        <li>
                            <a href="halaman.php?s=ubah_data_password">Ubah Password</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>


        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="content/server/logout.php" class="nav-link" data-toggle="modal" data-target="#exampleModal"
                   style="color: #DCDCDC;">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>


<div class="content-wrapper" style="font-size: 13px;">

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © 2018 - Amelia Gita Pertiwi - PKL</small>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan keluar dari sistem?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk keluar dari sistem.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="content/server/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_SESSION['jabatan']) && ($_SESSION['jabatan'] == 0)) {
        if (ISSET($_GET['s'])) {
            if ($_GET['s'] == 'home') {
                include "content/file/home.php";
            } //ADMIN
            else if ($_GET['s'] == 'lihat_surat_masuk_admin') {
                include "content/file/lihat_surat_masuk_admin.php";
            } else if ($_GET['s'] == 'lihat_surat_keluar_admin') {
                include "content/file/lihat_surat_keluar_admin.php";
            } else if ($_GET['s'] == 'hapus_surat_masuk') {
                include "content/server/hapus_surat_masuk.php";
            } else if ($_GET['s'] == 'hapus_surat_keluar') {
                include "content/server/hapus_surat_keluar.php";
            } else if ($_GET['s'] == 'tambah_surat_masuk') {
                include "content/file/tambah_surat_masuk.php";
            } else if ($_GET['s'] == 'tambah_surat_keluar') {
                include "content/file/tambah_surat_keluar.php";
            } else if ($_GET['s'] == 'cetak_surat_masuk') {
                include "content/file/cetak_surat_masuk.php";
            } else if ($_GET['s'] == 'cetak_surat_keluar') {
                include "content/file/cetak_surat_keluar.php";
            } else if ($_GET['s'] == 'info_pengguna') {
                include "content/file/info_pengguna.php";
            } else if ($_GET['s'] == 'tambah_pengguna') {
                include "content/file/tambah_pengguna.php";
            } else if ($_GET['s'] == 'hapus_pengguna') {
                include "content/server/hapus_pengguna.php";
            } else if ($_GET['s'] == 'reset_password') {
                include "content/server/reset_password.php";
            } else if ($_GET['s'] == 'ubah_pengguna') {
                // $idnya = $_GET['id'];
                include "content/server/ubah_pengguna.php";
            } else if ($_GET['s'] == 'ubah_data_pengguna') {
                include "content/file/ubah_data_pengguna.php";
            } else if ($_GET['s'] == 'ubah_password') {
                // $idnya = $_GET['id'];
                include "content/server/ubah_password.php";
            } else if ($_GET['s'] == 'ubah_data_password') {
                include "content/file/ubah_data_password.php";
            } else if ($_GET['s'] == 'detail_masuk_admin') {
                include "content/file/detail_masuk_admin.php";
            } else if ($_GET['s'] == 'detail_keluar_admin') {
                include "content/file/detail_keluar_admin.php";
            } else if ($_GET['s'] == 'cetak_hasil_disposisi') {
                include "content/file/cetak_hasil_disposisi.php";
            }
        } else {
            include "content/file/home.php";
        }

    } else if (isset($_SESSION['jabatan']) && ($_SESSION['jabatan'] == 1)) {
        if (ISSET($_GET['s'])) {
            if ($_GET['s'] == 'home') {
                include "content/file/home.php";
            } //ADMIN
            else if ($_GET['s'] == 'lihat_surat_masuk_kepsek') {
                include "content/file/lihat_surat_masuk_kepsek.php";
            } else if ($_GET['s'] == 'lihat_surat_keluar_kepsek') {
                include "content/file/lihat_surat_keluar_kepsek.php";
            } else if ($_GET['s'] == 'form_disposisi_masuk_kepsek') {
                include "content/file/form_disposisi_masuk_kepsek.php";
            } else if ($_GET['s'] == 'form_disposisi_keluar_kepsek') {
                include "content/file/form_disposisi_keluar_kepsek.php";
            } else if ($_GET['s'] == 'disposisi_kepsek') {
                include "content/server/disposisi_kepsek.php";
            } else if ($_GET['s'] == 'ubah_pengguna') {
                // $idnya = $_GET['id'];
                include "content/server/ubah_pengguna.php";
            } else if ($_GET['s'] == 'ubah_data_pengguna') {
                include "content/file/ubah_data_pengguna.php";
            } else if ($_GET['s'] == 'ubah_password') {
                // $idnya = $_GET['id'];
                include "content/server/ubah_password.php";
            } else if ($_GET['s'] == 'ubah_data_password') {
                include "content/file/ubah_data_password.php";
            } else if ($_GET['s'] == 'detail_masuk_kepsek') {
                include "content/file/detail_masuk_kepsek.php";
            } else if ($_GET['s'] == 'detail_keluar_kepsek') {
                include "content/file/detail_keluar_kepsek.php";
            }
        } else {
            include "content/file/home.php";
        }
    }else


    ?>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../assets/js/sb-admin-datatables.min.js"></script>
    <script src="../assets/js/sb-admin-charts.min.js"></script>
</div>
</body>

</html>
