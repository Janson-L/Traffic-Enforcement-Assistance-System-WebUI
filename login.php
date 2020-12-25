<html>
<head>
	<title> User Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="login-body">
 
	<h1 class="login-h1"> TRAFFIC ENFORCEMENT ASSISTANCE SYSTEM </h1>
 
	<?php 
	if(isset($_GET['message'])){
		if($_GET['message']=="failed"){
			echo "<div class='login-alert'>ID and Password does not match!</div>";
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
	<?php 
		if(isset($_GET['message']))
		{
			if($_GET['message']=="failed")
			{
			echo "<div class='alert'>ID and Password does not match!</div>";
			}
		}
	?>
			<input type="submit" class="login-button" value="LOGIN">
 
			<br/>
			<br/>
		</form>
		
	</div>
 
 
</body>
</html>