<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set("display_errors","Off");

	$host		= "mysql.idhostinger.com";
	$user		= "u205827935_ikat";
	$pass		= "adminqwerty";
	$db			= "u205827935_ikat";

	$koneksi	= mysql_connect($host,$user,$pass);
	mysql_select_db($db,$koneksi);
?>