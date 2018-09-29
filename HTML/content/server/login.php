<?php  
	session_start();
	if (isset($_SESSION['jabatan'])) {
		// sudah login
	}
	include "../config/koneksi.php";

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		// query untuk mendapatkan record dari username
    	$query = "SELECT * FROM user WHERE username = '$username'";
	    $result = mysqli_query($con, $query);
	    $jumlah = mysqli_num_rows($result);
	    $cek = mysqli_fetch_assoc($result);
	    
    	// cek kesesuaian password
	    if ($password == ($cek['password'])) {
	    
	        // menyimpan email dan ke dalam session
	        $_SESSION['jabatan'] = $cek['jabatan'];
	        $_SESSION['nama_jabatan'] = $cek['nama_jabatan'];
	        $_SESSION['nama'] = $cek['nama'];
	        $_SESSION['username'] = $cek['username'];
	        $_SESSION['password'] = $cek['password'];
	        $_SESSION['id_user'] = $cek['id_user'];
	        echo"<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=home\">";
	    }
	    
	    else{
	       	$_SESSION['error']="Terjadi kesalahan di username atau password";
	      	echo"<meta http-equiv=\"refresh\" content=\"0; url=../../Login.php\">";
	       	echo mysqli_error($con);
	    }	
?>

<?php
    if (isset($_SESSION['jabatan']) && ($_SESSION['jabatan']==0 || $_SESSION['jabatan']==1)) {
        if (ISSET($_GET['s'])) {
        	if ($_GET['s'] == 'home') {
          	include "content/file/home.php";
        	}
      	}
    }
?>