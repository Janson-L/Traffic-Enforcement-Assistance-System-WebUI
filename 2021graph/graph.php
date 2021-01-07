<?php
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
include "../connection.php";
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
  <style>
  
  .a{
	  margin-right:30%;
  }
  
  .b{
	  margin-left:30%;
  }
  
  
.dropbtn {
  background-color: #050000;
  color: white;
  padding: 16px;
  font-size: 13px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
  font-size: 10px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 10px 14px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #383535;
}

/* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
</style>
</head>
<body>



<?php include $_SERVER['DOCUMENT_ROOT']."/Traffic-Enforcement-Assistance-System/navbar-footer/navbar.php"; ?>

<!-- start dekat sini i edit-->
  
<div class="container-fluid text-center">
<div class= "container">
    <!--    Letak gambar dekat sini  -->
        <img src="../image/Logo_Polis_Bantuan-01.png" style="height:200px;width: auto;margin: 0 auto;display: block;">
      
           
		   <div class = "a">

		   <div class="col-sm-6" style="border-style:solid; align-items: center; width:20%; left:40%;" >
        
        
    <form style="margin-top:30px;" action="">
                           <form style="margin-top:30px;" action="">
                           

                       <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Bar chart graphs</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="statistictry2.php">Illegal Parking</a>
    <a href="statistictry3.php">Sticker Misuse</a>
	<a href="statistictry4.php">Money collected from the student paid for "Illegal Parking" summon</a>
	<a href="statistictry5.php">Money collected from the student paid for "Sticker Misuse" summon</a>
	
  </div>
</div>
                    </form>
					<br>

					


      </div>
	  </div>
	  
     <div class = "b">
	 <div class="col-sm-6" style="border-style:solid; align-items: center; width:20%; left:40%;" >
        
        
    <form style="margin-top:30px;" action="">
                           <form style="margin-top:30px;" action="">
                           

                       <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Pie chart graphs</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="janstatistictry.php">January</a>
    <a href="febstatistictry.php">February</a>
    <a href="marstatistictry.php">March</a>
	<a href="aprstatistictry.php">April</a>
	<a href="maystatistictry.php">May</a>
	<a href="junstatistictry.php">June</a>
	<a href="julstatistictry.php">July</a>
	<a href="augstatistictry.php">August</a>
	<a href="sepstatistictry.php">September</a>
	<a href="octstatistictry.php">October</a>
	<a href="novstatistictry.php">November</a>
	<a href="decstatistictry.php">December</a>
	
  </div>
</div>

                    </form>
					<br>
					
					</div>
      




 
</div>
      
      <div class="col-sm-12 text-center">
        <a href="../graph2.php" class="btn btn-primary">
          &larr; Back
        </a>
      </div>
    
    </div>

    </div>
    </div>
	</div>

<!--Finish here-->

<!--Finish here-->
    <?php
    mysqli_close($con);
    include "../navbar-footer/footer.php"
    ?>
  </body>

  </html>
  
  <?php
} else {
  include "nopermission.php";
}
?>