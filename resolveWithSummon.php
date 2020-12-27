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
        <?php include "navbar-footer/navbarCommander.php";
    
            if (isset($_POST['resolveWithSummon'])) {
            ?>
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!--    Letak gambar dekat sini  -->
                        <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                        <h2>Summon Vehicle</h2>
                        <h3>Issue summon for the vehicle</h3>
                    </div>
                </div>
            </div>
            <?php
            $licensePlate = $_POST['LicensePlate'];
            ?>
            <div class="col-sm-12 text-center">
                <form method='POST' action='resolveWithSummon.php'>
                    <input type="text" name="LicensePlate" value="<?php echo $_POST['LicensePlate']; ?>" style="display:none">
                    <input type="submit" id='summonBtn' name="resolveWithSummonConfirm" class="btn btn-primary" value="Summon">
                </form>
            </div>
            <div class="col-sm-12 text-center">
            <a href="<?php if ($_SESSION['ResolutionOrigin']=='Satria') {
                                    echo "resolveSatria.php";
                                } else {
                                    echo "resolveLestari.php";
                                } ?>" class="btn btn-primary">
                        &larr; Back
                </a>
            </div>
            <?php
        } else { ?>
            <br>
            <div>It seems that you did not navigate the pages properly. Please follow the UI and do not go back to a previous page.
                <br>You will be redirected back to Resolve Page in 5 seconds.</div>
        <?php
            if($_SESSION['ResolutionOrigin']=='Satria'){
                header("Refresh:5;URL=resolveSatria.php");
            }
            else{
                header("Refresh:5;URL=resolveLestari.php");
            }
            die();
        }
        ?>
        <?php
        mysqli_close($con);
        include "navbar-footer/footer.php"
        ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>