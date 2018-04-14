<?php 
	session_start();
	include "../config/koneksi.php";
	if(ISSET($_POST['save'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$konfirmasipass = md5($_POST['konfirmasipass']);
		$jabatan = $_POST['jabatan']; //print_r($jabatan); die;
		//$nama_jabatan = $_POST['nama_jabatan'];

		$query = "SELECT * FROM user WHERE jabatan= '$jabatan'";
		$result = mysqli_query($con,$query);
		$cek = mysqli_fetch_assoc($result);
		// $cek = mysql_query("SELECT * FROM user WHERE jabatan= '$jabatan' ");
		// $cek2 = mysql_fetch_assoc($cek); 
		if (empty($cek)) {

			switch ($jabatan) {
				case 0:
					$nama_jabatan = "Admin";
					break;
				case 1:
					$nama_jabatan = "Kepala Sekolah";
					break;
			}
			
			$query2 = "SELECT * FROM user WHERE username= '$username'";
			$result2 = mysqli_query($con,$query2);
			$cek2 = mysqli_fetch_assoc($result2);
			// $cek3 = mysql_query("SELECT * FROM user WHERE username= '$username' ");
			// $cek4 = mysql_fetch_assoc($cek3); 
			// print_r($jabatan); print_r($nama_jabatan);die;
			if (empty($cek2)){
						if($password==$konfirmasipass){
							
							$query3 = "INSERT INTO user
							(nama, username, password, jabatan, nama_jabatan) 
							VALUES 
							('$nama','$username','$password', '$jabatan', '$nama_jabatan')";
							$result3 = mysqli_query($con,$query3);
							// $sql = mysql_query("INSERT INTO user
							// (nama, username, password, jabatan, nama_jabatan) 
							// VALUES 
							// ('$nama','$username','$password', '$jabatan', '$nama_jabatan')" );
							if($result3){
								//echo "berhasil";
								//$_SESSION['success'] = "Data Berhasil Ditambah";
								echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=info_pengguna\">";
								echo mysqli_error($con);
							}else{
								$_SESSION['error'] = "Proses Gagal, Terjadi Kesalahan : ".mysqli_error($con);
								echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=info_pengguna\">";
								echo mysqli_error($con);
							}
						}
						else{
							echo '<script>alert("Password does not match the confirm password.")</script>';
							echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=info_pengguna\">";
						}
			} else {
							echo '<script>alert("Username is exist.")</script>';
							echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=info_pengguna\">";
			}
		} else {
			echo "<script>alert('Tidak dapat menambahkan, karena jabatan sudah ada.')</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=info_pengguna\">";
		}
}

?>