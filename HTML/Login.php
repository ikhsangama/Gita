<?php
    session_start();
    if (isset($_SESSION['jabatan']))
    {
      header('location:halaman.php?s=home');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistem Pengarsipan Surat SMA N 1 Tegal</title>
	<!-- Bootstrap core CSS-->
  	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<!-- Custom fonts for this template-->
  	<link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  	<!-- Page level plugin CSS-->
  	<link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  	<!-- Custom styles for this template-->
  	<link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body class="bg-light" style="font-family: sans-serif;">
	<div class="container">
		
			<div class="row text-center">
        <div class="col-md-12" style="color: grey;">
                <br /><br /><br /><br />
                <h4>Selamat Datang di</h4>
                <h2>Sistem Pengarsipan Surat</h2>
                <h3>SMA Negeri 1 Tegal</h3>
        </div>
      </div>

        <div class="card card-login mx-auto mt-5">
          <div class="card-body">
            
              
                <form action="content/server/login.php" method="post">
                  <?php
                        if(ISSET($_SESSION['success'])){
                          echo '<div class="alert alert-success alert-dismissable" style="width:100%; height:10%;" >'.$_SESSION['success'].'</div>';
                          unset($_SESSION['success']);
                        }else if(ISSET($_SESSION['error'])){
                          echo '<div class="alert alert-danger alert-dismissable" style="width:100%; height:10%;" >'.$_SESSION['error'].'</div>';
                          unset($_SESSION['error']);
                        }
                    ?>

                    <div class="form-group ">
                      <span class="input-group-addon"><i class="fa fa-tag"> Username</i></span>
                        <input class="form-control" placeholder="Masukkan username" name="username" type="text" autofocus>
                    </div>
                    <div class="form-group">
                      <span class="input-group-addon"><i class="fa fa-lock"> Password</i></span>
                      <input class="form-control" placeholder="Masukkan password" name="password" type="password" value="">
                    </div>

                    <input name="submit" type="submit" class="btn btn-primary btn-block" value="Login">

                </form>    
          </div>
        </div>
	</div>

	<!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>