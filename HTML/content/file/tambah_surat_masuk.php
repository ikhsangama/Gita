<div class="wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">
            <a href="halaman.php?s=lihat_surat_masuk_admin">Surat Masuk</a></li>
        <li class="breadcrumb-item active">Tambah Surat Masuk</li>
      </ol>

      <div class="card mb-3">
          <div class="card-header">
              Tambah Surat Masuk
          </div>
          <div class="card-body">
              <div class="panel panel-default">
                 <div class="panel-body">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                            <form action="content/server/add_surat_masuk_admin.php" method="POST" enctype="multipart/form-data">
                                <div class="widget_header">
                                    <h5>Form Tambah Surat Masuk</h5>
                                </div>

                                <div class="form-group">
                                    <label>No. Hal Surat</label>
                                    <input class="form-control" type="text" pattern="^\S+$" name="no_hal_surat" required />
                                </div>
                                <!-- <div class="form-group">
                                    <label>No. Urut Surat</label>
                                    <input class="form-control" type="text" pattern="^\S+$" name="no_urut_surat" required />
                                </div> -->
                                <div class="form-group">
                                    <label>Tanggal di Surat</label>
                                    <input class="form-control" type="date" id="tgl_surat" name="tgl_disurat" required onchange="checkDate()" max="<?php echo date("Y-m-d") ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Asal Surat</label>
                                    <input class="form-control" type="text" name="asal_surat" required />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Diterima</label>
                                    <input class="form-control" type="date" id="tgl_surat" name="tgl_surat_diterima" required onchange="checkDate()" max="<?php echo date("Y-m-d") ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>No. Surat Masuk</label>
                                    <input class="form-control" type="text" pattern="^\S+$" name="no_surat_masuk" required />
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
                                <label>Status Surat</label>
                                    <select class="form-control" name="status_surat" required>
                                        <option value='' >Pilih Status Surat</option>
                                        <option value="Belum Disposisi" /> Belum Disposisi </option>
                                    </select>
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
