<?php
session_start();

if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "1") {

?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Officer Landing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/navbar.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/connection.php";

    $staffID = $_SESSION['StaffID'];

    $query = "SELECT `Name` FROM `staff` WHERE `StaffID`=?";
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $query) or die("Query Preparation Failed");
    mysqli_stmt_bind_param($stmt, "s", $staffID);
    mysqli_stmt_execute($stmt) or die("Query Failed");
    mysqli_stmt_bind_result($stmt, $staffName);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    ?>

    <div class="container-fluid text-center">
      <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
      <h2>Officer Landing Page</h2>
      <h3>Landing page for Officer.</h3>
      <h4>Welcome back <b><?php echo $staffName; ?></h4>
      <br><br>
          <div class="form-group">
            <a href="EaR.php" class="btn btn-default">
              Enforcement and Resolution
            </a>
          </div>
          <div class="form-group">
            <a href="profileManagement.php" class="btn btn-default">
              Profile Management
            </a>
          </div>


    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/footer.php" ?>
  </body>

  </html>

<?php
} else {
  include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/nopermission.php";
  header("location: login.php");
  die();
}
?>