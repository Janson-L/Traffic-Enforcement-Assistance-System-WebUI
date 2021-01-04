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
<?php include "/Traffic-Enforcement-Assistance-System/navbar-footer/navbar.php
<div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <!--    Letak gambar dekat sini  -->
                    <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                    <h2>Scan License Plate</h2>
                    <h3>Take a photo of the vehicle's license plate</h3>
                </div>
            </div>
        </div>
<?php
    mysqli_close($con);
    include "/Traffic-Enforcement-Assistance-System/navbar-footer/footer.php"
    ?>
    </body>

    </html>

<?php
} else {
    include "/Traffic-Enforcement-Assistance-System/nopermission.php";
}
?>