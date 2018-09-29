<?php   
	include "content/config/koneksi.php";
	$id = $_SESSION['id_user'];
	$query = "SELECT * FROM user WHERE id_user = $id";
	$result = mysqli_query($con, $query);
	$user = mysqli_fetch_array($result);	
?>

<div class="wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Kelola Akun</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Password</li>
        </ol>

		<div class="card mb-3">
			<div class="card-header">
				Ubah Password
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<form action="<?php echo "halaman.php?s=ubah_password&id=$id "?>" method="POST" enctype="multipart/form-data">
							<div class="widget_header">
                                <h5>Form Ubah Password</h5>
                            </div>
                            
                            <?php
						        if(ISSET($_SESSION['success'])){
						            echo '<div class="alert alert-success alert-dismissable" style="width:100%; height:10%;" >'.$_SESSION['success'].'</div>';
						            unset($_SESSION['success']);
						        }else if(ISSET($_SESSION['error'])){
			                    	echo '<div class="alert alert-danger alert-dismissable" style="width:100%; height:10%;" >'.$_SESSION['error'].'</div>';
			                        unset($_SESSION['error']);
			                    }
						    ?>

                            <div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" pattern="^\S+$" name="username" required value="<?php echo $user['username'];?>" readonly />
									
							</div>
								
							<div class="form-group">
								<label>Password Lama</label>
								<input class="form-control" type="password" name="password" required placeholder="Masukkan Password Lama"/>
							</div>

							<div class="form-group">
								<label>Password Baru</label>
								<input class="form-control" type="password" name="passwordbaru" required placeholder="Masukkan Password Baru"/>
							</div>

							<div class="form-group">
								<label>Konfirmasi Password Baru</label>
								<input class="form-control" type="password" name="konfirmasipassword" required placeholder="Konfirmasi Password Baru"/>
							</div>
								
							<div class="form-group">
								
								<button type="submit" value="save" name="save" class="btn btn-primary" /> Simpan </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>