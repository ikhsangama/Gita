<?php
	// session_start();
	// include_once 'koneksi.php';
	include "content/config/koneksi.php";
	// echo "masuk";
	// $id = $_GET['id'];
	$id = $_SESSION['id_user'];
	if(ISSET($_POST['save'])){
		$passwordlama = md5($_POST['password']);
		$passwordbaru = md5($_POST['passwordbaru']);
		$konfirmasipassword = md5($_POST['konfirmasipassword']);
		$username = $_SESSION['id_user'];

		$query = "SELECT password FROM user WHERE id_user = '$username'";
		$result = mysqli_query($con, $query);
		$cek = mysqli_fetch_assoc($result);

		if (($passwordlama == $cek['password']) && ($passwordbaru == $konfirmasipassword)) {
				$query2 = "UPDATE user SET password ='$passwordbaru' WHERE id_user = '$id'";
				$result2 = mysqli_query($con, $query2);

				if($query2){
					echo "<script>alert('Password berhasil diganti')</script>";
					echo "<meta http-equiv=\"refresh\" content=\"0; url=halaman.php?s=ubah_data_password\">";
				}else{
					echo "<script>alert('Proses gagal, terjadi kesalahan !') </script>";
					echo "<meta http-equiv=\"refresh\" content=\"2; url=halaman.php?s=ubah_data_password\">";
					echo mysqli_error($con);
				}
		}else{
			echo "<script>alert('Inputan Password tidak sesuai')</script>";
			echo "<meta http-equiv=\"refresh\" content=\"2; url=halaman.php?s=ubah_data_password\">";
			echo mysqli_error($con);
		}		
	}else{
		echo "<script>alert('Proses ganti password gagal')</script>";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=halaman.php?s=ubah_data_password\">";
		echo mysqli_error($con);
	}
?>