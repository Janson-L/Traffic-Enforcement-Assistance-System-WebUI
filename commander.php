<?php
session_start();

if (isset($_SESSION['StaffID']) && isset($_SESSION['Class'])) {

?>

<!DOCTYPE html>
<html>
<head>
	<title>COMMMANDER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TRAFFIC ENFORCEMENT ASSISTANCE SYSTEM</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="interface.html">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enforcement Action and Resolution<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="scannumberplate.html">Scan Number Plate</a></li>
            <li><a href="summonpayment.html">Summon Payment</a></li>
            <li><a href="resolve.html">Resolve</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dashboard<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dashboard.php">Dashboard</a></li>
          </ul>
        </li>
        <li><a href="#">Analysis and Statistic</a></li>
          
          <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <h1>Commander Page</h1>
    <p>Hello<b><?php echo $_SESSION['StaffID']; ?>

<br/>
<br/>
 

<footer class="container-fluid text-center navbar-fixed-bottom">
  <p>Contact us: 999</p>
</footer>

</body>
</html>

<?php 
}else{
    header("location: index.php");
    exit();
}     
?>