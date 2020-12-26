
<?php
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

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
    $searchType = "";
    $searchQuery = "";
    $searchTable = 0;

    if (isset($_POST['searchType'])) {
        $searchType = $_POST['searchType'];
    }

    if (isset($_POST['searchQuery'])) {
        $searchQuery = $_POST['searchQuery'];
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <!--    Letak gambar dekat sini  -->
                <img src="image/Logo_Polis_Bantuan-01.png"
                    style="height:100px;width: auto;margin: 0 auto;display: block;">
                <h2>Staff Management</h2>
                <h3>Manage other officer and commander accounts</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row col-sm-6">
            <form class="form-inline" method='POST'>
                <div class="form-group">
                    <label>Search Type:</label>
                    <select name='searchType' class="form-control" required>
                        <option
                            <?php if ($searchType == "staffNameSearch") echo 'selected="selected"'; ?>value='staffNameSearch'>
                            Search by user name</option>
                        <option
                            <?php if ($searchType == "staffIDSearch") echo 'selected="selected"'; ?>value='staffIDSearch'>
                            Search by userID</option>
                    </select>
                    <input type="text" class="form-control" name='searchQuery' value='<?php echo $searchQuery ?>'
                        required pattern="^[A-Za-z0-9 \/@]{1,50}$" maxlength="30">
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-default" name="search">Search</button>
            </form>
            <form class="form-inline" method='POST' action='staffmanagement.php'>
                    <div><input type='submit' class="form-control" value='Refresh'></div>
                </div>
            </form>
        </div>
    </div>
    </div>

    <?php
    if (isset($_POST['search'])) {
        if ($_POST['searchType'] == "staffIDSearch") {
            $searchTable = 1;
        } else if ($_POST['searchType'] == "staffNameSearch") {
            $searchTable = 2;
        } else {
            $searchTable = 0;
        }
    }
    ?>
    <div class="container-fluid ">
        <?php
        if ($searchTable == 0) { ?>
        <h3>Show All</h3>
        <?php } else if ($searchTable == 1) { ?>
        <h3>Search by Staff ID</h3>
        <?php } else if ($searchTable == 2) { ?>
        <h3>Search by Staff Name</h3>
        <?php } ?>

        <?php
        //need to except the one logging in 
        if ($searchTable == 0) {
            $query = "SELECT staffID,name,phoneNo,class,loginAttempt,accountStatus FROM `staff` where class != 0 AND staffID != '{$_SESSION["StaffID"]}';";
        }

        if (isset($_POST['search'])) {
            $searchQueryEsc=mysqli_real_escape_string($con, $searchQuery);

            if ($searchTable == 1) {
                $query = "SELECT staffID,name,phoneNo,class,loginAttempt,accountStatus FROM `staff` WHERE staffID='$searchQueryEsc' AND class != 0 AND staffID != '{$_SESSION["StaffID"]}';";
            } else if ($searchTable == 2) {
                $query = "SELECT staffID,name,phoneNo,class,loginAttempt,accountStatus FROM `staff` WHERE name LIKE '%$searchQueryEsc%' AND class != 0 AND staffID != '{$_SESSION["StaffID"]}';";
            }
        }
        $result = mysqli_query($con, $query) or die("Query Failed");
        if (mysqli_num_rows($result) > 0) {
        ?>

        <table>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Phone No</th>
                <th>Class</th>
                <th>Login Attempt</th>
                <th>Account Status</th>
                <th>Edit</th>
                <th>Reset Password</th>
                <th>Delete</th>
            </tr>
            <?php
        } else {
            echo "No result is found. Please make sure you have entered the correct search term.";
        }


        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['staffID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phoneNo']; ?></td>
                <td><?php
                        if ($row['class'] == 1) {
                            echo "Officer";
                        } else if ($row['class'] == 2) {
                            echo "Commander";
                        }

                        ?>
                </td>
                <td><?php echo $row['loginAttempt']; ?></td>
                <td><?php echo $row['accountStatus']; ?></td>
                <td>
                    <form method='POST' action='editStaff.php'>
                        <input type="text" name="staffID" value="<?php echo $row['staffID']; ?>" style="display:none">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" style="display:none">
                        <input type="text" name="phoneNo" value="<?php echo $row['phoneNo']; ?>" style="display:none">
                        <input type="text" name="class" value="<?php echo $row['class']; ?>" style="display:none">
                        <input type="submit" name="editUser" class="form-control"  value="Edit User">
                    </form>
                </td>
                <td>
                    <form method='POST' action='resetPassword.php'>
                        <input type="text" name="staffID" value="<?php echo $row['staffID']; ?>" style="display:none">
                        <input type="text" name="password" value="<?php echo $row['password']; ?>" style="display:none">
                        <input type="text" name="loginAttempt" value="<?php echo $row['loginAttempt']; ?>"
                            style="display:none">
                        <input type="text" name="accountStatus" value="<?php echo $row['accountStatus']; ?>"
                            style="display:none">
                        <input type="submit" name="resetPassword" class="form-control" value="Reset Password">
                    </form>
                </td>
                <td>
                    <form method='POST' action='deleteStaff.php'>
                        <input type="text" name="staffID" value="<?php echo $row['staffID']; ?>" style="display:none">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" style="display:none">
                        <input type="submit" name="deleteUser" class="form-control" value="Delete User">
                    </form>
                </td>
            </tr>
            <?php }
            ?>
        </table>
    </div> <br>


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