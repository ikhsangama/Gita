<div class="wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div style="margin-bottom: 18px;"> 
                      <a href="halaman.php?s=tambah_pengguna" class="btn btn-sm btn-primary square-btn-adjust">Tambah Pengguna</a>
                </div>
            </div>
        </div>

        <div class="card mb-3">
        	<div class="card-header">
        		Daftar Pengguna
        	</div>
        	<div class="card-body">
        		<div class="table-responsive">
        			<table class="datatable table table-striped table-bordered" id="dataTables-example" >
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Jabatan</th>
								<th>Proses</th>
							</tr>
						</thead>

						<tbody>
							<?php
							
								include "content/config/koneksi.php";

								// print_r($_SESSION);

								$query = "SELECT * FROM user ORDER BY jabatan ASC ";
								$result = mysqli_query($con,$query);

							
		     					$start=0;
		      					$i = 1;
		      					while ($row = mysqli_fetch_array($result)){

		      						if($row['jabatan']==1){
											$x='Kepala Sekolah';
										}else if ($row['jabatan']==0) {
											$x='Admin';
										}

									echo "<tr >";
										echo "<td >$i</td>";
										echo "<td >$row[nama]</td>";
										echo "<td >$row[username]</td>";
										echo "<td >$x</td>";
										echo "<td >
											
											<a href='halaman.php?s=hapus_pengguna&id=$row[id_user]' onClick=\"return confirm('Yakin akan menghapus ?')\">Hapus</a> |
											<a href='halaman.php?s=reset_password&id=$row[id_user]' onClick=\"return confirm('Yakin akan mereset password ? Jika direset, password Anda = 0000')\">Reset Password</a> 
											
										</td>";
									echo "</tr>";
						
			      					$i++;
		      					}
			
							?>
						</tbody>
					</table>
        		</div>
        	</div>
        </div>


	</div>
</div>