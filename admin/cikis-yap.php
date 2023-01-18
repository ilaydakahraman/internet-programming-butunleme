<?php 
	session_start();
	session_destroy();
	header("Location:giris.php?durum=cikis");
	exit;
 ?>