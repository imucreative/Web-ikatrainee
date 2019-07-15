<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
	ini_set("display_errors","Off");
	
	$id				= $_REQUEST['id'];
	$status			= $_REQUEST['status'];
	$nama			= $_REQUEST['nama'];
	$email			= $_REQUEST['email'];
	$tlp			= $_REQUEST['tlp'];
	$kategoriUsaha	= $_REQUEST['kategoriUsaha'];
	$updateAnggota	= $_REQUEST['updateAnggota'];
	
	if($status=='Menunggu'){
		$statusAnggota	= 'Terdaftar';
		$tglStatus		= "tglVerifikasiPembayaran = NOW()";
	}else{
		$statusAnggota	= 'Hadir';
		$tglStatus		= "tglVerifikasiKehadiran = NOW()";
	}
	
	$fileName	= $_FILES['foto']['name'];
	$fileTemp	= $_FILES['foto']['tmp_name'];
	$fileSize	= $_FILES['foto']['size'];
	$ext		= pathinfo( $fileName, PATHINFO_EXTENSION );
	$ekstensi	= array('jpg','jpeg','png','JPG','JPEG','PNG'); // Ektensi yg diterima
	
	if($updateAnggota=='1'){
		
		if($fileName!=''){
			if(in_array($ext, $ekstensi)){
				if($fileSize < 624288){
			
					$dirFoto	= "../../../../plugins/images/$fileName";
					move_uploaded_file($fileTemp, $dirFoto);
					
					mysql_query("UPDATE anggota SET nama = '$nama', email = '$email', tlp = '$tlp', kategoriUsaha = '$kategoriUsaha', foto = '$fileName' WHERE id = '$id'");
					return false;
				}else{
					echo "* Ukuran Maksimal File Foto 500Kb.";
					return false;
				}
			}else{
				echo "* Format file hanya JPG dan PNG.";
				return false;
			}
		}else{
			mysql_query("UPDATE anggota SET nama = '$nama', email = '$email', tlp = '$tlp', kategoriUsaha = '$kategoriUsaha'  WHERE id = '$id'");
			return false;
		}
		
		
	}else{
		mysql_query("UPDATE anggota SET status = '$statusAnggota', $tglStatus WHERE id = '$id'");
	}
?>