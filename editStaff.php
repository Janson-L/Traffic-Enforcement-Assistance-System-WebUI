<?php
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
    include "connection.php";
?>
    <!DOCTYPE html>

    <head>
        <title>Edit Staff Info</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include "navbar-footer/navbar.php";
        if (!isset($_POST['editUserConfirm'])) { ?>
            <div class="container text-center">
            <!--    Letak gambar dekat sini  -->
            <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
            <h2>Update Staff Info</h2>
            <h3>Update staff details</h3>
        </div>
            <div class="container">
                <form method='POST'>
                    <div class="form-group">
                        <input type="text" name="staffID" value="<?php echo $_POST['staffID']; ?>" style="display:none">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $_POST['name']; ?>" pattern="^[A-Za-z \/@]{3,50}$" required maxlength="50"> 
                        <small class="form-text text-muted">(3-50 Characters, no special characters except / and @)</small>
                    </div>
                    <div class="form-group">
                        <label>Phone No:</label>
                        <input type="text" name="phoneNo" class="form-control" value="<?php echo $_POST['phoneNo']; ?>" pattern="^[0-9]{10,15}$" placeholder="0123456789" required maxlength="15"> 
                        <small class="form-text text-muted">(10-15 numbers only)</small>
                    </div>
                    <div class="form-group">
                        <label>Role:</label>
                        <select name='class' class="form-control" required>
                            <option <?php if ($_POST['class'] == 1) echo 'selected="selected"'; ?>value=1>
                                Officer</option>
                            <option <?php if ($_POST['class'] == 2) echo 'selected="selected"'; ?>value=2>
                                Commander</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group text-center">
                    <input type="submit" name="editUserConfirm" class="btn btn-success" value="Edit User">
                </div>
                </form>

                <div class="form-group text-center">
                    <a href="staffManagement.php" class="btn btn-primary">
                        Cancel
                    </a>
                </div>
            </div>
            </div>
            </div>


        <?php }


        if (isset($_POST['editUserConfirm'])) {
            $query = "UPDATE staff SET name='{$_POST['name']}', phoneNo='{$_POST['phoneNo']}', class={$_POST['class']} WHERE staffID='{$_POST['staffID']}';";
            $result = mysqli_query($con, $query) or die("Query Failed");
            mysqli_close($con);
        ?>
            <br>
            <div class="container alert alert-success text-center" role="alert">Update successful. You will now be redirected back to Staff Management Page in 3 seconds.</div>
        <?php

            header("Refresh:3;URL=staffmanagement.php");
            die();
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