<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirm License Plate</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/Traffic-Enforcement-Assistance-System/style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/navbarCommander.php";
        include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/footer.php";
        include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/licensePlateReader.php";
        $licensePlateOCR = getLicensePlate($_POST['image']);
        ?>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <!--    Letak gambar dekat sini  -->
                    <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                    <h2>Confirm License Plate</h2>
                    <h3>Is this license plate correct?</h3>
                    <form method='POST' action='/Traffic-Enforcement-Assistance-System/displayVehicleInfo.php'>
                        <input type="text" class="form-control" name='licensePlate' value='<?php echo $licensePlateOCR ?>' required pattern="^[A-Za-z0-9]{3,10}$">(All caps and no space)
                        <br><br>
                        <div class="row"><button type="submit" class="btn btn-default" name="search">Search</button></div>
                    </form>
                    <br>
                    <div class="row">
                        <a href="/Traffic-Enforcement-Assistance-System/scanNumberPlate.php" class="btn btn-primary">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php

        ?>
    </body>

    </html>

<?php
} else {
    include "/Traffic-Enforcement-Assistance-System/nopermission.php";
}
?>