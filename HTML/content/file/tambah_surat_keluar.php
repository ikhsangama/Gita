<div class="wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="halaman.php?s=lihat_surat_keluar_admin">Surat Keluar</a></li>
        <li class="breadcrumb-item active">Tambah Surat Keluar</li>
      </ol>

      <div class="card mb-3">
          <div class="card-header">
              Tambah Surat Keluar
          </div>
          <div class="card-body">
              <div class="panel panel-default">
                 <div class="panel-body">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                            <form action="content/server/add_surat_keluar_admin.php" method="POST" enctype="multipart/form-data">
                                <div class="widget_header">
                                    <h5>Form Tambah Surat Keluar</h5>
                                </div>
                                <?php
                                    if(ISSET($_SESSION['msg'])){
                                      echo '<div class="alert alert-danger alert-dismissable" style="width:100%; height:10%;" >'.$_SESSION['msg'].'</div>';
                                      unset($_SESSION['msg']);
                                    }
                                ?>

                                <div class="form-group">
                                    <label>No. Hal Surat</label>
                                    <input class="form-control" type="text" pattern="^\S+$" name="no_hal_surat" required />     
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Dikeluarkan</label>
                                    <input class="form-control" type="date" id="tgl_surat" name="tgl_surat_dikeluarkan" required onchange="checkDate()" max="<?php echo date("Y-m-d") ?>"/>       
                                </div>
                                <div class="form-group">
                                    <label>No. Surat Keluar</label>
                                    <input class="form-control" type="text" pattern="^\S+$" name="no_surat_keluar" required />       
                                </div>
                                <div class="form-group">
                                    <label>Perihal</label>
                                    <input class="form-control" type="text" name="perihal" required />      
                                </div>
                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input class="form-control" type="text" name="tujuan" required />       
                                </div>
                                
                                <div class="form-group">
                                    <div>
                                        <label for="name"><br />Upload gambar</label><br/>
                                        <span class="text-muted">(File maksimal 2MB dengan ekstensi jpg, jpeg, png atau gif)</span><br/>
                                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                                    </div>
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
      </div>
    </div>
</div>