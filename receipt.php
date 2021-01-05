<?php
SESSION_START();

if (isset($_SESSION['StaffID'])) {
    include "connection.php";

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            unset($_SESSION["ShoppingCart"]);
            echo '<script>window.location="summonpayment.php"</script>';
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
    <style type="text/css" media="print">
        .no-print {
            display: none;
        }
    </style>

    <body>
        <?php
        include "navbar-footer/navbar.php";
        $query = "SELECT `PaymentID`, `PaymentMethod`, `PaymentDateTime`, `StaffID` 
            FROM `payment` 
            ORDER BY `PaymentID` DESC
            LIMIT 1;";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed");
        mysqli_stmt_execute($stmt) or die("Query Failed");
        mysqli_stmt_bind_result($stmt,$paymentID, $paymentMethod, $paymentDateTime, $staffID);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <!--    Letak gambar dekat sini  -->
                    <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                    <h2>Summon Payment</h2>
                </div>
            </div>
        </div>

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
                        <?php if ($paymentMethod == 0) {
                            echo "Cash";
                        } elseif ($paymentMethod == 1) {
                            echo "Credit/Debit Card";
                        } ?> </h5>
                    <h5>Handling Officer ID: <?php echo $staffID; ?> </h5>
                </div>
                <div class="col-sm-2">
                </div>
            </div>
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
                if (!empty($_SESSION["ShoppingCart"])) {
                    $total = 0;
                    foreach ($_SESSION["ShoppingCart"] as $keys => $values) {
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

                    <tr>
                        <td colspan="6" align="right">Total</td>
                        <td> RM <?php echo number_format($total, 2); ?></td>
                    </tr>

                    <tr>
                        <td colspan="7" align="right">
                            <a href="receipt.php?action=delete" class="no-print btn btn-success">Okay</a>

                            <button onclick="window.print()" class="btn btn-primary">Print Receipt</button>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </table>
        </div>
        <div align="right">

        </div>
    <?php
} else {
    include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/nopermission.php";
    header("location: login.php");
    die();
}
    ?>