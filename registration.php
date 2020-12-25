<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Add New Staff</title>
</head>
<body>
<div class="register-box">
			<h1>Sign up</h1>
			<form action="check-registration.php" method="post">
				<label>Staff ID</label><br>
				<input type="text" name="StaffID" placeholder="Staff ID" required><br>
                <label>Full Name</label><br>
				<input type="text" name="FullName" placeholder="Name" required><br>
				<label>Phone Number</label><br>
				<input type="text" name="PhoneNo" placeholder="Phone Number" required><br>
				<label>Password</label><br>
				<input type="password" name="password" placeholder="Password" required><br>
				<label>Re-enter Password</label><br>
				<input type="password" name="password-repeat" placeholder="Repeat Password" required><br>
				<button type="submit" name="register-submit" style="margin-top:10px">Add</button>
</form>
              <a href="staffmanagement.php"> <button type="button" style="margin-top:10px">Back To Staff Management</button></a>
</div>

<?php 
	if(isset($_GET['register'])){
		if($_GET['register']=="successful"){
			echo "<div class='register-alert'>Staff Registered!</div>";
		}
	}
	?>

</body>
</html>