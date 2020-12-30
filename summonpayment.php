<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
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
                <h2>Summon Payment</h2>
                <h3>List of Summons</h3>
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
            <form class="form-inline" method='POST' action='summonpayment.php'>
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
            $query = "SELECT summon.SummonID, summon.SummonDateTime, student.Name, vehicle.StudentID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
            FROM summon
                JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                JOIN offense ON summon.OffenseID = offense.OffenseID
                join student ON vehicle.StudentID = student.StudentID
                WHERE  summon.SummonID NOT IN (SELECT payment.SummonID FROM payment);";
        }

        if (isset($_POST['search'])) {
            $searchQueryEsc=mysqli_real_escape_string($con, $searchQuery);

            if ($searchTable == 1) {
                $query = "SELECT summon.SummonID, summon.SummonDateTime, student.Name, vehicle.StudentID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
                FROM summon
                    JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                    JOIN offense ON summon.OffenseID = offense.OffenseID
                    join student ON vehicle.StudentID = student.StudentID
                    WHERE summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)
                    AND vehicle.StudentID = '$searchQueryEsc';";
            } 
            else if ($searchTable == 2) {
                $query = "SELECT summon.SummonID, summon.SummonDateTime, student.Name, vehicle.StudentID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
                FROM summon
                    JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                    JOIN offense ON summon.OffenseID = offense.OffenseID
                    join student ON vehicle.StudentID = student.StudentID 
                    WHERE summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)
                    AND student.Name LIKE '%$searchQueryEsc%';";
            }
        }
        $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) > 0) {
        echo '<table class="centerthistable"> <tr><th>SummonID</th><th>Date and Time</th><th>Student Name</th><th>Matrix Number</th><th>Number Plate</th><th>Offense</th><th>Compound(RM)</th>';
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['SummonID'] . "</td>";
          echo "<td>" . $row['SummonDateTime'] . "</td>";
          echo "<td>" . $row['Name'] . "</td>";
          echo "<td>" . $row['StudentID'] . "</td>";
          echo "<td>" . $row['LicensePlate'] . "</td>";
          echo "<td>" . $row['OffenseName'] . "</td>";
          echo "<td>" . $row['CompoundRate'] . "</td>";
          ?>
          <td>
                <!-- <form method='POST' action='paymentmethod.php'>
                    <input type="submit" name="resolveSelection" class="form-control"  value="Pay Now">
                </form> -->
                <a href="paymentmethod.php?id=<?= $row['SummonID']; ?>">Pay Now</a>
            </td>

          <?php
        }
        echo '</table>';
      }
      else{
        echo"<div class='container-fluid text-center'>No records found.</div>";
      }
      ?>
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