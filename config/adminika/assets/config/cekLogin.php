<?php
include "connection.php";
session_start();
	$user	 	= $_POST['username'];
	$password 	= $_POST['password'];
	$pass 		= base64_encode(base64_encode(base64_encode($password)));
	$query		= mysql_query('SELECT * FROM admin WHERE username="'.$user.'" AND password="'.$pass.'"');
	$check		= mysql_num_rows($query);
	$data		= mysql_fetch_array($query);

	if($check <= 0){
		echo 2;
	}else{
		$_SESSION['id']			= $data['id'];
		$_SESSION['username']	= $data['username'];
		echo 1;
	}
?>