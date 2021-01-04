<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enforcement and Resolution</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/navbar.php"; ?>
        <div class="container text-center">
            <div class="col-sm-12 text-center">
                <!--    Letak gambar dekat sini  -->
                <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                <h2>Enforcement and Resolution</h2>
                <h3>Take action upon vehicles.</h3>
                <br>
                <div class="form-group">
                    <a href="scanNumberPlate.php" class="btn btn-default">
                        Scan Number Plate
                    </a>
                </div>
                <div class="form-group">
                    <a href="summonPayment.php" class="btn btn-default">
                        Summon Payment
                    </a>
                </div>
                <div class="form-group">
                    <a href="resolve.php" class="btn btn-default">
                        Resolve Overparked Vehicle
                    </a>
                </div>
                <div class="form-group">
                    <a href="<?php
                                if ($_SESSION['Class'] == "2") {
                                    echo "/Traffic-Enforcement-Assistance-System/commander.php";
                                } else {
                                    echo "/Traffic-Enforcement-Assistance-System/officer.php";
                                }
                                ?>" class="btn btn-primary">
                        &larr; Back
                    </a>
                </div>
            </div>

        </div>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/footer.php"
        ?>
    </body>

    </html>

<?php
} else {
    include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/nopermission.php";
}
?>