<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
    include "connection.php";


    if(isset($_POST['submit'])) {
        //Insert
        $PaymentMethod=$_POST['PaymentMethod'];
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $PaymentDateTime = strftime(date("Y-m-d H:i:s"));
        $StaffID = $_SESSION['StaffID'];
            $total = $_GET['total'];
            $query = "INSERT INTO payment (PaymentID, PaymentMethod, PaymentDateTime, Amount, StaffID)
            VALUES (null, '$PaymentMethod', '$PaymentDateTime', '$total', '$StaffID');";
            if(!mysqli_query($con,$query)) {
            echo'<script>alert("Payment Failed.")</script>';
        }
        else{
            $query = "SELECT `PaymentID` 
            FROM `payment` 
            ORDER BY `PaymentID` DESC
            LIMIT 1;";
            
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result)>0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $PaymentID = $row['PaymentID'];
                }
            }
            foreach($_SESSION["ShoppingCart"] as $keys => $values)
            { 
                $SummonID=$values["item_SummonID"];
                $query = "INSERT INTO summon_payment (`PaymentID`, `SummonID`)
                VALUES ('$PaymentID', '$SummonID');";
                if(!mysqli_query($con,$query)) {
                    echo'<script>alert("Payment Failed.")</script>';
                }
                else{
                    echo'<script>alert("Payment Successful.")</script>';
                    header("location:receipt.php");
                }
            }

        }

    
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
    include "navbar-footer/navbar.php";
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <!--    Letak gambar dekat sini  -->
                <img src="image/Logo_Polis_Bantuan-01.png"
                    style="height:100px;width: auto;margin: 0 auto;display: block;">
                <h2>Summon Payment</h2>
                <h3>Finalize Payment Details<h3>
            </div>
        </div>
    </div>

    <div>
        <br />
        
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
                        <td><?php echo $values["item_ID"]; ?></td>
                        <td><?php echo $values["item_LicensePlate"]; ?></td>
                        <td><?php echo $values["item_OffenseName"]; ?></td>
                        <td> RM <?php echo number_format($values["item_CompoundRate"], 2); ?></td>
                    </tr>
                    <?php
                            $total = $total + $values["item_CompoundRate"];
                        }
                    ?>
                    <form name="ConfirmPayment" action="paymentmethod.php?total=<?php echo $total;?>" method="post">
                    
                    <tr>
                        <td colspan="6" align="right">Total</td>
                        <td > RM <?php echo number_format($total, 2); ?></td>
                    </tr>

                    <tr>
                        <td colspan="6" align="right"><label>Payment Method</label></td>
                        <td>
                            <select name="PaymentMethod" id="PaymentMethod" class="form-control">
                                <option value="0">Cash</option>
                                <option value="1">Debit Card</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right">
                            <a href="summonpayment.php" class="btn btn-primary">Cancel</a>
                            <input type="submit" name="submit" value="Confirm" class="btn btn-success" /> 
                        </td>
                    </tr>
                    </form>
                    <?php
                    }
                    ?>
                </table>
            </div>
<div align="right">

</div>
    <?php
    }
    ?>


