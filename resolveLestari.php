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
    <title>Resolve Lestari</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "navbar-footer/navbarCommander.php" ?>
<div class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-12 text-center">
          <!--    Letak gambar dekat sini  -->
          <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
          <h2>Resolve Overparked Vehicle</h2>
          <h3>Select a vehicle to take action upon</h3>
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
        and Location='Lestari'";


      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo '<table class="centerthistable">';
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><th>";
          echo "<td>" . $row['LicensePlate'] . "</td>";
          echo "<td>" . $row['Location'] . "</td>";
          echo "<td>" . $row['EntryDateTime'] . "</td>";
          echo "<td>" . $row['overdue_by'] . " hours</td>";
          echo "</td>";
          $_SESSION['ResolutionOrigin'] = 'Lestari';
          ?>
            <td>
                <form method='POST' action='resolveSelection.php'>
                    <input type="text" name="LicensePlate" value="<?php echo $row['LicensePlate']; ?>" style="display:none">
                    <input type="text" name="Location" value="<?php echo $row['Location']; ?>" style="display:none">
                    <input type="text" name="EntryDateTime" value="<?php echo $row['EntryDateTime']; ?>" style="display:none">
                    <input type="submit" name="resolveSelection" class="form-control"  value="Resolve">
                </form>
            </td>
          <?php
        }
        echo '</table>';
      }
      else{
        echo"<div class='container-fluid text-center'>No vehicle that requires further action.</div>";
      }
      ?>
      <br>

    </div>

    <div class="col-sm-12 text-center">
      <a href="resolve.php" class="btn btn-primary">
        &larr; Back
      </a>
      <a href="resolveLestari.php" class="btn btn-primary">
        Refresh
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