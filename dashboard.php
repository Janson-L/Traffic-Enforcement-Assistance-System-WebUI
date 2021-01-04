<?php
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
  include "connection.php";
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Dashboard</title>
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
    ?>
    <!-- start dekat sini i edit-->

    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-12 text-center">
          <!--    Letak gambar dekat sini  -->
          <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
          <h2>Dashboard</h2>
          <h3>View details of overparked vehicles in an area</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-6 text-center" style="border-style:solid; width:20%; left:20%;">
      <h3><a href="dashboardSatria.php">Satria</a></h3>
      <h2>
        <?php
        $Location = "Satria";

        $sql = "SELECT count(camera.location)
        FROM record 
      INNER JOIN camera on record.CameraID=camera.CameraID
LEFT JOIN vehicle on record.LicensePlate=vehicle.LicensePlate
LEFT JOIN sticker ON vehicle.LicensePlate=sticker.LicensePlate
WHERE record.exitdatetime is null and (sticker.type is null or sticker.type=3)
and HOUR(TIMEDIFF(EntryDateTime,ADDTIME(CURRENT_TIMESTAMP(), '08:00')))>=8
      and Location=?";
        $stmt = mysqli_stmt_init($con);
        if (!(mysqli_stmt_prepare($stmt, $sql))) {
          echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        } else {
          if (!(mysqli_stmt_bind_param($stmt, "s", $Location))) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
          } else {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $result);
            while (mysqli_stmt_fetch($stmt)) {
              echo $result;
            }
          }
        }

        ?></h2>


    </div>
    <div class="col-sm-6 text-center" style="border-style:solid; width:20%; left:40%;">
      <h3><a href="dashboardLestari.php">Lestari</a></h3>
      <h2><?php
          $Location = "Lestari";
          if (!(mysqli_stmt_prepare($stmt, $sql))) {
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
          } else {
            if (!(mysqli_stmt_bind_param($stmt, "s", $Location))) {
              echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            } else {
              mysqli_stmt_execute($stmt);
              mysqli_stmt_bind_result($stmt, $result);
              while (mysqli_stmt_fetch($stmt)) {
                echo $result;
              }
            }
          }
          ?>
      </h2>
    </div>

    <div class="col-sm-12 text-center">
      <a href="dashboard.php" class="btn btn-primary">
        Refresh
      </a>
    </div>


    <!--Finish here-->
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