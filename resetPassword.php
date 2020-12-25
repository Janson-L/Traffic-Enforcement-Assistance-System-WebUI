<?php
include "connection.php";
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
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
                    <input type="text" name="staffID" value=<?php echo "{$_POST['staffID']}" ?> style="display:none">
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

                <form method="POST" action="staffmanagement.php">
                    <div class="col-5"><input type="submit" value="Cancel"></div>
            </div>
            </form>
            </div>
        <?php } ?>

        <?php
        if ((isset($_POST['resetPasswordConfirm'])) && ($validUpdate == true)) {
            $newPassword=password_hash($_POST['newPassword'],PASSWORD_DEFAULT);
            $query = "UPDATE staff SET `password`='{$_POST['newPassword']}', loginAttempt='{$_POST['loginAttempt']}', accountStatus='{$_POST['accountStatus']}' WHERE staffID='{$_POST['staffID']}';";
            $result = mysqli_query($con, $query) or die("Query Failed");
            mysqli_close($con);
        ?>
            <br>
            <div class="prompt">Update successful. You will now be redirected back to Staff Management Page in 3 seconds.</div>
        <?php
            header("Refresh:3;URL=staffmanagement.php");
            die();
        } else { ?>
            <br>
            <div class="error"><?php echo "$out" ?></div>
        <?php
        }
        ?>

        <?php
        mysqli_close($con);
        include "navbar-footer/footer.php"
        ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>