<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
	ini_set("display_errors","Off");
	$idMateri		= $_REQUEST['idMateri'];
	$del			= $_REQUEST['del'];
	
	$judul			= $_POST['judul'];
	$isi			= $_POST['isi'];
	
	if($del=='1'){
		mysql_query("DELETE FROM materi WHERE idMateri	= '$idMateri'");
	}else{
		if($idMateri == '0'){
		
			mysql_query("INSERT INTO materi (idMateri, judul, isi) VALUES ('', '$judul', '$isi')");
			
		}else{
		
			mysql_query("UPDATE materi SET
				judul		= '$judul',
				isi			= '$isi'
			WHERE idMateri 	= '$idMateri'");
		
		}
	}
?>