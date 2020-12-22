<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include "navbar.php"; ?>
    <?php
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
    <!-- start dekat sini i edit-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <!--    Letak gambar dekat sini  -->
                <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                <h2>User Management</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row col-sm-6">
            <form class="form-inline" method='POST'>
                <div class="form-group">
                    <label>Search Type:</label>
                    <select name='searchType' required>
                        <option <?php if ($searchType == "staffNameSearch") echo 'selected="selected"'; ?>value='staffNameSearch'>Search by user name</option>
                        <option <?php if ($searchType == "staffIDSearch") echo 'selected="selected"'; ?>value='staffIDSearch'>Search by userID</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name='searchQuery' value='<?php echo $searchQuery ?>' required pattern="^[A-Za-z \/@]{1,50}$" maxlength="30">
                </div>
                <button type="submit" class="btn btn-default" name="search">Search</button>
            </form>
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

<?php
        if ($searchTable == 0) { ?>
            <h3>Show All</h3>
        <?php } else if ($searchTable == 1) { ?>
        <h3>Search by Staff ID</h3>
    <?php } else if ($searchTable == 2) { ?>
        <h3>Search by Staff Name</h3>
    <?php } ?>
    <?php
        if($searchTable==0)
        {
            $query="SELECT studentID AS userID, name, matrixNo, phoneNo,loginAttempt, accountStatus FROM student UNION
            SELECT tutorID, name, matrixNo, phoneNo,loginAttempt, accountStatus FROM tutor;";
        }
      
        if (isset($_POST['search'])) {
            
            if ($searchTable == 1) {
                $query = "SELECT studentID AS userID, name, matrixNo, phoneNo,loginAttempt, accountStatus FROM student WHERE studentID='$searchQuery' UNION
                SELECT tutorID, name, matrixNo, phoneNo,loginAttempt, accountStatus FROM tutor WHERE tutorID='$searchQuery';";
            } else if ($searchTable == 2) {
                $query = "SELECT studentID AS userID, name, matrixNo, phoneNo,loginAttempt, accountStatus FROM student WHERE name LIKE'%$searchQuery%' UNION
                SELECT tutorID, name, matrixNo, phoneNo,loginAttempt, accountStatus FROM tutor WHERE name LIKE'%$searchQuery%';";
            }
        }
            $result = mysqli_query($con, $query) or die("Query Failed");
            if (mysqli_num_rows($result) > 0) {
                $currentDate = date('Y-m-d', time());
                $currentTime = date('His', time());
                $currentTime += "070000";
                ?>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Matrix No</th>
                    <th>Phone No</th>
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
                    <td><?php echo $row['userID']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['matrixNo']; ?></td>
                    <td><?php echo $row['phoneNo']; ?></td>
                    <td><?php echo $row['loginAttempt']; ?></td>
                    <td><?php echo $row['accountStatus']; ?></td>
                    <td>
                        <form method='POST' action='admEditUser.php'>
                            <input type="text" name="userID" value="<?php echo $row['userID']; ?>" style="display:none">
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" style="display:none">
                            <input type="text" name="matrixNo" value="<?php echo $row['matrixNo']; ?>" style="display:none">
                            <input type="text" name="phoneNo" value="<?php echo $row['phoneNo']; ?>" style="display:none">
                            <input type="text" name="loginAttempt" value="<?php echo $row['loginAttempt']; ?>" style="display:none">
                            <input type="text" name="accountStatus" value="<?php echo $row['accountStatus']; ?>" style="display:none">
                            <input type="submit" name="editUser" value="Edit User">
                        </form>
                    </td>
                    <td>
                        <form method='POST' action='admResetPassword.php'>
                            <input type="text" name="userID" value="<?php echo $row['userID']; ?>" style="display:none">
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" style="display:none">
                            <input type="text" name="matrixNo" value="<?php echo $row['matrixNo']; ?>" style="display:none">
                            <input type="text" name="phoneNo" value="<?php echo $row['phoneNo']; ?>" style="display:none">
                            <input type="text" name="password" value="<?php echo $row['password']; ?>" style="display:none">
                            <input type="text" name="loginAttempt" value="<?php echo $row['loginAttempt']; ?>" style="display:none">
                            <input type="text" name="accountStatus" value="<?php echo $row['accountStatus']; ?>" style="display:none">
                            <input type="submit" name="resetPassword" value="Reset Password">
                        </form>
                    </td>
                    <td>
                        <form method='POST' action='admDeleteUser.php'>
                            <input type="text" name="userID" value="<?php echo $row['userID']; ?>" style="display:none">
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" style="display:none">
                            <input type="text" name="matrixNo" value="<?php echo $row['matrixNo']; ?>" style="display:none">
                            <input type="text" name="phoneNo" value="<?php echo $row['phoneNo']; ?>" style="display:none">
                            <input type="text" name="loginAttempt" value="<?php echo $row['loginAttempt']; ?>" style="display:none">
                            <input type="text" name="accountStatus" value="<?php echo $row['accountStatus']; ?>" style="display:none">
                            <input type="submit" name="deleteUser" value="Delete User">
                        </form>
                    </td>
                </tr>
        <?php }
             ?>
            </table>
            </div> <br>

            <?php
                mysqli_close($con);
                ?>

    <?php include "footer.php"; ?>
</body>

</html>