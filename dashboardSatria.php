<?php
include "connection.php";
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Satria Dashboard</title>
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
    ?>

    <!-- start dekat sini i edit-->

    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-12 text-center">
          <!--    Letak gambar dekat sini  -->
          <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
        </div>
      </div>
    </div>

    <div class="main-wrapper mx-auto">
      <?php

      $sql = "SELECT record.LicensePlate, camera.Location, record.EntryDateTime, HOUR(TIMEDIFF(record.EntryDateTime, ADDTIME(CURRENT_TIMESTAMP(), '08:00'))) AS overdue_by
        FROM ((record 
LEFT JOIN camera ON camera.CameraID = record.CameraID)
LEFT JOIN sticker
ON record.licenseplate = sticker.LicensePlate)
LEFT JOIN summon
ON record.LicensePlate=summon.LicensePlate
WHERE record.exitdatetime is null and (sticker.type is null or sticker.type=3)
and HOUR(TIMEDIFF(EntryDateTime,ADDTIME(CURRENT_TIMESTAMP(), '08:00')))>=8
and (summon.SummonID is null or summon.OffenseID!=2)
        and Location='Satria'";


      $result = mysqli_query($con, $sql);
      echo '<table class="centerthistable"> <tr><th>Number Plate</th><th>Location</th><th>Entry DateTime</th><th>Overdue by</th>';
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['LicensePlate'] . "</td>";
          echo "<td>" . $row['Location'] . "</td>";
          echo "<td>" . $row['EntryDateTime'] . "</td>";
          echo "<td>" . $row['overdue_by'] . " hours</td>";
        }
      }
      echo '</table>';
      ?>
      <br>

    </div>

    <div class="col-sm-12 text-center">
      <a href="dashboard.php" class="btn btn-primary">
        &larr; Back
      </a>
    </div>

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