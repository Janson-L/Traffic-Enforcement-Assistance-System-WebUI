<!DOCTYPE html>
<?php
	SESSION_START();
	if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
		include "connection.php";
?>
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
<?php
	include "navbar-footer/navbar.php";
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <!--    Letak gambar dekat sini  -->
            <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
            <h2>Staff Management</h2>
        	<h3>Register a new staff</h3>

			<?php 
				if(isset($_GET['register'])){
					if($_GET['register']=="successful"){
						echo "<div class='container alert alert-success text-center' role='alert'>Staff Added!</div>";
					}
				}
			?>
			
		</div>
    </div>
</div>

<div class="container">
		<form action="check-registration.php" method="post">
			<div class="form-group">
				<label>Staff ID</label><br>
				<input class="form-control" type="text" name="StaffID" placeholder="Staff ID" required><br>
            </div>
			<div class="form-group">
				<label>Full Name</label><br>
				<input class="form-control" type="text" name="Name" placeholder="Name" required><br>
			</div>
			<div class="form-group">
				<label>Phone Number</label><br>
				<input class="form-control" type="text" name="PhoneNo" placeholder="Phone Number" required><br>
			</div>
			<div class="form-group">
				<label>Password</label><br>
				<input class="form-control" type="password" name="Password" placeholder="Password" required><br>
			</div>
			<div class="form-group">
				<label>Re-enter Password</label><br>
				<input class="form-control" type="password" name="Password-repeat" placeholder="Repeat Password" required><br>
			</div>
			<div class="form-group text-center">
				<input type="submit" name="register-submit" class="btn btn-success" value="Confirm">   
            </div>
		</form>
			
		<div class="form-group text-center">
			<br>
			<a href="/Traffic-Enforcement-Assistance-System/SM.php" class="btn btn-primary">
    		&larr; Back
    		</a>
		</div>

</div>

</body>
</html>

<?php
} else {
    include "nopermission.php";
}
?>