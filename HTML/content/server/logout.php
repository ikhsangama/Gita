<?php
	session_start();
	unset($_SESSION['jabatan']);
	header ('location: ../../../index.php');
	exit();
?>
