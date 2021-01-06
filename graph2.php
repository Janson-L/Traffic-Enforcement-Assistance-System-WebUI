<?php
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
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
  <style>
  
  .a{
	  margin-left:2%;
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
  <div class="container">
    <!--    Letak gambar dekat sini  -->
        <img src="image/Logo_Polis_Bantuan-01.png" style="height:200px;width: auto;margin: 0 auto;display: block;">
      
           
		   <div class = "a">

		   <div class="col-sm-6" style="border-style:solid; align-items: center; width:20%; left:40%;" >
        
        
    <form style="margin-top:30px;" action="">
                           <form style="margin-top:30px;" action="">
                           

                       <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Choose A Year</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="2020graph/graph.php">2020</a>
    <a href="2021graph/graph.php">2021</a>
  </div>
</div>
                    </form>
					<br>

					


      </div>
	  </div>
	  
     
      
      
    
    </div>

    </div>
    </div>

<!--Finish here-->

<!--Finish here-->
    <?php
    mysqli_close($con);
    include "navbar-footer/footer.php"
    ?>
  </body>

  </html>

<?php
} else {
  include "nopermission.php";
}
?>