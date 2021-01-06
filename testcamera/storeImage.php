<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Store Image</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/Traffic-Enforcement-Assistance-System/style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <?php
        include $_SERVER['DOCUMENT_ROOT'] ."/Traffic-Enforcement-Assistance-System/navbar-footer/navbar.php";
    ?>
       
        <body onload="window.location.href ='/Traffic-Enforcement-Assistance-System/summonIssueSuccess.php';">
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!--    Letak gambar dekat sini  -->
                        <img src="../image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                        <h3>Processing image, please wait patiently.</h3>
                    </div>
                </div>
            </div>

            <?php
            include $_SERVER['DOCUMENT_ROOT'] ."/Traffic-Enforcement-Assistance-System/navbar-footer/footer.php";
            include $_SERVER['DOCUMENT_ROOT'] ."/Traffic-Enforcement-Assistance-System/digitalocean/do-space-upload.php";
            doSpaceUploadb64uri($_POST['image'], $_POST['photoDirectory']);
            ?>
        </body>
<?php
} else {
    include $_SERVER['DOCUMENT_ROOT'] ."/Traffic-Enforcement-Assistance-System/nopermission.php";
}
?>