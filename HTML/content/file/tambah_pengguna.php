<div class="wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
	    <ol class="breadcrumb">
	    	<li class="breadcrumb-item">
	        	<a href="#">Dashboard</a>
	        </li>
	        <li class="breadcrumb-item active">Pengguna</li>
	        <li class="breadcrumb-item active">Tambah Pengguna</li>
	    </ol>

	    <div class="card mb-3">
	    	<div class="card-header">
	    		Tambah Pengguna
	    	</div>
	    	<div class="card-body">
	    		<div class="row">
	    			<div class="col-md-6">
	    				<form action="content/server/add_pengguna.php" method="POST" enctype="multipart/form-data">
	    					<div class="widget_header">
                                <h5>Form Tambah Pengguna</h5>
                            </div>

                            <div class="form-group">
								<label>Nama</label>
								<input class="form-control" type="text" name="nama" required>
							</div>

							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" required />
							</div>
									
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="password" required />
							</div>

							<div class="form-group">
								<label>Konfirmasi Password</label>
								<input class="form-control" type="password" name="konfirmasipass" required />
							</div>
									
							<div class="form-group">
								<label>Jabatan</label>
								<select class="form-control" name="jabatan" required="">
									<option value=''>Pilih Salah Satu</option>
									<option value="0">Admin</option>
									<option value="1">Kepala Sekolah</option>
								</select>
							</div>

							<div class="form-group">
								<button type="submit" value="Simpan" name="save" class="btn btn-primary" > Simpan </button>
							</div>
	    				</form>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>