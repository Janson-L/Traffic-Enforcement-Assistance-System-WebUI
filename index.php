<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>
 
	<h1>Login</h1>

	<?php 
	if(isset($_GET['message'])){
		if($_GET['message']=="failed"){
			echo "<div class='alert'>Incorrect Username and Password!</div>";
		}
	}
	?>
 
	<div>
		<p>Please Login</p>
 
		<form action="check-login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" placeholder="Password .." required="required">
 
			<input type="submit" value="LOGIN">
		</form>
		
	</div>
 
 
</body>
</html>