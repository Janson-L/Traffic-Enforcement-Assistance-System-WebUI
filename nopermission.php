<?php
$_SESSION = array();
session_destroy();
?>
<head>
    <title>No Permission</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<div class="container alert alert-danger text-center" role="alert">You don't have the privilege to view this page. <br>You will be logged out and redirected to the login page in 5
    seconds.<br> Please login with the correct account.</div>
<?php
header("Refresh:5;URL=login.php");
die();
?>