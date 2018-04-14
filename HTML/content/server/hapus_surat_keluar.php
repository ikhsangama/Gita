<?php
	include "content/config/koneksi.php";
	
	$get_hapus = $_GET['id'];
	$query = "DELETE FROM surat_keluar WHERE id_surat_keluar= '$get_hapus'";
	$result = mysqli_query($con, $query);
	
	echo "<meta http-equiv=\"refresh\" content=\"0; url=halaman.php?s=lihat_surat_keluar_admin\">";
?>