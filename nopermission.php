<?php
$_SESSION = array();
session_destroy();
?>
<br>
<div>You don't have the privilege to view this page. You will be logged out and redirected to the login page in 5
    seconds.<br> Please login with the correct account.</div>
<?php
header("Refresh:5;URL=login.php");
die();
?>