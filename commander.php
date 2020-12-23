<?php
session_start();

if (isset($_SESSION['StaffID']) && $_SESSION['Class']=="2") {

?>

<!DOCTYPE html>
<html>
<head>
	<title>Commander UI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "navbar-footer/navbarCommander.php" ?>


    <h1>Commander Page</h1>
    <p>Hello <b><?php echo $_SESSION['StaffID']; ?>

<br/>
<br/>
 
<?php include "navbar-footer/footer.php" ?>
</body>
</html>

<?php 
}else{
  include "nopermission.php";
}     
?>