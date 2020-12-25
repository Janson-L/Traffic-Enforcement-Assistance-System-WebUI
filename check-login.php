<?php 
session_start();

include 'connection.php';

$StaffID = $_POST['StaffID'];
$Password = $_POST['Password'];

$login = mysqli_query($con,"select * from staff where StaffID='$StaffID' and Password='$Password'");

$check = mysqli_num_rows($login);

if($check > 0){

	$data = mysqli_fetch_assoc($login);

	if($data['Class']=="1"){
		$_SESSION['StaffID'] = $StaffID;
		$_SESSION['Class'] = "1";
		header("location:officer.php");
    }
    
    else if($data['Class']=="2"){
		$_SESSION['StaffID'] = $StaffID;
		$_SESSION['Class'] = "2";
		
        header("location:commander.php");
    }
    
    else{
		header("location:index.php?message=failed");
	}

	
}else{
	header("location:index.php?message=failed");
}



?>