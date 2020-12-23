<?php
include "connection.php";
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
?>
<!DOCTYPE html>

<head>
    <title>Staff Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include "navbar-footer/navbarCommander.php";
    if (!isset($_POST['editUserConfirm'])) { ?>
    <h2>Edit User </h2>
    <div class="container">
        <form method='POST'>

            <div class="row">
                <input type="text" name="staffID" value="<?php echo $_POST['staffID']; ?>" style="display:none">
                <div class="col-25"><label>Name:</label></div>
                <div class="col-75"><input type="text" name="name" value="<?php echo $_POST['name']; ?>"
                        pattern="^[A-Za-z \/@]{3,50}$" required maxlength="50"> (3-50 Characters, no special characters
                    except / and @)</div>
            </div>
            <div class="row">
                <div class="col-25"><label>Phone No:</label></div>
                <div class="col-75"><input type="text" name="phoneNo" value="<?php echo $_POST['phoneNo']; ?>"
                        pattern="^[0-9]{10,15}$" placeholder="0123456789" required maxlength="15"> (10-15 numbers)</div>
            </div>
            <div class="row">
            <label>Role:</label>
                    <select name='class' class="form-control" required>
                        <option
                            <?php if ($_POST['class'] == 1) echo 'selected="selected"'; ?>value=1>
                            Officer</option>
                        <option
                            <?php if ($_POST['class'] == 2) echo 'selected="selected"'; ?>value=2>
                            Commander</option>
                    </select>
            </div>
            <br>
            <div class="row">
                <div class="col-75"></div>
                <div class="col-5"></div>
                <div class="col-5"></div>
                <div class="col-7"><input type="submit" name="editUserConfirm" value="Edit User"></div>
        </form>

        <form method="POST" action="staffmanagement.php">
            <div class="col-5"><input type="submit" value="Cancel"></div>
        </form>

    </div>
    </div>
    </div>


    <?php }
           

            if (isset($_POST['editUserConfirm'])) {
                    $query = "UPDATE staff SET name='{$_POST['name']}', phoneNo='{$_POST['phoneNo']}', class={$_POST['class']} WHERE staffID='{$_POST['staffID']}';";
                    $result = mysqli_query($con, $query) or die("Query Failed");
                ?>
    <br>
    <div class="prompt">Update successful. You will now be redirected back to Manage User UI in 3 seconds.</div>
    <?php
                    mysqli_close($con);
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