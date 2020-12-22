<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Satria Dashboard</title>
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
          
     <div class="main-wrapper mx-auto">
          <?php
        
        $sql="SELECT record.LicensePlate, camera.Location, record.EntryDateTime, HOUR(TIMEDIFF(record.EntryDateTime, ADDTIME(CURRENT_TIMESTAMP(), '08:00'))) AS overdue_by
        FROM ((record 
LEFT JOIN camera ON camera.CameraID = record.CameraID)
LEFT JOIN sticker
ON record.licenseplate = sticker.LicensePlate)
LEFT JOIN summon
ON record.LicensePlate=summon.LicensePlate
WHERE record.exitdatetime is null and (sticker.type is null or sticker.type=3)
and HOUR(TIMEDIFF(EntryDateTime,ADDTIME(CURRENT_TIMESTAMP(), '08:00')))>=8
and (summon.SummonID is null or summon.OffenseID!=2)
        and Location='Satria'";
        
         
				$result = mysqli_query($con,$sql);
				echo '<table class="centerthistable"> <tr><th>Number Plate</th><th>Location</th><th>Entry DateTime</th><th>Overdue by</th>';
				if(mysqli_num_rows($result)>0) {
					while($row=mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>".$row['LicensePlate']."</td>";
						echo "<td>".$row['Location']."</td>";
						echo "<td>".$row['EntryDateTime']."</td>";
                        echo "<td>".$row['overdue_by']." hours</td>";
          
						

}
}
echo '</table>';
?>
<br>
        
        </div>



 

        
      <div class="col-sm-12 text-center">
        <a href="dashboard.php" class="btn btn-primary">
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