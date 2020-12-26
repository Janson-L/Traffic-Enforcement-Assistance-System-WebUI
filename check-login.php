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
		$con->close();
		header("location:officer.php");
    }
    
    else if($data['Class']=="2"){
		$_SESSION['StaffID'] = $StaffID;
		$_SESSION['Class'] = "2";
		$con->close();
        header("location:commander.php");
    }
    
    else{
		$con->close();
		header("location:login.php?message=failed");
	}

}else{
	$con->close();
	header("location:login.php?message=failed");
}
?>