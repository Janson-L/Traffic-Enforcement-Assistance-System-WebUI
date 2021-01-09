<?php 
session_start();

include 'connection.php';

$StaffID = $_POST['StaffID'];
$Password = $_POST['Password'];

$sql="SELECT `StaffID`,`Password`,`LoginAttempt`,`AccountStatus`,`Class` FROM staff WHERE `Class` !=0 AND `StaffID`=?";
$stmt=mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt, "s", $StaffID);
mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if($data=mysqli_fetch_assoc($result)){
	if($data['AccountStatus']==0){
		header("Location:login.php?accountLocked=true");
	}
	else
	{
	$passwordCheck=password_verify($Password, $data['Password']);
	if($passwordCheck==false) {
		$newLoginAttempt=$data['LoginAttempt']+1;
		if($newLoginAttempt==3){
			$query="UPDATE `staff` SET `LoginAttempt`=$newLoginAttempt,`AccountStatus`=0 WHERE `StaffID`='$StaffID'";
			mysqli_query($con, $query) or die("Query Failed");
			$con->close();
			header("Location:login.php?accountLocked=true");
			die();
		}
		else if($newLoginAttempt<3){
			$query="UPDATE `staff` SET `LoginAttempt`=$newLoginAttempt WHERE `StaffID`='$StaffID'";
			mysqli_query($con, $query) or die("Query Failed");
			$con->close();
			header("Location:login.php?wrong=failed");
			exit();
		}
	}
	else if($passwordCheck==true) {
		$query="UPDATE `staff` SET `LoginAttempt`=0 WHERE `StaffID`='$StaffID'";
		mysqli_query($con, $query) or die("Query Failed");
		$con->close();

		if($data['Class']=="1"){
			$_SESSION['StaffID'] = $StaffID;
			$_SESSION['Class'] = "1";
			header("Location:login.php?login=successful");
			header("location:officer.php");
		}
		else if($data['Class']=="2"){
			$_SESSION['StaffID'] = $StaffID;
			$_SESSION['Class'] = "2";
			header("Location:login.php?login=successful");
			header("location:commander.php");
		}
		exit();
	}
}
}

else {
	header("Location:login.php?message=failed");
}

?>