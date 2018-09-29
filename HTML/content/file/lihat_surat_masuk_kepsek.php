<div class="wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Surat Masuk</a>
            </li>
        </ol>

        <?php
            if(ISSET($_SESSION['success'])){
                echo '<div class="alert alert-success alert-dismissable" style="width:100%; height:10%;" >'.$_SESSION['success'].'</div>';
                unset($_SESSION['success']);
            }
        ?>

        <div class="card mb-3">
            <div class="card-header">
                Daftar Surat Masuk</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Hal</th>
                                <!-- <th>No. Urut</th> -->
                                <th>Tanggal Surat</th>
                                <th>Asal Surat</th>
                                <th>Tanggal Surat Diterima</th>
                                <th>No. Surat Masuk</th>
                                <th>Perihal</th>
                                <th>Tujuan</th>
                                <th>Status Surat</th>
                                <th>File Gambar</th>
                                <th>Pilihan</th>
                                <!-- <th>Pilihan</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            include "content/config/koneksi.php";

                            $query = "SELECT * FROM surat_masuk ORDER BY tgl_surat_diterima DESC";

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
                                    $tgl1= new DateTime($row['tgl_disurat']);
                                    echo "<td>"; echo date_format($tgl1, "d/m/Y");echo "</td>";

                                    echo "<td >".htmlspecialchars($row['asal_surat'])."</td>";
                                    $tgl2= new DateTime($row['tgl_surat_diterima']);
                                    echo "<td>"; echo date_format($tgl2, "d/m/Y");echo "</td>";
                                    echo "<td >".htmlspecialchars($row['no_surat_masuk'])."</td>";
                                    echo "<td >".htmlspecialchars($row['perihal'])."</td>";
                                    echo "<td >".htmlspecialchars($row['tujuan'])."</td>";
                                    echo "<td >".htmlspecialchars($row['status_surat'])."</td>";
                                    echo "<td >
                                    <a style='margin:0 auto 3px auto; display: block; text-align:center;' target='_blank' href='../html/content/server/$row[hasil_scan]'>
                                    <img src='../html/content/server/$row[hasil_scan]'alt='' height='50; width='50'> </a>
                                    <a style='display: block; text-align:center;' href='../html/content/server/$row[hasil_scan]' download='Surat Masuk' class='label label-success'>Download</a>
                                    </td>";

                                    // echo "<div class='btn-group btn-group-vertical'>";
                                    echo "<td >
                                            <center>
                                            <div style='margin:0 auto 5px auto; text-align:center;' class='btn-group btn-group-vertical'>
                                                <a style='border-radius:5px;' href = 'halaman.php?s=detail_masuk_kepsek&id=$row[id_surat_masuk]' class='btn btn-sm btn-primary '>Detail</a>";
                                                if($row['status_surat'] == 'Sudah Disposisi'){
                                                  echo "<a style='margin: 5px 0px; border-radius:5px;' href = 'halaman.php?s=form_disposisi_masuk_kepsek&id=$row[id_surat_masuk]' class='btn disabled btn-sm btn-success '>Disposisi</a>";
                                                  // "True";
                                                }else{
                                                  echo "<a style='margin: 5px 0px; border-radius:5px;' href = 'halaman.php?s=form_disposisi_masuk_kepsek&id=$row[id_surat_masuk]' class='btn btn-sm btn-success '>Disposisi</a>";
                                                }
                                            echo"</center>
                                            </div>
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
