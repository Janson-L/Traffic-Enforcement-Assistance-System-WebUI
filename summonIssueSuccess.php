<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Success</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include "navbar-footer/navbarCommander.php";
        $_SESSION['ResolutionOrigin'] = '';
        ?>
        <br>
        <div class="prompt">Summon successfully issued. You will now be redirected in 5 seconds.</div>
        <?php
        include "navbar-footer/footer.php";
        if($_SESSION['Class'] == "2"){
            header("Refresh:5;URL=commander.php");
        }
        else{
            header("Refresh:5;URL=officer.php");
        }
        die();
        ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>