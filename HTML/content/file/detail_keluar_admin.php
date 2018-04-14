<div class="wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Surat Keluar</li>
            <li class="breadcrumb-item active">Detail Surat Keluar</li>
        </ol>

        <div class="card mb-3">
        	<div class="card-header">
        		Detail Surat Keluar</div>
        	
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table" id="dataTables-example">
                    <?php

                        include "content/config/koneksi.php";
      
                        $id = $_GET['id'];

                        $query = "SELECT * FROM surat_keluar WHERE id_surat_keluar= '$id' ORDER BY tgl_surat_dikeluarkan DESC, no_surat_keluar ASC";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result)){      
                                        echo "<tr>";
                                            echo "<td>Dikeluarkan tanggal</td>";
                                            echo "<td>:</td>";
                                            $tgl= new DateTime($row['tgl_surat_dikeluarkan']);
                                            echo "<td>"; echo date_format($tgl, "d/m/Y");echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>Nomor surat</td>";
                                            echo "<td>:</td>";
                                            echo "<td>".htmlspecialchars($row['no_surat_keluar'])."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>Nomor agenda</td>";
                                            echo "<td>:</td>";
                                            echo "<td>".htmlspecialchars($row['no_hal_surat'])."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>Perihal</td>";
                                            echo "<td>:</td>";
                                            echo "<td>".htmlspecialchars($row['perihal'])."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>Tujuan</td>";
                                            echo "<td>:</td>";
                                            echo "<td>".htmlspecialchars($row['tujuan'])."</td>";
                                        echo "</tr>";              
                        }
                    ?>


                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            &nbsp;&nbsp; 
                            <a href="halaman.php?s=lihat_surat_keluar_admin" class="btn btn-sm btn-primary square-btn-adjust">Kembali</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>



	</div>
</div>