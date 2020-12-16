<?php 

$host="db-mysql-sgp1-01735-do-user-7518064-0.b.db.ondigitalocean.com";
$port=25060;
$socket="";
$user="admin";
$password="wgo11px6esmhk36u";
$dbname="traffic_enforcement_assistance_system";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
?>