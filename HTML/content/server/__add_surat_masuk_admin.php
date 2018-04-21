<?php
session_start();
include "../config/koneksi.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if ($uploadOk == 1) {
    if (ISSET($_POST['save'])) {
        $no_hal_surat = $_POST['no_hal_surat'];
        // $no_urut_surat= $_POST['no_urut_surat'];
        $tgl_disurat = $_POST['tgl_disurat'];
        $asal_surat = $_POST['asal_surat'];
        $tgl_surat_diterima = $_POST['tgl_surat_diterima'];
        $no_surat_masuk = $_POST['no_surat_masuk'];
        $perihal = $_POST['perihal'];
        $tujuan = $_POST['tujuan'];
        $status_surat = $_POST['status_surat'];

        $query = "SELECT * FROM surat_masuk WHERE no_surat_masuk = '$no_surat_masuk'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        if (empty($row)) {

            $sql = "INSERT INTO surat_masuk (no_hal_surat, tgl_disurat, asal_surat, tgl_surat_diterima, no_surat_masuk, perihal, tujuan, status_surat, hasil_scan)
									VALUES
									('$no_hal_surat', '$tgl_disurat', '$asal_surat', '$tgl_surat_diterima', '$no_surat_masuk', '$perihal', '$tujuan', '$status_surat', '$target_file')";

            $result_simpan = mysqli_query($con, $sql);

            if ($sql) {
                //echo "berhasil";
                //$_SESSION['success'] = "Data Berhasil Ditambah";
                echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=lihat_surat_masuk_admin\">";
                echo mysqli_error($con);
            } else {
                //$_SESSION['error'] = "Proses Gagal, Terjadi Kesalahan : ".mysql_error();
                echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=lihat_surat_masuk_admin\">";
                echo mysqli_error($con);
            }
        } else {
            echo "<script>alert('Tidak dapat menambahkan, karena nomor surat sudah ada.')</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=tambah_surat_keluar\">";
        }
    }
}
?>
