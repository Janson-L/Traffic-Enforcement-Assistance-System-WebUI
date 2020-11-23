<?php
	$servername = 'localhost';
	$dbUsername = 'doadmin';
	$dbPassword = 'm3b42eqqb86gug7e';
	$dbName = 'defaultdb';
	
	$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);
	
	if(!$conn) {
		die("Connection:failed".mysqli_connect_error());
	}

?>