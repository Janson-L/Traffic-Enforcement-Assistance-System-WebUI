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
    echo '<table class="centerthistable"> <tr><th>SummonID</th><th>Date and Time</th><th>Student Name</th><th>Matrix Number</th><th>Number Plate</th><th>Offense</th><th>Compound(RM)</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['SummonID'] . "</td>";
      echo "<td>" . $row['SummonDateTime'] . "</td>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['StudentID'] . "</td>";
      echo "<td>" . $row['LicensePlate'] . "</td>";
      echo "<td>" . $row['OffenseName'] . "</td>";
      echo "<td>" . $row['CompoundRate'] . "</td>";
    }
?>

<?php
}
/* include "nopermission.php"; */
?>