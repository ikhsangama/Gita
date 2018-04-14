<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">

	<tr>
		<td><h3><center>LEMBAR DISPOSISI</center></h2></td>
	</tr>
	<tr>
		<td><h2><center>SMA NEGERI 1 TEGAL </center></h2></td>
	</tr>
	<tr>
		<td><h5><center>Jalan Menteri Supeno No.16 Telp: (0283) 353498 Fax: (0823) 323955 Tegal
			<br>Website: www.sman1tegal.sch.id Email: sman1_kotategal@yahoo.com</center></h5></td>
	</tr>
	<br>

	<table class="datatable table" id="dataTables-example">
                    <?php
                        include "../config/koneksi.php";
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





	<table border="2">
		<thead>
			<tr>
				<th>No</th>
				<th>No. Surat Masuk</th>
				<th>Tanggal Terima Surat</th>
				<th>Asal Surat</th>
				<th>Tujuan</th>
				<th>Perihal</th>
				<th>Tanggal Surat</th>
				<th>Status Surat</th>
			</tr>
		</thead>

		<tbody text align="center">
			<?php

				include "../config/koneksi.php";

				if( !empty($_GET['tanggal_awal']) && !empty($_GET['tanggal_akhir']) ){
					$tanggal_awal  = mysqli_real_escape_string($con, $_GET['tanggal_awal']);
					$tanggal_akhir = mysqli_real_escape_string($con, $_GET['tanggal_akhir']);
					$selisih = ((strtotime ($tanggal_akhir) - strtotime ($tanggal_awal)));
					//echo $selisih;
					if ($selisih >= 0) {
						$query = "SELECT * FROM surat_masuk WHERE tgl_surat_diterima >= '$tanggal_awal' AND tgl_surat_diterima <= '$tanggal_akhir' ORDER BY tgl_surat_diterima DESC";
						$result = mysqli_query($con, $query);
						$start=0;
	      			$i = $start + 1;
	      			while ($row = mysqli_fetch_array($result)){
										echo "<tr >";
											echo "<td >$i</td>";
											echo "<td >$row[no_surat_masuk]</td>";
											echo "<td >$row[tgl_surat_diterima]</td>";
											echo "<td >$row[asal_surat]</td>";
											echo "<td >$row[tujuan]</td>";
											echo "<td >$row[perihal]</td>";
											echo "<td >$row[tgl_disurat]</td>";
											echo "<td >$row[status_surat]</td>";
										echo "</tr>";

				      					$i++;
	      			}
					} else {
							echo '<script>alert("Inputan tanggal salah")</script>';
							echo '<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=lihat_surat_masuk_admin\">';
					}
				}else{
					$query = "SELECT * FROM surat_masuk ORDER BY tgl_surat_diterima DESC";
					$result = mysqli_query($con, $query);
					$start=0;
	      			$i = $start + 1;
	      			while ($row = mysqli_fetch_array($result)){
										echo "<tr >";
											echo "<td >$i</td>";
											echo "<td >$row[no_surat_masuk]</td>";
											echo "<td >$row[tgl_surat_diterima]</td>";
											echo "<td >$row[asal_surat]</td>";
											echo "<td >$row[tujuan]</td>";
											echo "<td >$row[perihal]</td>";
											echo "<td >$row[tgl_disurat]</td>";
											echo "<td >$row[status_surat]</td>";
										echo "</tr>";

				      					$i++;
	      			}
				}
			?>
		</tbody>
	</table>


</body>
</html>
