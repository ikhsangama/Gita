<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">

	<tr>
		<td><h3><center>REKAPITULASI SURAT KELUAR</center></h2></td>
	</tr>
	<tr>
		<td><h2><center>SMA NEGERI 1 TEGAL </center></h2></td>
	</tr>
	<tr>
		<td><h5><center>Jalan Menteri Supeno No.16 Telp: (0283) 353498 Fax: (0823) 323955 Tegal
			<br>Website: www.sman1tegal.sch.id Email: sman1_kotategal@yahoo.com</center></h5></td>
	</tr>
	<br>

	<table border="1" width="700px">
		<thead>
			<tr>
				<th>No</th>
				<th>No Hal</th>
				<th>No. Surat Keluar</th>
				<th>Tanggal Surat</th>
				<th>Tujuan</th>
				<th>Perihal</th>
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
						$query = "SELECT * FROM surat_keluar WHERE tgl_surat_dikeluarkan >= '$tanggal_awal' AND tgl_surat_dikeluarkan <= '$tanggal_akhir' ORDER BY tgl_surat_dikeluarkan DESC";
						$result = mysqli_query($con, $query);
						$start=0;
	      			$i = $start + 1;
	      			while ($row = mysqli_fetch_array($result)){
										echo "<tr >";
											echo "<td >$i</td>";
											echo "<td >$row[no_hal_surat]</td>";
											echo "<td >$row[no_surat_keluar]</td>";
											echo "<td >$row[tgl_surat_dikeluarkan]</td>";
											echo "<td >$row[tujuan]</td>";
											echo "<td >$row[perihal]</td>";
										echo "</tr>";
							
				      					$i++;
	      			}
					} else {
							echo '<script>alert("Inputan tanggal salah")</script>';
							echo '<meta http-equiv=\"refresh\" content=\"0; url=../../halaman.php?s=lihat_surat_keluar_admin\">';
					}
				}else{
					$query = "SELECT * FROM surat_keluar ORDER BY tgl_surat_dikeluarkan DESC";
					$result = mysqli_query($con, $query);
					$start=0;
	      			$i = $start + 1;
	      			while ($row = mysqli_fetch_array($result)){
										echo "<tr >";
											echo "<td >$i</td>";
											echo "<td >$row[no_hal_surat]</td>";
											echo "<td >$row[no_surat_keluar]</td>";
											echo "<td >$row[tgl_surat_dikeluarkan]</td>";
											echo "<td >$row[tujuan]</td>";
											echo "<td >$row[perihal]</td>";
										echo "</tr>";
							
				      					$i++;
	      			}
				}
			?>
		</tbody>
	</table>

			
</body>
</html>