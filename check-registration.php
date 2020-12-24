<?php
if(isset($_POST['register-submit'])) {
require "connection.php";

$StaffID=$_POST['StaffID'];
$Name=$_POST['Name'];
$PhoneNo=$_POST['PhoneNo'];
$Password=$_POST['Password'];
$PasswordRepeat=$_POST['Password-repeat'];
$Class="1";
$LoginAttempt="0";
$AccountStatus="1";
		
    $sql="SELECT StaffID FROM staff WHERE StaffID=?";
	$stmt=mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt,$sql);
	mysqli_stmt_bind_param($stmt, "s",$StaffID);
	mysqli_stmt_execute($stmt);
	
	mysqli_stmt_store_result($stmt);
	$resultCheck=mysqli_stmt_num_rows($stmt);
	
	if($resultCheck>0) {
		echo "<script>alert('ID already exists. Try again.');
				window.location='../registration.php';</script>";
		exit();
	}
    else {
        if($Password!==$PasswordRepeat) {
            echo "<script>alert('Passwords do not match. Try again.');	               
            window.location='../registration.php';</script>";
            exit();
        }
        else {
		//Username is not taken, proceed to registration
			$sql="INSERT INTO staff (StaffID,Name,PhoneNo,,Class,LoginAttempt,AccountStatus) VALUES (?,?,?,?,?,?,?,?)";
			$hashedPassword=password_hash($Password,PASSWORD_DEFAULT);
			$stmt=mysqli_stmt_init($con);
			mysqli_stmt_prepare($stmt,$sql);
			mysqli_stmt_bind_param($stmt, "ssssiii", $StaffID,$Name,$PhoneNo,$hashedPassword,$Class,$LoginAttempt,$AccountStatus);
            mysqli_stmt_execute($stmt);
            mysqli_close($con);
            header("Location:../registration.php?register=successful");
        }
    }
}