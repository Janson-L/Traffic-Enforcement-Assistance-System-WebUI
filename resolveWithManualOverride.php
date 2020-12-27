<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolve Satria</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "navbar-footer/navbarCommander.php" ?>
<?php
        if (isset($_POST['resolveWithFP'])) {
            $licensePlate = $_POST['LicensePlate'];   
            $query = "UPDATE record SET exitdatetime=(ADDTIME(CURRENT_TIMESTAMP(), '08:00')) WHERE LicensePlate=?";
            
            $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt, $query)){
                die("Failed to prepare statement");
            }
            mysqli_stmt_bind_param($stmt, "s", $licensePlate);

            if (!mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($con);
                die("Query Failed");
            }
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        ?>
            <br>
            <div class="prompt">Overparked vehicle resolved successfully.
            <br> You will now be redirected back to Resolve Overparked Vehicle Page.</div>
        <?php
            header("Refresh:3;URL=resolve.php");
            die();
        } else { ?>
            <br>
            <div class="error"><?php echo "$out" ?></div>
        <?php
        }
        ?>
<?php
    include "navbar-footer/footer.php"
    ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>