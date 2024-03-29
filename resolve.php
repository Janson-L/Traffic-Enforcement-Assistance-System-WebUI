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
    <title>Resolve Overparked Vehicle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <?php 
    include "navbar-footer/navbar.php"; 
    ?>
    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-12 text-center">
          <!--    Letak gambar dekat sini  -->
          <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
          <h2>Resolve Overparked Vehicle</h2>
          <h3>Take action on Overparked Vehicles</h3>
        </div>
      </div>
    </div>
    <br>
    <div class="row form-group">
      <div class="col-sm-6 col-xs-12 text-center" style="border-style:solid; width:20%; left:20%;">
      <h3><a href="resolveSatria.php">Satria</a></h3>
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
    <div class="col-sm-6 col-xs-12 text-center" style="border-style:solid; width:20%; left:40%;">
      <h3><a href="resolveLestari.php">Lestari</a></h3>
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
    </div>
    <div class="form-group text-center">
      <a href="resolve.php" class="btn btn-primary">
        Refresh
      </a>
    </div>
    <div class="form-group text-center">
      <a href="EaR.php" class="btn btn-primary">
        &larr; Back
      </a>
    </div>

  </html>
  <?php
  mysqli_stmt_close($stmt);
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