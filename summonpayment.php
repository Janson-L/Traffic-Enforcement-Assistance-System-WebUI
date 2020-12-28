<?php
SESSION_START();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Summon Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include "navbar-footer/navbarCommander.php";
    $searchType = "";
    $searchQuery = "";
    $searchTable = 0;

    if (isset($_POST['searchType'])) {
        $searchType = $_POST['searchType'];
    }

    if (isset($_POST['searchQuery'])) {
        $searchQuery = $_POST['searchQuery'];
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <!--    Letak gambar dekat sini  -->
                <img src="image/Logo_Polis_Bantuan-01.png"
                    style="height:100px;width: auto;margin: 0 auto;display: block;">
                <h2>Staff Management</h2>
                <h3>Manage other officer and commander accounts</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row col-sm-6">
            <form class="form-inline" method='POST'>
                <div class="form-group">
                    <label>Search Type:</label>
                    <select name='searchType' class="form-control" required>
                        <option
                            <?php if ($searchType == "studentNameSearch") echo 'selected="selected"'; ?>value='studentNameSearch'>
                            Search by Name</option>
                        <option
                            <?php if ($searchType == "matrixNoSearch") echo 'selected="selected"'; ?>value='matrixNoSearch'>
                            Search by Matrix Number</option>
                    </select>
                    <input type="text" class="form-control" name='searchQuery' value='<?php echo $searchQuery ?>'
                        required pattern="^[A-Za-z0-9 \/@]{1,50}$" maxlength="30">
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-default" name="search">Search</button>
            </form>
            <form class="form-inline" method='POST' action='staffmanagement.php'>
                    <div><input type='submit' class="form-control" value='Refresh'></div>
                </div>
            </form>
        </div>
    </div>
    </div>

    <?php
    if (isset($_POST['search'])) {
        if ($_POST['searchType'] == "matrixNoSearch") {
            $searchTable = 1;
        } else if ($_POST['searchType'] == "studentNameSearch") {
            $searchTable = 2;
        } else {
            $searchTable = 0;
        }
    }
    ?>
    <div class="container-fluid ">
        <?php
        if ($searchTable == 0) { ?>
        <h3>Show All</h3>
        <?php } else if ($searchTable == 1) { ?>
        <h3>Search by Matrix Number</h3>
        <?php } else if ($searchTable == 2) { ?>
        <h3>Search by Name</h3>
        <?php } ?>

        <?php
        //need to except the one logging in 
        if ($searchTable == 0) {
            $query = "SELECT SummonID,SummonDateTime,Name,LicensePlate,OffenseName,CompoundRate, 
            FROM summon summ, student stu, offense offe, vehicle veh 
            WHERE offe.OffenseID = summ.OffenseID 
            AND summ.StudentID = stu.StudentID
            AND stu.StudentID = vehicle.StudentID;";
        }

        /* if (isset($_POST['search'])) {
            $searchQueryEsc=mysqli_real_escape_string($con, $searchQuery);

            if ($searchTable == 1) {
                $query = "SELECT staffID,name,phoneNo,class,loginAttempt,accountStatus FROM `staff` WHERE staffID='$searchQueryEsc' AND class != 0 AND staffID != '{$_SESSION["StaffID"]}';";
            } else if ($searchTable == 2) {
                $query = "SELECT staffID,name,phoneNo,class,loginAttempt,accountStatus FROM `staff` WHERE name LIKE '%$searchQueryEsc%' AND class != 0 AND staffID != '{$_SESSION["StaffID"]}';";
            }
        } */
        $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) > 0) {
        echo '<table class="centerthistable"> <tr><th>Number Plate</th><th>Location</th><th>Entry DateTime</th><th>Overdue by</th>';
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['SummonID'] . "</td>";
          echo "<td>" . $row['SummonDateTime'] . "</td>";
          echo "<td>" . $row['Name'] . "</td>";
          echo "<td>" . $row['LicensePlate'] . "</td>";
          echo "<td>" . $row['OffenseName'] . "</td>";
          echo "<td>" . $row['CompoundRate'] . "</td>";
          ?>

          <?php
        }
        echo '</table>';
      }
      else{
        echo"<div class='container-fluid text-center'>No vehicle that requires further action.</div>";
      }
      ?>

</body>
</html>