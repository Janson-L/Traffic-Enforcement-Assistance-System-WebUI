<?php
    include "connection.php";
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $PaymentDateTime = strftime(date("Y-m-d H:i:s"));
    echo $PaymentDateTime;


    $query="SELECT `PaymentID`, `PaymentMethod`, `PaymentDateTime`, `SummonID`, `StaffID` 
    FROM `payment` 
    ORDER BY `PaymentID` DESC
    LIMIT 1;";
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed"); 
    mysqli_stmt_execute($stmt) or die("Query Failed");
    mysqli_stmt_bind_result($stmt,$paymentID, $paymentMethod, $paymentDateTime,$summonID,$staffID);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
?>
<head>
        <title>Summon Payment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<div class="container">
    <br />
    <div class="form-group">
        <h4 align="center"><b>PAYMENT SUCCESSFUL</b></h4>
    </div>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8 text-left">
            <h5>Payment ID: <?php echo $paymentID; ?> </h5>
            <h5>Payment Date Time: <?php echo $paymentDateTime; ?> </h5>
            <h5>Payment Method:
                <?php if($paymentMethod==0){echo "Cash";} elseif($paymentMethod==1){echo "Credit/Debit Card";} ?> </h5>
            <h5>Handling Officer ID: <?php echo $staffID; ?> </h5>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
