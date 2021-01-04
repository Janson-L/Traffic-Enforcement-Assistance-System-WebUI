<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
if (isset($_POST["AddToCart"])){
    if(isset($_SESSION["ShoppingCart"])){
        $item_array_SummonID = array_column($_SESSION["ShoppingCart"], "item_SummonID");
        if(!in_array($_GET["SummonID"], $item_array_SummonID)){
            $count = count($_SESSION["ShoppingCart"]);
            $item_array = array(
                'item_SummonID'         =>  $_GET['SummonID'],
                'item_SummonDateTime'   =>  $_POST['SummonDateTime'],
                'item_Name'             =>  $_POST['Name'],
                'item_ID'               =>  $_POST['ID'],
                'item_LicensePlate'     =>  $_POST['LicensePlate'],
                'item_OffenseName'      =>  $_POST['OffenseName'],
                'item_CompoundRate'     =>  $_POST['CompoundRate']
            );
            $_SESSION["ShoppingCart"][$count] = $item_array;
        }
        else{
            echo '<script>alert("Summon Already Added")</script>';
            echo '<script>window.location="summonpayment.php"</script>';
        }
    }
    else{
        $item_array = array(
            'item_SummonID'         =>  $_GET['SummonID'],
            'item_SummonDateTime'   =>  $_POST['SummonDateTime'],
            'item_Name'             =>  $_POST['Name'],
            'item_ID'               =>  $_POST['ID'],
            'item_LicensePlate'     =>  $_POST['LicensePlate'],
            'item_OffenseName'      =>  $_POST['OffenseName'],
            'item_CompoundRate'     =>  $_POST['CompoundRate']
        );
        $_SESSION["ShoppingCart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        foreach($_SESSION["ShoppingCart"] as $keys => $values){
            if ($values["item_SummonID"] == $_GET["SummonID"]){
                unset($_SESSION["ShoppingCart"][$keys]);
                echo '<script>alert("Summon Removed from Cart")</script>';
            }
        }
    }
}

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
    include "navbar-footer/navbar.php";
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

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <!--    Letak gambar dekat sini  -->
            <img src="image/Logo_Polis_Bantuan-01.png"
            style="height:100px;width: auto;margin: 0 auto;display: block;">
            <h2>Summon Payment</h2>
            <h3>Process summon payments here</h3>
        </div>
    </div>
</div>
<div class="container text-center">
<h3>Summon Cart</h3>
    <div style="overflow-x:auto;">
        <table class="centerthistable">
            <tr>
                <th>Summon ID</th>
                <th>Date and Time</th>
                <th>Name</th>
                <th>ID</th>
                <th>Number Plate</th>
                <th>Offense</th>
                <th>Compound</th>
                <th>Actions</th>
            </tr>
            <?php
            if(!empty($_SESSION["ShoppingCart"])){
                $total = 0;
                foreach($_SESSION["ShoppingCart"] as $keys => $values){
            ?>
            <tr>
                <td><?php echo $values["item_SummonID"]; ?></td>
                <td><?php echo $values["item_SummonDateTime"]; ?></td>
                <td><?php echo $values["item_Name"]; ?></td>
                <td><?php echo $values["item_StudentID"]; ?></td>
                <td><?php echo $values["item_LicensePlate"]; ?></td>
                <td><?php echo $values["item_OffenseName"]; ?></td>
                <td> RM <?php echo number_format($values["item_CompoundRate"], 2); ?></td>
                <td><a href="summonpayment.php?action=delete&SummonID=<?php echo $values["item_SummonID"]; ?>"><span>Remove</span></a></td>
            </tr>
            <?php
                    $total = $total + $values["item_CompoundRate"];
                }
            ?>
            <tr>
                <td colspan="6" align="right">Total</td>
                <td > RM <?php echo number_format($total, 2); ?></td>
            </tr>
            <tr>
                <td colspan="8" align="right"><button type="button" onclick="window.location.href='paymentmethod.php';">Pay Now</button></td>
                
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<br><br><hr>

<div class="container">
            <form method='POST'>
            <div class="form-inline text-center">
                <div class="form-group">
                    <label>Search Type:</label>
                    <select name='searchType' class="form-control" required>
                        <option
                            <?php if ($searchType == "NameSearch") echo 'selected="selected"'; ?>value='NameSearch'>
                            Search by Name</option>
                        <option
                            <?php if ($searchType == "IDSearch") echo 'selected="selected"'; ?>value='IDSearch'>
                            Search by ID</option>
                    </select>
                    <input type="text" class="form-control" name='searchQuery' value='<?php echo $searchQuery ?>'
                        required pattern="^[A-Za-z0-9 \/@]{1,50}$" maxlength="30">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary" name="search">Search</button>
    </div>
            </form>
            <div class="form-group">
            <form method='POST' action='summonpayment.php'>
                    <div><input type='submit' class="btn btn-primary" value='Refresh'></div>
                </div>
                </div>
            </form>
    </div>
    </div>


    <?php
    if (isset($_POST['search'])) {
        if ($_POST['searchType'] == "IDSearch") {
            $searchTable = 1;
        } else if ($_POST['searchType'] == "NameSearch") {
            $searchTable = 2;
        } else {
            $searchTable = 0;
        }
    }
    ?>
    <div class="form-group text-center">
            <br>
                    <a href="/Traffic-Enforcement-Assistance-System/EaR.php" class="btn btn-primary">
                        &larr; Back
                    </a>
                </div>
                </div>
    <div class="container text-center">
        <?php
        if ($searchTable == 0) { ?>
        <h3>Show All</h3>
        <?php } else if ($searchTable == 1) { ?>
        <h3>Search by ID</h3>
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
                WHERE  summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)
                
                UNION
                
                SELECT summon.SummonID, summon.SummonDateTime, staff.Name, vehicle.StaffID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
                FROM summon
                    JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                    JOIN offense ON summon.OffenseID = offense.OffenseID
                    JOIN staff ON vehicle.StaffID = staff.StaffID
                
                    WHERE  summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)
                    ORDER BY summon.SummonID;";
        }

        if (isset($_POST['search'])) {
            $searchQueryEsc=mysqli_real_escape_string($con, $searchQuery);

            if ($searchTable == 1) {
                $query = "SELECT summon.SummonID, summon.SummonDateTime, student.Name, vehicle.StudentID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
                FROM summon
                    JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                    JOIN offense ON summon.OffenseID = offense.OffenseID
                    join student ON vehicle.StudentID = student.StudentID
                    WHERE  summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)
                    
                    UNION
                    
                    SELECT summon.SummonID, summon.SummonDateTime, staff.Name, vehicle.StaffID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
                    FROM summon
                        JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                        JOIN offense ON summon.OffenseID = offense.OffenseID
                        JOIN staff ON vehicle.StaffID = staff.StaffID
                        WHERE  summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)

                    AND vehicle.StudentID = '$searchQueryEsc'
                    ORDER BY summon.SummonID;";
            } 
            else if ($searchTable == 2) {
                $query = "SELECT summon.SummonID, summon.SummonDateTime, student.Name, vehicle.StudentID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
                FROM summon
                    JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                    JOIN offense ON summon.OffenseID = offense.OffenseID
                    join student ON vehicle.StudentID = student.StudentID 
                    WHERE summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)

                    UNION
                    
                    SELECT summon.SummonID, summon.SummonDateTime, staff.Name, vehicle.StaffID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
                    FROM summon
                        JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                        JOIN offense ON summon.OffenseID = offense.OffenseID
                        JOIN staff ON vehicle.StaffID = staff.StaffID
                        WHERE  summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)
                        
                    AND student.Name LIKE '%$searchQueryEsc%'
                    ORDER BY summon.SummonID;";
            }
        }
        $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) > 0) {
        echo '<div style="overflow-x:auto;"><table class="centerthistable"> <tr><th>SummonID</th><th>Date and Time</th><th>Student Name</th><th>Matrix Number</th><th>Number Plate</th><th>Offense</th><th>Compound(RM)</th>';
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
        <form method="post" action="summonpayment.php?action=add&SummonID=<?php echo $row["SummonID"]; ?>" >
        <input type="hidden" name="SummonID" value="<?php echo $row['SummonID']; ?>" />
        <input type="hidden" name="SummonDateTime" value="<?php echo $row['SummonDateTime']; ?>" />
        <input type="hidden" name="Name" value="<?php echo $row['Name']; ?>" />
        <input type="hidden" name="StudentID" value="<?php echo $row['StudentID']; ?>" />
        <input type="hidden" name="LicensePlate" value="<?php echo $row['LicensePlate']; ?>" />
        <input type="hidden" name="OffenseName" value="<?php echo $row['OffenseName']; ?>" />
        <input type="hidden" name="CompoundRate" value="<?php echo $row['CompoundRate']; ?>" />
        <td>
            <button type="submit" name="AddToCart" class="form-control">Add to Cart</button>

            <!-- <button><a href="paymentmethod.php?id=<?= $row['SummonID']; ?>">Pay Now</a></button> -->
        </td>
        </form>
        
        </div>

    <?php
    }
        echo '</table></div>';
    }
    else{
        echo"<div class='container-fluid text-center'>No records found.</div>";
    }
    ?>

<div>
        <br />


<?php
    mysqli_close($con);
    ?>
</body>
</html>

<?php
} else {
    include "nopermission.php";
}
?>