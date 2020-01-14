<?php

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpassword = '';
	$dbname = 'ganeshatravel';
	
	//Membuat koneksi
	$con = mysqli_connect($dbhost,$dbuser,$dbpassword);
	
	//Cek koneksi
	if(!$con){
		echo "Failed to connect to MySQL: " . mysqli_error();
	}
	mysqli_select_db($con, $dbname);
?>
