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
        <li><a href="<?php if ($_SESSION['Class'] == "2") { echo"/Traffic-Enforcement-Assistance-System/commander.php";} else{echo "/Traffic-Enforcement-Assistance-System/officer.php";}?>">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enforcement Action and Resolution<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/Traffic-Enforcement-Assistance-System/scanNumberPlate.php">Check Vehicle Details</a></li>
            <li><a href="/Traffic-Enforcement-Assistance-System/resolve.php">Resolve Overparked Vehicles</a></li>
            <li><a href="/Traffic-Enforcement-Assistance-System/summonpayment.php">Summon Payment</a></li>
          </ul>
        </li>
        <?php if ($_SESSION['Class'] == "2") { ?>
          <li><a href="/Traffic-Enforcement-Assistance-System/dashboard.php">Dashboard</a></li>
          <li><a href="graph2.php">Analysis and Statistic</a></li>
          <li><a href="/Traffic-Enforcement-Assistance-System/staffmanagement.php">Staff Management</a></li>
          <?php } ?>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile Management<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/Traffic-Enforcement-Assistance-System/editPersonalInfo.php">Update Personal Details</a></li>
            <li><a href="/Traffic-Enforcement-Assistance-System/resetPersonalPassword.php">Reset Password</a></li>
          </ul>
          </li>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="/Traffic-Enforcement-Assistance-System/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>