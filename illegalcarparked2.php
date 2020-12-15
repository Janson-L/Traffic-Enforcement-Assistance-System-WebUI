<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
            <li><a href="illegalcarparked.html">View all illegal Cars parked</a></li>
          </ul>
        </li>
        <li><a href="#">Analysis and Statistic</a></li>
          
          <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- start dekat sini i edit-->
  
<div class="container-fluid text-center">
  <div class="row">
    <div class="col-sm-2 sidenav"> <br><br><br><br><br></div>
    <div class="col-sm-10">
    <div class="row">
      <div class="col-sm-12 mt-5">
      <div class="row">
      <div class="col-sm-12 text-center">
    <!--    Letak gambar dekat sini  -->
        <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
      </div>
      </div>
      </div>
           <div class="col-sm-6" style="border-style:solid; width:20%; left:20%;" >
        <h3><a href="illegalcarparked.php">Satria</a></h3>
        <h2>
       <?php
    $Location = "Satria";
		
    $sql="SELECT count(Location) FROM camera LEFT JOIN record ON camera.CameraID = record.CameraID WHERE Location=? AND HOUR(TIMEDIFF(EntryDateTime,ExitDateTime))>=8";
    $stmt=mysqli_stmt_init($con);
    if(!(mysqli_stmt_prepare($stmt, $sql))){
        echo "Prepare failed: (" . $con->errno . ") " . $con->error;
    }
    else {
        if(!(mysqli_stmt_bind_param($stmt, "s", $Location))) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        else {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $result);
            while(mysqli_stmt_fetch($stmt)) {
                echo $result;
            }
        }
    }

    /*
    $stmt=$con->prepare($sql);
    if(!$stmt){
      echo "Prepare failed: (" . $con->errno . ") " . $con->error;
    }
    else{
      $stmt->bind_param('s',$Location);
      if(!stmt){
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
      }
      else{
        //mysqli_stmt_bind_param($stmt, "s", $Location);
        $stmt->execute();

        mysqli_stmt_bind_result($stmt, $result);
		    while(mysqli_stmt_fetch($stmt)) {
						echo $result;
        }
      }
    }
    */
		
?></h2>


      </div>
      <div class="col-sm-6" style="border-style:solid; width:20%; left:40%;" >
        <h3><a href="illegalcarparked3.php">Lestari</a></h3>
        <h2><?php
    $Location = "Lestari";
    if(!(mysqli_stmt_prepare($stmt, $sql))){
        echo "Prepare failed: (" . $con->errno . ") " . $con->error;
    }
    else {
        if(!(mysqli_stmt_bind_param($stmt, "s", $Location))) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        else {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $result);
            while(mysqli_stmt_fetch($stmt)) {
                echo $result;
            }
        }
    }
	
    /*
    $stmt->bind_param('s',$Location);
    if(!stmt){
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    else{
      //mysqli_stmt_bind_param($stmt, "s", $Location);
      $stmt->execute();

      mysqli_stmt_bind_result($stmt, $result);
      while(mysqli_stmt_fetch($stmt)) {
          echo $result;
      }
    }
    */
?></h2>
      </div>
      




 

        
      <div class="col-sm-12 text-center">
        <a href="interface.html" class="btn btn-primary">
          &larr; Back
        </a>
      </div>
    </div>
    </div>

    </div>
    </div>

<!--Finish here-->

<footer class="container-fluid text-center navbar-fixed-bottom">
  <p>Contact us: 999</p>
</footer>

</body>
</html>