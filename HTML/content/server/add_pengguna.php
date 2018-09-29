<?php 
	session_start();
	include "../config/koneksi.php";
	if(ISSET($_POST['save'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$konfirmasipass = md5($_POST['konfirmasipass']);
		$jabatan = $_POST['jabatan'];

		$query = "SELECT * FROM user WHERE jabatan= '$jabatan'";
		$result = mysqli_query($con,$query);
		$cek = mysqli_fetch_assoc($result);

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

			if (empty($cek2)){
				if($password==$konfirmasipass){
					
					$query3 = "INSERT INTO user
					(nama, username, password, jabatan, nama_jabatan) 
					VALUES 
					('$nama','$username','$password', '$jabatan', '$nama_jabatan')";
					$result3 = mysqli_query($con,$query3);

					if($result3){
						$_SESSION['success'] = "Pengguna berhasil ditambah";
						echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=info_pengguna\">";
						echo mysqli_error($con);
					}else{
						$_SESSION['error'] = "Proses gagal, terjadi kesalahan : ".mysqli_error($con);
						echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=info_pengguna\">";
						echo mysqli_error($con);
					}
				}
				else{
					$_SESSION['error'] = "Password tidak sesuai dengan konfirmasi password";
					echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=tambah_pengguna\">";
				}
			} else {
					$_SESSION['error'] = "Username sudah ada";
					echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=tambah_pengguna\">";
			}
		} else {
			$_SESSION['error'] = "Tidak dapat menambahkan karena jabatan sudah ada";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=tambah_pengguna\">";
		}
	}
?>