<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Traffic Enforcement Assistance System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="container login-body">
	<img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
	<h1 class="login-h1"> TRAFFIC ENFORCEMENT ASSISTANCE SYSTEM </h1>
	<?php
	if (isset($_GET['message'])) {
		if ($_GET['message'] == "failed") {
			echo "<div class='container alert alert-danger text-center' role='alert'>ID and Password does not match!</div>";
		}
	}
	if (isset($_GET['wrong'])) {
		if ($_GET['wrong'] == "failed") {
			echo "<div class='container alert alert-danger text-center' role='alert'>Login Failed!</div>";
		}
	}
	if (isset($_GET['login'])) {
		if ($_GET['login'] == "successful") {
			echo "<div class='container alert alert-success text-center' role='alert'>Login Successful!</div>";
		}
	}
	if (isset($_GET['accountLocked'])) {
		if ($_GET['accountLocked'] == "true") {
			echo "<div class='container alert alert-danger text-center' role='alert'>Account locked due to exceeding number of login attempts. <br> Please contact Commander-class users for assistance. </div>";
		}
	}

	?>

	<div class="login-box">
		<p class="login-font">Login</p>

		<form action="check-login.php" method="post">
			<label class="login-label">Staff ID</label>
			<input type="text" name="StaffID" class="login-form" placeholder="StaffID" required="required">
			<br>
			<label>Password</label>
			<input type="password" name="Password" class="login-form" placeholder="Password" required="required">

			<input type="submit" class="login-button" value="LOGIN">

			<br />
			<br />
		</form>

	</div>


</body>

</html>