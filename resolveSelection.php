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
        <title>Select Resolve Tactics</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script type="text/javascript" src="prompt.js"></script>
    </head>

    <body>
        <?php include "navbar-footer/navbar.php
        if (isset($_POST['resolveSelection'])) {
            $licensePlate = $_POST['LicensePlate'];
            $registeredVehicle = 'false';

            $query = 'SELECT licensePlate FROM vehicle WHERE licensePlate=?';
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "s", $licensePlate);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                $registeredVehicle = 'true';
            }
            mysqli_stmt_close($stmt);
            mysqli_close($con);

        ?>
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!--    Letak gambar dekat sini  -->
                        <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                        <h2>Resolution Tactics</h2>
                        <h3>Select appropriate resolution tactics for the vehicle</h3><br><br>

                        <form method='POST' action='resolveWithSummon.php'>
                            <input type="text" name="LicensePlate" value="<?php echo $_POST['LicensePlate']; ?>" style="display:none">
                            <select name='offenseID' style="display:none">
                                <option value="1">Sticker Misuse</option>
                                <option value="2" selected>Illegal Parking</option>
                            </select>
                            <input type="submit" id='summonBtn' name="resolveWithSummon" class="btn btn-primary" value="Summon">
                        </form>

                        <br>
                        <form id='overrideConfirmation' method='POST' action='resolveWithManualOverride.php' onsubmit="return confirm('Are you sure the vehicle is no longer in the area?');">
                            <input type="text" name="LicensePlate" value="<?php echo $_POST['LicensePlate']; ?>" style="display:none">
                            <input type="submit" name="resolveWithFP" class="btn btn-primary" value="Manual Override">
                        </form>
                    </div>
                </div>
                <br><br><br>
                <div class="col-sm-12 text-center">
                    <a href="<?php if ($_SESSION['ResolutionOrigin'] == 'Satria') {
                                    echo "resolveSatria.php";
                                } else {
                                    echo "resolveLestari.php";
                                } ?>" class="btn btn-primary">
                        &larr; Back
                    </a>
                </div>
            </div>
            <script>
                if (!<?php echo $registeredVehicle ?>) {
                    document.getElementById("summonBtn").disabled = true;
                    alert("Not a registered vehicle. The vehicle cannot be summoned.\nPlease handle this vehicle manually.");
                }
            </script>
        <?php
        } else { ?>
            <br>
            <div>It seems that you did not navigate the pages properly. Please follow the UI and do not go back to a previous page.
                <br>You will be redirected back to Resolve Overparked Vehicle page in 5 seconds.</div>
        <?php
            header("Refresh:5;URL=resolve.php");
            die();
        }
        include "navbar-footer/footer.php";
        ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>