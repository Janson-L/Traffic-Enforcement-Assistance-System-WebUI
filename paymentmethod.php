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
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <!--    Letak gambar dekat sini  -->
                <img src="image/Logo_Polis_Bantuan-01.png"
                    style="height:100px;width: auto;margin: 0 auto;display: block;">
                <h2>Summon Payment</h2>
            </div>
        </div>
    </div>

<?php
$editRow = $_GET['id'];
$query = "SELECT summon.SummonID, summon.SummonDateTime, student.Name, vehicle.StudentID, summon.LicensePlate, offense.OffenseName, offense.CompoundRate
            FROM summon
                JOIN vehicle ON summon.LicensePlate = vehicle.LicensePlate
                JOIN offense ON summon.OffenseID = offense.OffenseID
                join student ON vehicle.StudentID = student.StudentID
                WHERE summon.SummonID = $editRow";
$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) { ?>

<form name="ConfirmPayment" action="paymentmethod.php" method="post">
	<input type="hidden" name="SummonID" value="<?php echo $row["SummonID"]; ?>"/>        
	<table border="0">
	<col width="200">
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="Name" value="<?php echo $row["Name"] ?>" ></input></td>
            </tr>
            <tr>
                <td><label>Matrics Number</label></td>
                <td><input type="text" name="StudentID" value="<?php echo $row["StudentID"] ?>" ></input></td>
            </tr>
	        <tr>
                <td><label>Number Plate</label></td>
                <td><input type="text" name="LicensePlate" value="<?php echo $row["LicensePlate"] ?>"></input></td>
            </tr>
	        <tr>
                <td><label>Issue Time</label></td>
                <td><input type="email" name="" value="<?php echo(strftime("%d.%m.%Y %H:%M")); ?>"></input></td>
            </tr>
            <tr>
                <td><label>Offense</label></td>
                <td><input type="text" name="OffenseName" value="<?php echo $row["OffenseName"] ?>" ></input></td>
            </tr>
            <tr>
                <td><label>Amount</label></td>
                <td><input type="text" name="Amount" value="<?php echo $row["CompoundRate"] ?>" ></input></td>
            </tr>
            <tr>
		
                <td><input type="submit" name="submit" value="Save" />
    		
            </tr>
            
        </table>
 </form>

     <!--  echo "<tr>";
      echo "<td>" . $row['SummonID'] . "</input></td>";
      echo "<td>" . $row['SummonDateTime'] . "</td>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['StudentID'] . "</td>";
      echo "<td>" . $row['LicensePlate'] . "</td>";
      echo "<td>" . $row['OffenseName'] . "</td>";
      echo "<td>" . $row['CompoundRate'] . "</td>"; -->
    <?php
    }
    ?>




<?php
}
/* include "nopermission.php"; */
?>