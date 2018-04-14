<?php
	include "content/config/koneksi.php";
	
	$get_hapus = $_GET['id'];
	$query = "DELETE FROM user WHERE id_user= '$get_hapus'";
	$result = mysqli_query($con,$query);
	
	echo "<meta http-equiv=\"refresh\" content=\"0; url=halaman.php?s=info_pengguna\">";
?>