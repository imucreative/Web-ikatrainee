<?php
	include "../config/koneksi.php";
	
	# Fungsi untuk membuat kode automatis
	function buatKodePendaftaran($tabel, $inisial){
		$struktur	= mysql_query("SELECT * FROM $tabel");
		$field		= mysql_field_name($struktur,1);
		$panjang	= 15;

		$qry		= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
		$row		= mysql_fetch_array($qry); 
		if ($row[0]==""){
			$angka	= 0;
		}else{
			$angka	= substr($row[0], strlen($inisial));
		}

		$angka++;
		$angka		= strval($angka); 
		$tmp		= "";
		for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++){
			$tmp=$tmp."0";	
		}
		return $inisial.$tmp.$angka;
	}
	
	ini_set("display_errors","Off");
	$tahun			= date('y');
	$bulan			= date('m');
	$tanggal		= date('d');
	$nama			= $_REQUEST['nama'];
	$email			= $_REQUEST['email'];
	$tlp			= $_REQUEST['tlp'];
	$kategoriUsaha	= $_REQUEST['kategoriUsaha'];

	$fileName	= $_FILES['foto']['name'];
	$fileTemp	= $_FILES['foto']['tmp_name'];
	$fileSize	= $_FILES['foto']['size'];
	$ext		= pathinfo( $fileName, PATHINFO_EXTENSION );
	$ekstensi	= array('jpg','jpeg','png'); // Ektensi yg diterima
	
		$queryCekEmail	= mysql_query("SELECT * FROM anggota WHERE email LIKE '%$email%'");
		$dataCekEmail	= mysql_fetch_row($queryCekEmail);
	
		if($fileName!=''){
			if(in_array($ext, $ekstensi)){
				$kodePendaftaran	= buatKodePendaftaran('anggota','IKA'.$tahun.'/'.$bulan.'/'.$tanggal.'/');
				if($fileSize < 624288){
			
					if($dataCekEmail=='0'){
						$dirFoto	= "../plugins/images/$fileName";
						move_uploaded_file($fileTemp, $dirFoto);
						mysql_query("INSERT INTO anggota (id, kodePendaftaran, tglDaftar, nama, email, tlp, kategoriUsaha, foto, status) VALUES ('', '$kodePendaftaran', NOW(), '$nama', '$email', '$tlp', '$kategoriUsaha', '$fileName', 'menunggu')") or die (mysql_error());
						include "../config/kirimEmail.php";
						echo "Registrasi Berhasil. Silahkan periksa email anda untuk melakukan verifikasi data.";
						return false;
					}else{
						echo "Anda Sudah Terdaftar. Silahkan periksa email anda untuk melakukan verifikasi data.";
						return false;
					}
					
				}else{
					echo "* Ukuran Maksimal File Foto 500Kb.";
					return false;
				}
				return false;
			}else{
				echo "* Format file hanya JPG dan PNG.";
				return false;
			}
		}else{
			echo "* Mohon Input Foto Anda";
			return false;
		}
?>