<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Traffic Enforcement Assistance System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	
	<title>Add New Staff</title>
</head>
<body>

<div class="container text-center">
	<div class="register-box">
		<h1>Sign up</h1>
			<form action="check-registration.php" method="post">
				<label>Staff ID</label><br>
				<input type="text" name="StaffID" placeholder="Staff ID" required><br>
                <label>Full Name</label><br>
				<input type="text" name="Name" placeholder="Name" required><br>
				<label>Phone Number</label><br>
				<input type="text" name="PhoneNo" placeholder="Phone Number" required><br>
				<label>Password</label><br>
				<input type="password" name="Password" placeholder="Password" required><br>
				<label>Re-enter Password</label><br>
				<input type="password" name="Password-repeat" placeholder="Repeat Password" required><br>
				<button type="submit" name="register-submit" style="margin-top:10px">Add</button>
			</form>
			
			<div class="form-group text-center">
            <br>
                <a href="/Traffic-Enforcement-Assistance-System/SM.php" class="btn btn-primary">
                    &larr; Back
                </a>
			</div>
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