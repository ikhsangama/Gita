<?php
	session_start(); 

	include "../config/koneksi.php";
	$id = $_POST['id'];
	if(isset($_POST['save'])){
	$tgl_disposisi = $_POST['tgl_disposisi'];
	$pesan = $_POST['pesan'];
	$diteruskan_ke = $_POST['diteruskan_ke'];
	$status_surat = $_POST['status_surat'];
	
	$query = "UPDATE surat_masuk SET tgl_disposisi ='$tgl_disposisi', status_surat='$status_surat', diteruskan_ke='$diteruskan_ke', pesan='$pesan' WHERE id_surat_masuk='$id'";
	$result = mysqli_query($con, $query);

	if($result){
			//$_SESSION['success'] = "Data Berhasil Ditambah";
			//<a href="lihat_surat_keluar.php?" title="General Info">
			echo "<meta http-equiv=\"refresh\" content=\"0; 
			url=../../halaman.php?s=lihat_surat_masuk_kepsek\">";
			echo mysqli_error($con);
		}else{
			//$_SESSION['error'] = "Proses Gagal, Terjadi Kesalahan : ".mysql_error();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=lihat_surat_masuk_kepsek\">";
			echo mysqli_error($con);
		}


	}
?>