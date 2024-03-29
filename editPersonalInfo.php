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
        <title>Update Personal Info</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include "navbar-footer/navbar.php";
        $staffID = $_SESSION['StaffID'];
        $query = "SELECT name, phoneNo FROM staff WHERE staffID=?;";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $staffID);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_close($con);
            die("Query Failed");
        }
        mysqli_stmt_bind_result($stmt, $name, $phoneNo);
        mysqli_stmt_fetch($stmt);
        ?>
         
        <?php if (!isset($_POST['editInfoConfirm'])) { ?>
            <div class="container text-center">
            <!--    Letak gambar dekat sini  -->
            <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
            <h2>Update Personal Info</h2>
            <h3>Update your personal details</h3>
        </div>
            <div class="container">
                <form method='POST'>
                    <div class="form-group">
                        <input type="text" name="staffID" value="<?php echo $_SESSION['StaffID']; ?>" style="display:none">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" pattern="[A-Za-z /@]{3,50}" required maxlength="50"> 
                        <small class="form-text text-muted">(3-50 Characters, no special characters except / and @)</small>
                    </div>
                    <div class="form-group">
                        <label>Phone No:</label>
                        <input type="text" name="phoneNo" class="form-control" value="<?php echo $phoneNo; ?>" pattern="[0-9]{10,15}" placeholder="0123456789" required maxlength="15"> 
                        <small class="form-text text-muted">(10-15 numbers only)</small>
                    </div>
                    <div class="text-center">
                    <div class="form-group">
                    <input type="submit" name="editInfoConfirm" class="btn btn-success" value="Update Information">
                    </div>
                </form>
                <div class="form-group">
                    <a href="profileManagement.php" class="btn btn-primary">
                        &larr; Back
                    </a>
                </div>
                    </div>
            </div>



        <?php } ?>
        <?php

        if (isset($_POST['editInfoConfirm'])) {
            $name = $_POST['name'];
            $phoneNo = $_POST['phoneNo'];

            $query = "UPDATE staff SET name=?,phoneNo=? WHERE staffID=?;";
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "sss", $name, $phoneNo, $staffID);
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