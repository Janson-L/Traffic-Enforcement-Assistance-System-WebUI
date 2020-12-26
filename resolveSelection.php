<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {

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
        if (isset($_POST['resolveSelectionSatria']) || isset($_POST['resolveSelectionLestari'])) {
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
                                <input type="text" name="Location" value="<?php echo $_POST['Location']; ?>" style="display:none">
                                <input type="text" name="EntryDateTime" value="<?php echo $_POST['EntryDateTime']; ?>" style="display:none">
                                <input type="submit" name="resolveWithSummon" class="btn btn-primary" value="Resolve With Summon">
                            </form>
                    </div>
                </div>
                <br><br><br>
                <div class="col-sm-12 text-center">
                    <a href="<?php if (isset($_POST['resolveSelectionSatria'])) {
                                    echo "resolveSatria.php";
                                } else {
                                    echo "resolveLestari.php";
                                } ?>" class="btn btn-primary">
                        &larr; Back
                    </a>
                </div>
            </div>
        <?php
        } else { ?>
            <br>
            <div>It seems that you did not navigate the pages properly. Please follow the UI and do not go back to a previous page.
                <br>You will be redirected back to Resolve Overparked Vehicle page in 5 seconds.</div>
            <?php
            header("Refresh:5;URL=resolve.php");
            die();
        }
        include "navbar-footer/footer.php"
            ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>