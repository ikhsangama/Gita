<?php
	include "content/config/koneksi.php";
	
	$get_reset = $_GET['id'];
	$x = '0000';
	$y = md5($x);
	$query = "UPDATE user SET password ='$y' WHERE id_user= '$get_reset'";
	$result = mysqli_query($con,$query);

	echo "<meta http-equiv=\"refresh\" content=\"0; url=halaman.php?s=info_pengguna\">";
?>