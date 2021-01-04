<?php
session_start();

if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Profile Management</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/navbar.php";
        ?>

        <div class="container-fluid text-center">
            <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
            <h2>Profile Management</h2>
            <h3>Update personal information.</h3>
            <br><br>
            <div class="form-group">
                <a href="editPersonalInfo.php" class="btn btn-default">
                    Update Personal Details
                </a>
            </div>
            <div class="form-group">
                <a href="resetPersonalPassword.php" class="btn btn-default">
                    Reset Password
                </a>
            </div>
            <div class="form-group">
                    <a href="<?php 
                        if($_SESSION['Class'] == "2"){
                            echo "/Traffic-Enforcement-Assistance-System/commander.php";
                        }
                        else{
                            echo "/Traffic-Enforcement-Assistance-System/officer.php";
                        }
                    ?>" class="btn btn-primary">
                        &larr; Back
                    </a>
                </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/footer.php" ?>
    </body>

    </html>

<?php
} else {
    include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/nopermission.php";
    header("location: login.php");
    die();
}
?>