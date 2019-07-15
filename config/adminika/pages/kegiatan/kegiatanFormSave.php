<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
	ini_set("display_errors","Off");
	$idKegiatan		= $_REQUEST['idKegiatan'];
	$del			= $_REQUEST['del'];
	
	$judul			= $_POST['judul'];
	$isi			= $_POST['isi'];
	
	if($del=='1'){
		mysql_query("DELETE FROM kegiatan WHERE idKegiatan	= '$idKegiatan'");
	}else{
		if($idKegiatan == '0'){
		
			mysql_query("INSERT INTO kegiatan (idKegiatan, judul, isi) VALUES ('', '$judul', '$isi')");
			
		}else{
		
			mysql_query("UPDATE kegiatan SET
				judul		= '$judul',
				isi			= '$isi'
			WHERE idKegiatan 	= '$idKegiatan'");
		
		}
	}
?>