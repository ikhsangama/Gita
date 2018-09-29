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
				if ($passwordbaru != $passwordlama) {
					$result2 = mysqli_query($con, $query2);
					if($query2){
						$_SESSION['success'] = "Password berhasil diganti";
						echo "<meta http-equiv=\"refresh\" content=\"0; url=halaman.php?s=ubah_data_password\">";
					}else{
						$_SESSION['error'] = "Proses ganti password gagal";
						echo "<meta http-equiv=\"refresh\" content=\"2; url=halaman.php?s=ubah_data_password\">";
						echo mysqli_error($con);
					}
				}else{
					$_SESSION['error'] = "Password baru tidak boleh sama dengan password lama";
						echo "<meta http-equiv=\"refresh\" content=\"2; url=halaman.php?s=ubah_data_password\">";
						echo mysqli_error($con);
				}

		}else{
			$_SESSION['error'] = "Inputan password tidak sesuai.";
			echo "<meta http-equiv=\"refresh\" content=\"2; url=halaman.php?s=ubah_data_password\">";
			echo mysqli_error($con);
		}		
	}else{
		$_SESSION['error'] = "Proses ganti password gagal.";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=halaman.php?s=ubah_data_password\">";
		echo mysqli_error($con);
	}
?>