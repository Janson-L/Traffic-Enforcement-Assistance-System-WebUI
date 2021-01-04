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
        <link rel="stylesheet" href="style/spinner.css">
        <link rel="stylesheet" href="style/fade.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
    <?php include "navbar-footer/navbar.php"; 

        if (isset($_POST['resolveWithSummon'])) {
            include "connection.php";
            $timeOffset = '08:00';
            $photoDirectory = '1';
            $licensePlate = $_POST['LicensePlate'];
            $offenseID = $_POST['offenseID'];
            echo $_POST['type'];
            echo $_POST['id'];

            if (isset($_POST['type'])) {
                if($_POST['type']=='staff'){
                    $staffID=$_POST['id'];
                    $name='Undefined';
                    $phoneNo='Undefined';
                    $accountStatus='1';
                    $query = 'INSERT IGNORE INTO `staff`(`StaffID`, `Name`, `PhoneNo`, `Password`,`AccountStatus`) VALUES (?,?,?,NULL,?)';
                    $stmt = mysqli_stmt_init($con);
                    mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed"); 
                    mysqli_stmt_bind_param($stmt, "sssi", $staffID, $name, $phoneNo,$accountStatus);
                    mysqli_stmt_execute($stmt)or die("Query 1 Failed");
                    mysqli_stmt_close($stmt);

                    $model='Undefined';
                    $year='0';

                    $query = 'INSERT INTO `vehicle`(`LicensePlate`, `Model`, `Year`, `StaffID`) VALUES (?,?,?,?)';
                    $stmt = mysqli_stmt_init($con);
                    mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed");
                    mysqli_stmt_bind_param($stmt, "ssis", $licensePlate, $model,$year, $staffID);
                    mysqli_stmt_execute($stmt)or die("Query 2 Failed");
                    mysqli_stmt_close($stmt);
                }
                else{
                    $studentID=$_POST['id'];
                    $name='Undefined';
                    $phoneNo='Undefined';
                    $query = 'INSERT IGNORE INTO `student`(`StudentID`, `Name`, `PhoneNo`) VALUES (?,?,?)';
                    $stmt = mysqli_stmt_init($con);
                    mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed");
                    mysqli_stmt_bind_param($stmt, "sss", $studentID, $name, $phoneNo);
                    mysqli_stmt_execute($stmt)or die("Query 3 Failed");
                    mysqli_stmt_close($stmt);

                    $model='Undefined';
                    $year='0';

                    $query = 'INSERT INTO `vehicle`(`LicensePlate`, `Model`, `Year`, `StudentID`) VALUES (?,?,?,?)';
                    $stmt = mysqli_stmt_init($con);
                    mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed");
                    mysqli_stmt_bind_param($stmt, "ssis", $licensePlate, $model,$year, $studentID);
                    mysqli_stmt_execute($stmt)or die("Query 4 Failed");
                    mysqli_stmt_close($stmt);
                }
            }
            
            $staffID = $_SESSION['StaffID'];

            $query = 'INSERT INTO summon (`SummonID`, `SummonDateTime`, `PhotoDirectory`, `OffenseID`,`LicensePlate`,`StaffID`) 
            VALUES (NULL,ADDTIME(CURRENT_TIMESTAMP(), ?),?,?,?,?);';
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed"); 
            mysqli_stmt_bind_param($stmt, "ssiss", $timeOffset, $photoDirectory, $offenseID, $licensePlate, $staffID);
            mysqli_stmt_execute($stmt) or die("Query Failed");
            mysqli_stmt_close($stmt);

            $query = 'SELECT `SummonID`,`SummonDateTime`
            FROM summon ORDER BY `SummonID` DESC LIMIT 1';
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed"); 
            mysqli_stmt_execute($stmt) or die("Query Failed");
            mysqli_stmt_bind_result($stmt, $summonID, $summonDateTime);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            $summonDateTime = str_replace(" ", "_", $summonDateTime);
            $photoDirectory = $summonID . '_' . $summonDateTime;

            $query = 'UPDATE `summon` SET`PhotoDirectory`= ? WHERE `SummonID`=?';
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed"); 
            mysqli_stmt_bind_param($stmt, "si", $photoDirectory, $summonID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        ?>
            <div class="spin"></div>
            <div class="fadeMe"></div>
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!--    Letak gambar dekat sini  -->
                        <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                        <h2>Summon Vehicle</h2>
                        <h3>Take a photo as an evidence.</h3>
                        <h3>If offense is sticker misuse, take a picture of the sticker if available.</h3>
                    </div>
                </div>
            </div>
            <?php

            ?>
            <div class="col-sm-12 text-center">
                <?php include "testcamera/index.php"; ?>

                <a href="<?php if ($_SESSION['ResolutionOrigin'] == 'Satria') {
                                echo "resolveSatria.php";
                            } elseif ($_SESSION['ResolutionOrigin'] == 'Lestari') {
                                echo "resolveLestari.php";
                            } else {
                                echo "scanNumberPlate.php";
                            }
                            ?>" class="btn btn-primary">
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

<script>
    $(".spin").hide();
    $(".fadeMe").hide();
    $("#postBtn").click(function() {
        $(".spin").show();
        $(".fadeMe").show();
    });
</script>