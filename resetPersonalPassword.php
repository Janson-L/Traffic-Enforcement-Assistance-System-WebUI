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
        <title>Reset Personal Password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include "navbar-footer/navbarCommander.php";
        $out = "";
        $validUpdate = false;
        if (isset($_POST['newPassword']) && isset($_POST['newPasswordRetype'])) {
            if ($_POST['newPassword'] === $_POST['newPasswordRetype']) {
                $validUpdate = true;
            } else {
                $out .= "Wrong Password. Please make sure password is keyed in correctly.";
            }
        }
        ?>
        <?php if ($validUpdate != true) { ?>
            <div class="container">
                <form method='POST'>
                    <input type="text" name="staffID" value=<?php echo "{$_SESSION['StaffID']}" ?> style="display:none">
                    <div class="row">
                        <div class="col-25"><label>New Password:</label></div>
                        <div class="col-75"><input type="password" name="newPassword" required maxlength="12"></div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Retype New Password:</label></div>
                        <div class="col-75"><input type="password" name="newPasswordRetype" required maxlength="12"><br></div>
                    </div>
                    <input type="text" name="loginAttempt" value="0" style="display:none">
                    <input type="text" name="accountStatus" value="1" style="display:none">
                    <br>
                    <div class="row">
                        <div class="col-75"></div>
                        <div class="col-5"></div>
                        <div class="col-5"></div>
                        <div class="col-5"><input type="submit" name="resetPasswordConfirm" value="Confirm"></div>

                </form>
            </div>
        <?php } ?>

        <?php
        if ((isset($_POST['resetPasswordConfirm'])) && ($validUpdate == true)) {
            $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $loginAttempt = $_POST['loginAttempt'];
            $accountStatus = $_POST['accountStatus'];
            $staffID = $_POST['staffID'];

            $query = "UPDATE staff SET `password`=?, loginAttempt=?, accountStatus=? WHERE staffID=?;";
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "siis", $newPassword, $loginAttempt, $accountStatus, $staffID);
            if (!mysqli_stmt_execute($stmt)) {
                mysqli_close($con);
                die("Query Failed");
            }
            mysqli_close($con);
        ?>
            <br>
            <div class="prompt">Update successful. You will now be redirected in 3 seconds.</div>
        <?php
            echo '<meta http-equiv="refresh" content="3">';
            die();
        } else { ?>
            <br>
            <div class="error"><?php echo "$out" ?></div>
        <?php
        }
        ?>

        <?php
        //mysqli_close($con);
        include "navbar-footer/footer.php"
        ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>