<div class="wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="halaman.php?s=lihat_surat_masuk_kepsek">Surat Masuk</a></li>
            <li class="breadcrumb-item active">Detail Surat Masuk</li>
        </ol>

        <div class="card mb-3">
        	<div class="card-header">
        		Detail Surat Masuk</div>
        	
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table" id="dataTables-example">
                    <?php

                        include "content/config/koneksi.php";
      
                        $id = $_GET['id'];

                        $query = "SELECT * FROM surat_masuk WHERE id_surat_masuk= '$id' ORDER BY tgl_surat_diterima DESC, no_surat_masuk ASC";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result)){      
                                    echo "<tr>";
                                        echo "<td>Surat dari</td>";
                                        echo "<td>:</td>";
                                        echo "<td>".htmlspecialchars($row['asal_surat'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Diterima tanggal</td>";
                                        echo "<td>:</td>";
                                        $tgl= new DateTime($row['tgl_surat_diterima']);
                                        echo "<td>"; echo date_format($tgl, "d/m/Y");echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Nomor surat</td>";
                                        echo "<td>:</td>";
                                        echo "<td>".htmlspecialchars($row['no_surat_masuk'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Nomor agenda</td>";
                                        echo "<td>:</td>";
                                        echo "<td>".htmlspecialchars($row['no_hal_surat'])."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Tanggal Surat</td>";
                                        echo "<td>:</td>";
                                        $tgl1= new DateTime($row['tgl_disurat']);
                                        echo "<td>"; echo date_format($tgl1, "d/m/Y");echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Diteruskan kepada</td>";
                                        echo "<td>:</td>";
                                        echo "<td>".htmlspecialchars($row['diteruskan_ke'])."</td>";
                                    echo "</tr>";
                                    echo "<tr >";
                                        echo "<td>Tanggal Disposisi</td>";
                                        echo "<td>:</td>";
                                        if ($row['tgl_disposisi']=="0000-00-00"){
                                    echo "<td></td> ";
                        }else{
                                    $tgl2= new DateTime($row['tgl_disposisi']);
                                    echo "<td>"; echo date_format($tgl2, "d/m/Y");echo "</td>";
                        }
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Isi disposisi</td>";
                                        echo "<td>:</td>";
                                        echo "<td >".htmlspecialchars($row['pesan'])."</td>";
                                    echo "</tr>"; 
                    }

                    ?>


                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div> 
                              &nbsp;&nbsp;
                              <a href="halaman.php?s=lihat_surat_masuk_kepsek" class="btn btn-sm btn-primary square-btn-adjust">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



	</div>
</div>