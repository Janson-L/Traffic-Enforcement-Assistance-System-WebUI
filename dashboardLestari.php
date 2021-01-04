<?php
SESSION_START();
if (isset($_SESSION['StaffID']) && $_SESSION['Class'] == "2") {
  include "connection.php";
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Lestari Dashboard</title>
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
        </div>
        <h2>Lestari Dashboard</h2>
        <h3>View details of overparked vehicles in Lestari Residential College</h3>
      </div>
    </div>

    <div class="main-wrapper mx-auto">
      <?php

      $sql = "SELECT record.LicensePlate, camera.Location, record.EntryDateTime, HOUR(TIMEDIFF(record.EntryDateTime, ADDTIME(CURRENT_TIMESTAMP(), '08:00'))) AS overdue_by
      FROM record 
      INNER JOIN camera on record.CameraID=camera.CameraID
LEFT JOIN vehicle on record.LicensePlate=vehicle.LicensePlate
LEFT JOIN sticker ON vehicle.LicensePlate=sticker.LicensePlate
WHERE record.exitdatetime is null and (sticker.type is null or sticker.type=3)
and HOUR(TIMEDIFF(EntryDateTime,ADDTIME(CURRENT_TIMESTAMP(), '08:00')))>=8
      and Location='Lestari'";


      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo '<table class="centerthistable"> <tr><th>Number Plate</th><th>Location</th><th>Entry DateTime</th><th>Overdue by</th>';
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['LicensePlate'] . "</td>";
          echo "<td>" . $row['Location'] . "</td>";
          echo "<td>" . $row['EntryDateTime'] . "</td>";
          echo "<td>" . $row['overdue_by'] . " hours</td>";
        }
        echo '</table>';
      } else {
        echo "<div class='container-fluid text-center'>No vehicle that requires further action.</div>";
      }
      ?>
      <br>
      <div class="col-sm-12 text-center">
        <a href="dashboard.php" class="btn btn-primary">
          &larr; Back
        </a>
        <a href="dashboardLestari.php" class="btn btn-primary">
          Refresh
        </a>
      </div>
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