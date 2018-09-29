<div class="wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
            <a href="halaman.php?s=lihat_surat_masuk_kepsek">Surat Masuk</a></li>
            <li class="breadcrumb-item active">Tambah Disposisi</li>
        </ol>

        <div class="card mb-3">
        	<div class="card-header">
        		Tambah Disposisi Surat Masuk</div>
        	
        	<div class="card-body">
        		<div class="row">
        			<div class="col-md-6">
        				<form action="<?php echo "./content/server/disposisi_kepsek.php" ?>" method="POST" enctype="multipart/form-data">
		        			<h5>Form Tambah Disposisi</h5>

		        			<?php
								$id = $_GET['id'];
							?>

							<div class="form-group">
							<label>Ubah Status</label>
								<select class="form-control" name="status_surat" required>
									<option value='' >Pilih Status Surat</option>
									<option value="Sudah Disposisi" /> Sudah Disposisi </option>
								</select>			
							</div>

							<div class="form-group">
							<label>Tanggal Disposisi</label>
								<input class="form-control" type="date" id="tgl_disposisi" name="tgl_disposisi" required onchange="checkDate()" max="<?php echo date("Y-m-d") ?>"/>
							</div>

							<div class="form-group">
							<label>Diteruskan Ke</label>
								<br/>
								<textarea class="form-control" name="diteruskan_ke" id="diteruskan_ke" required="required" required value="<?php echo htmlspecialchars($surat['diteruskan_ke']);?>"> </textarea>
							</div>

							
										
							<div class="form-group">
							<label>Keterangan Disposisi</label>
								<br/>
								<textarea class="form-control" name="pesan" id="pesan" required="required"> </textarea>
							</div>

							<div>
								<input type="hidden" name="id" id="id" value=<?php echo $id;?>>
							</div>

							<div class="form-group">
								<a href="halaman.php?s=lihat_surat_masuk_kepsek" class="btn btn-sm btn-primary square-btn-adjust">Kembali</a>&nbsp;
								<input type="submit" value="Simpan" name="save" class="btn btn-sm btn-primary" />
							</div>

	        			</form>	
        			</div>
        		</div>
        	</div>
        </div>


	</div>
</div>