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
        <title>Delete Staff</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include "navbar-footer/navbar.php";
        if (isset($_POST['deleteUser'])) {
        ?>
            <h2>Confirmation</h2>
            <div class="container">
                <div class="prompt">Are you sure you want to delete <?php echo "{$_POST['name']} ({$_POST['staffID']})" ?> ?</div>
                <form method='POST'>
                    <input type="text" name="staffID" value="<?php echo $_POST['staffID']; ?>" style="display:none">
                    <input type="text" name="name" value="<?php echo $_POST['name']; ?>" style="display:none">
                    <div class="row">
                        <div class="col-35"></div>
                        <div class="col-25"><input type="submit" name="deleteUserConfirm" value="Confirm"></div>
                </form>
                <form method='POST' action='staffmanagement.php'>
                    <div class="col-15"><input type="submit" value="Cancel"></div>
            </div>
            </div>

            </form>

            </div>
        <?php } ?>

        <?php
        if (isset($_POST['deleteUserConfirm'])) {
            $query = "DELETE FROM staff WHERE staffID='{$_POST['staffID']}';";
            $result = mysqli_query($con, $query) or die("Query Failed");

            mysqli_close($con);
        ?>
            <br>
            <div class="prompt">Delete successful. You will now be redirected back to Staff Management Page in 3 seconds.</div>
        <?php
            header("Refresh:3;URL=staffmanagement.php");
            die();
        }
        ?>
        <?php
        mysqli_close($con);
        include "navbar-footer/footer.php";
        ?>
    </body>

    </html>

<?php
} else {
    include "nopermission.php";
}
?>