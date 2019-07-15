<?php
	switch($_REQUEST['page']){
		default:
			include "pages/home.php";
		break;
		
		case "undangan";
			include "pages/undangan.php";
		break;
		
		case "kegiatan";
			include "pages/kegiatan.php";
		break;
		
		case "materi";
			include "pages/materi.php";
		break;
		
		case "pembicara";
			include "pages/pembicara.php";
		break;
		
		case "register";
			include "pages/register.php";
		break;
	}
?>