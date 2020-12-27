<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resolve With Summon</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include "navbar-footer/navbarCommander.php";

        if (isset($_POST['resolveWithSummon'])) {
            // include "connection.php";
            // $timeOffset='08:00';
            $photoDirectory='1';
            // $licensePlate = $_POST['LicensePlate'];
            // $offenseID=2;
            // $staffID=$_SESSION['StaffID'];
            
            
            // $query = 'INSERT INTO summon (`SummonID`, `SummonDateTime`, `PhotoDirectory`, `OffenseID`,`LicensePlate`,`StaffID`) 
            // VALUES (NULL,ADDTIME(CURRENT_TIMESTAMP(), ?),?,?,?,?);';
            // $stmt = mysqli_stmt_init($con);
            // mysqli_stmt_prepare($stmt, $query);
            // mysqli_stmt_bind_param($stmt, "sssss", $timeOffset,$photoDirectory,$offenseID,$licensePlate,$staffID);
            // mysqli_stmt_execute($stmt);
            // mysqli_stmt_close($stmt);

            // $query = 'SELECT `SummonID`,`SummonDateTime`
            // FROM summon ORDER BY `SummonID` DESC LIMIT 1';
            // $stmt = mysqli_stmt_init($con);
            // mysqli_stmt_prepare($stmt, $query);
            // mysqli_stmt_execute($stmt);
            // mysqli_stmt_bind_result($stmt, $summonID,$summonDateTime);
            // mysqli_stmt_fetch($stmt);
            // mysqli_stmt_close($stmt);

            // $summonDateTime= str_replace(" ","_",$summonDateTime);
            // $photoDirectory=$summonID.'_'.$summonDateTime;

            // $query = 'UPDATE `summon` SET`PhotoDirectory`= ? WHERE `SummonID`=?';
            // $stmt = mysqli_stmt_init($con);
            // mysqli_stmt_prepare($stmt, $query);
            // mysqli_stmt_bind_param($stmt, "si", $photoDirectory, $summonID);
            // mysqli_stmt_execute($stmt);
            // mysqli_stmt_close($stmt);
            // mysqli_close($con);
        ?>
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!--    Letak gambar dekat sini  -->
                        <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                        <h2>Summon Vehicle</h2>
                        <h3>Take a photo as an evidence</h3>
                    </div>
                </div>
            </div>
            <?php
            
            ?>
            <div class="col-sm-12 text-center">
                <?php include "testCamera/index.php";?>
                   
                <a href="<?php if ($_SESSION['ResolutionOrigin'] == 'Satria') {
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
            if ($_SESSION['ResolutionOrigin'] == 'Satria') {
                header("Refresh:5;URL=resolveSatria.php");
            } else {
                header("Refresh:5;URL=resolveLestari.php");
            }
            die();
        }
        ?>
        <?php
        //mysqli_close($con);
        ?>
    </body>
    </html>

<?php
} else {
    include "nopermission.php";
}
?>