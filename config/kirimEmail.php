<?php
	$namaAnggota		= $nama;
	$nomorPendaftaran	= $kodePendaftaran;
	$to					= $email;
	$tlpAnggota			= $tlp;
	
	$subject			= "Registrasi IKA Trainee";
	$headers			= "MIME-Version: 1.0" . "\r\n";
	$headers			.= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers			.= "From: ".'IKA Trainee'."<".'support@ikatrainee.esy.es'.">" . "\r\n"; //bagian ini diganti sesuai dengan email dari pengirim
	
		$pesan	= '<html><body>';
		$pesan	.= "Dear ".$namaAnggota.",<br/><br/>";
		$pesan	.= "Permintaan Pendaftaran Anda Telah Kami Terima.<br/><br/>";
		$pesan	.= "Mohon Lakukan verifikasi dengan membayar Rp. 100.000,-<br/>Via transfer atau menghubungi pengurus IKA <br/>Untuk mendapatkan merchandise dan nomor tempat duduk.<br/>";
		$pesan	.= "Transfer ke Bank Permata Rek. No. 121-00-29458 (a.n. Endin Saripudin).<br/><br/>";
		$pesan	.= "<font color='red'>Segeralah... Tempat Duduk Terbatas...</font><br/><br/>";
		
		$pesan	.= "Informasi Detail:";
		$pesan .= '<table rules="all" style="border-color: #666;" cellpadding="3" border="1">';
			$pesan .= "<tr><td><strong>No. Registrasi</strong></td>";
			$pesan .= "<td>: <b><font color='red'>".$nomorPendaftaran."</font></b></td></tr>";
			$pesan .= "<tr><td><strong>Nama</strong></td>";
			$pesan .= "<td>: ".$namaAnggota."</td></tr>";
			$pesan .= "<tr><td><strong>Email</strong></td>";
			$pesan .= "<td>: ".$to."</td></tr>";
			$pesan .= "<tr><td><strong>Telephone</strong></td>";
			$pesan .= "<td>: ".$tlpAnggota."</td></tr>";
		$pesan .= "</table>";
		
	$pesan .= "</body></html>";
	$pesan .= "<br/><br/>Regard's,<br/>IKA Trainee<br/>Admin IKA.";
	
	
	@mail($to, $subject, $pesan, $headers);
?>