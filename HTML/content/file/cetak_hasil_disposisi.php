<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">

    <div>
        <div><img src="../../../Images/logo.jpg" style="float: left;" height="130" width="130"/>
            <br>
            <font size="4"><center>PEMERINTAH PROVINSI JAWA TENGAH<br>DINAS PENDIDIKAN DAN KEBUDAYAAN</center></font>
            <font size="5"><center><b>SMA NEGERI 1 TEGAL</b></font></center>
            <font size="3"><center>Jalan Menteri Supeno No.16 Telp: (0283) 353498 Fax: (0823) 323955 Tegal
            <br>Website: www.sman1tegal.sch.id Email: sman1_kotategal@yahoo.com</center></font>
        </div>
        <hr size="3px">
    </div>

    <h2><center><u>LEMBAR DISPOSISI</u></center></h2>

	<table class="datatable table" id="dataTables-example" cellspacing=30>
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

    <div class="row">
        <div class="col-md-4">
            <p>Paraf Kepala SMA N 1 Tegal</p> 
        </div>
        <div class="col-md-4">
            <p>Paraf Petugas</p>
        </div>
    </div> 

</body>
</html>
