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
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <!--    Letak gambar dekat sini  -->
                    <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                    <h2>Confirm License Plate</h2>
                    <h3>Please check the license plate in the text box. Edit if it is not correct.</h3>
                    <form method='POST' action='displayVehicleInfo.php'>
                        <div class="form-group">
                            <label>License Plate:</label>
                            <input type="text" name="LicensePlate" class="form-control" value="<?php echo $licensePlateOCR; ?>" pattern="^[A-Z0-9]{4,10}$">
                            <small class="form-text text-muted">(4-10 Characters, Capital Letters, and no space)</small>
                        </div>
                        <div class="form-group">
                            <input type="submit" id='summonBtn' name="confirmLicensePlate" class="btn btn-success" value="Submit">
                    </form>
                </div>

                    <a href="/Traffic-Enforcement-Assistance-System/scanNumberPlate.php" class="btn btn-primary">
                    &larr; Back
                    </a>
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