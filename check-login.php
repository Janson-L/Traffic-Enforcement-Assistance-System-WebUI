<?php 
session_start();

include 'connection.php';

$StaffID = $_POST['StaffID'];
$Password = $_POST['Password'];

$sql="SELECT * FROM staff WHERE StaffID=?";
$stmt=mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt, "s", $StaffID);
mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if($data=mysqli_fetch_assoc($result)){
	$passwordCheck=password_verify($Password, $data['Password']);
	if($passwordCheck==false) {
		header("Location:login.php?error=wrongpassword");
		$con->close();
		exit();
	}
	else if($passwordCheck==true) {
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
		exit();
	}

}

?>