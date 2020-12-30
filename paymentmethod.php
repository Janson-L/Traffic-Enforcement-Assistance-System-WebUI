<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
    include "connection.php";


    if(isset($_POST['submit'])) {
        //Insert
        $StaffID = $_SESSION["StaffID"];
        $PaymentMethod=$_POST['PaymentMethod'];
        $PaymentDateTime=$_POST['PaymentDateTime'];
        $SummonID=$_POST['SummonID'];
        $query= "INSERT INTO payment (PaymentID, PaymentMethod, PaymentDateTime, SummonID, StaffID)
        VALUES (null, '$PaymentMethod', '$PaymentDateTime', '$SummonID', '$StaffID');";
        if(!mysqli_query($con,$query)) {
        echo'<script>alert("Payment Failed.")</script>';
        echo'<script>window.location="paymentmethod.php?id=<?= $SummonID;?>"</script>';
    }
    else{
        echo'<script>alert("Payment Successful.")</script>';
        header("location:summonpayment.php");
    }
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
                WHERE  summon.SummonID NOT IN (SELECT payment.SummonID FROM payment)
                AND summon.SummonID = '$editRow';";
$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) { ?>

<form name="ConfirmPayment" action="paymentmethod.php" method="post">
    <input type="hidden" name="SummonID" value="<?php echo $editRow; ?>"/>
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
                <td><input type="text" name="PaymentDateTime" value="<?php echo(strftime("%Y.%m.%d %H:%M")); ?>"></input></td>
            </tr>
            <tr>
                <td><label>Offense</label></td>
                <td><input type="text" name="OffenseName" value="<?php echo $row["OffenseName"] ?>" ></input></td>
            </tr>
            <tr>
                <td><label>Amount (RM)</label></td>
                <td><input type="text" name="Amount" value="<?php echo $row["CompoundRate"] ?>" ></input></td>
            </tr>
            <tr>
                <td><label>Payment Method</label></td>
                <td>
                    <select name="PaymentMethod" id="PaymentMethod">
                        <option value="0">Cash</option>
                        <option value="1">Debit Card</option>
                    </select>
                </td>
            </tr>
            <tr>
                <?php echo "<td>" ?>
                <button><a href="summonpayment.php">Cancel</a></button>
                <input type="submit" name="submit" value="Confirm" /> </td>
            </tr>
            
        </table>
</form>

    <?php
    }
    ?>




<?php
}else{
    include "nopermission.php";
}

?>