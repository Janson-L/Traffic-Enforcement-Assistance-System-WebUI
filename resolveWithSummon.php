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
        mysqli_close($con);
        include "navbar-footer/footer.php"
        ?>
    </body>

    </html>
    <?php
    if (isset($_POST['resolveWithSummon'])) {
        $licensePlate = $_POST['LicensePlate'];
    ?>
        <form method='POST' action='resolveWithSummon.php'>
            <input type="text" name="LicensePlate" value="<?php echo $_POST['LicensePlate']; ?>" style="display:none">
            <input type="submit" id='summonBtn' name="resolveWithSummonConfirm" class="btn btn-primary" value="Summon">
        </form>
    <?php
    }
    ?>
<?php
} else {
    include "nopermission.php";
}
?>