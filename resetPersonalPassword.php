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
        include "navbar-footer/navbar.php";
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
            <div class="col-sm-12 text-center">
            <!--    Letak gambar dekat sini  -->
            <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
            <h2>Reset Personal Password</h2>
            <h3>Change your password.</h3>
        </div>
            <div class="container"> 
            <?php
                    if (!is_null($out)&&isset($_POST['newPassword']) && isset($_POST['newPasswordRetype'])){
                        ?>
                         <div class="col-sm-12 alert alert-danger text-center" role="alert"><?php echo "$out" ?></div>
                        <?php 
                    }  
                ?>
                <form method='POST'>
                    <input type="text" name="staffID" value=<?php echo "{$_SESSION['StaffID']}" ?> style="display:none">
                    <div class="form-group">
                        <label>New Password:</label>
                        <input class="form-control" type="password" name="newPassword" required maxlength="12">
                    </div>
                    <div class="form-group">
                        <label>Retype New Password:</label>
                        <input class="form-control" type="password" name="newPasswordRetype" required maxlength="12">
                    </div>
                    <input type="text" name="loginAttempt" value="0" style="display:none">
                    <input type="text" name="accountStatus" value="1" style="display:none">
                    <div class="form-group text-center">
                    <input type="submit" name="resetPasswordConfirm" class="btn btn-success" value="Confirm">   
                    </div> 
                </form>
                <div class="form-group text-center">
                    <a href="profileManagement.php" class="btn btn-primary">
                        &larr; Back
                    </a>
                </div>
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
            <div class="container alert alert-success text-center" role="alert">Update successful. You will now be redirected in 3 seconds.</div>
        <?php
            header("Refresh:3;URL=profileManagement.php");
            die();
        } else { ?>
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