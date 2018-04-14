<div class="wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Surat Keluar</li>
        </ol>

        <div class="row">
            <div class="col-md-6">
                <div style="margin-top: 4px; margin-bottom: 10px;"> 
                      <a href="halaman.php?s=tambah_surat_keluar" class="btn btn-sm btn-primary square-btn-adjust">Tambah Surat Keluar</a>
                </div>
            </div>

            <div class="col-md-6" style="text-align: right;">
                <div class="sorting">
                    <form target="_blank" action='content/file/cetak_surat_keluar.php'>
                        <!-- <input type="hidden" name="s" value='print_surat_masuk'> -->
                        <div class="sorting_input">
                                    <input name='tanggal_awal' type='date' style="color: grey;"/>
                                    &nbsp;s/d&nbsp;
                                    <input name='tanggal_akhir' type='date' style="color: grey;"/>
                                    <button type='submit' class="btn btn-sm btn-primary square-btn-adjust btn-sorting">
                                    &nbsp;&nbsp;Cetak Rekap Surat&nbsp;</button>
                        </div>
                        <div style="margin-bottom: 10px; color: grey; font-size: 11px;" >
                        (berdasarkan tgl surat keluar)</div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mb-3">
            <div class="card-header">
                Daftar Surat Keluar</div>
            <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Hal</th>
                                    <!-- <th>No. Urut</th> -->
                                    <th>Tanggal Surat Dikeluarkan</th>
                                    <th>No. Surat Keluar</th>
                                    <th>Perihal</th>
                                    <th>Tujuan</th>
                                    <th>File Gambar</th>
                                    <th>Pilihan</th>
                                    <!-- <th>Pilihan</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                            
                                include "content/config/koneksi.php";

                                $query = "SELECT * FROM surat_keluar ORDER BY tgl_surat_dikeluarkan DESC";

                                $result = mysqli_query($con,$query);
                                
                                if (!$result){
                                    die ("Could not query the database: <br />". mysqli_error($con));
                                }

                            
                                $start=0;
                                $i = $start + 1;
                                while ($row = mysqli_fetch_array($result)){
                                    
                                    
                                    echo "<tr >";
                                        echo "<td >$i</td>";
                                        echo "<td >".htmlspecialchars($row['no_hal_surat'])."</td>";
                                        // echo "<td >".htmlspecialchars($row['no_urut_surat'])."</td>";
                                        $tgl1= new DateTime($row['tgl_surat_dikeluarkan']);
                                        echo "<td>"; echo date_format($tgl1, "d/m/Y");echo "</td>";
                                        
                                        echo "<td >".htmlspecialchars($row['no_surat_keluar'])."</td>";
                                        echo "<td >".htmlspecialchars($row['perihal'])."</td>";
                                        echo "<td >".htmlspecialchars($row['tujuan'])."</td>";
                                        // echo "<td >".htmlspecialchars($row['status_surat'])."</td>";
                                        echo "<td >
                                        <a style='margin:0 auto 3px auto; display: block; text-align:center;' target='_blank' href='../html/content/server/$row[hasil_scan]'>
                                        <img src='../html/content/server/$row[hasil_scan]'alt='' height='50; width='50'> </a>
                                        <a style='display: block; text-align:center;' href='../html/content/server/$row[hasil_scan]' download='Surat Keluar' class='label label-success'>Download</a>
                                        </td>";

                                        // echo "<div class='btn-group btn-group-vertical'>";
                                        echo "<td >
                                                <center>
                                                <div class='btn-group btn-group-vertical'>

                                                <a style='border-radius:5px;' href = 'halaman.php?s=detail_keluar_admin&id=$row[id_surat_keluar]' class='btn btn-sm btn-primary '>Detail</a>";
                                        
                                        echo "<a style='margin: 5px 0px; border-radius:5px;' href='halaman.php?s=hapus_surat_keluar&id=$row[id_surat_keluar]' class='btn btn-sm btn-danger ' onClick=\"return confirm('Yakin akan menghapus ?')\">Hapus</a>

                                                </div>
                                                </center>
                                            </td>";
                                        // echo "</div>";
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