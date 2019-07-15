<?php
	switch($_REQUEST['page']){
		//HALAMAN MENU ATAS
		default:
			include "assets/config/home.php";
		break;
		
		case "anggota";
			include "pages/anggota/anggota.php";
		break;
		case "kegiatan";
			include "pages/kegiatan/kegiatan.php";
		break;
		case "materi";
			include "pages/materi/materi.php";
		break;
		case "biodataPembicara";
			include "pages/biodataPembicara/biodataPembicara.php";
		break;
	}
?>