<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
    include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display Vehicle Info</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/navbarCommander.php";

        $licensePlate = $_POST['licensePlate'];

        $query = 'SELECT vehicle.licensePlate,vehicle.staffID,vehicle.studentID,sticker.StickerID,sticker.type 
        FROM `vehicle` 
        INNER JOIN sticker ON vehicle.LicensePlate=sticker.LicensePlate
        WHERE vehicle.LicensePlate=?';
         $result = mysqli_query($con, $sql);
        ?>


        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <!--    Letak gambar dekat sini  -->
                    <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                    <h2>Display Vehicle Info</h2>
                    <h3>Brief Summary of the Vehicle</h3>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="centerthistable"> <tr><th>Number Plate</th><th>Location</th><th>Entry DateTime</th><th>Overdue by</th>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['LicensePlate'] . "</td>";
                            echo "<td>" . $row['Location'] . "</td>";
                            echo "<td>" . $row['EntryDateTime'] . "</td>";
                            echo "<td>" . $row['overdue_by'] . " hours</td>";
                            $_SESSION['ResolutionOrigin'] = 'Lestari';
                    ?>
                            <td>
                                <form method='POST' action='resolveSelection.php'>
                                    <input type="text" name="LicensePlate" value="<?php echo $row['LicensePlate']; ?>" style="display:none">
                                    <input type="text" name="Location" value="<?php echo $row['Location']; ?>" style="display:none">
                                    <input type="text" name="EntryDateTime" value="<?php echo $row['EntryDateTime']; ?>" style="display:none">
                                    <input type="submit" name="resolveSelection" class="form-control" value="Resolve">
                                </form>
                            </td>
                    <?php
                        }
                        echo '</table>';
                    } else {
                        echo "<div class='container-fluid text-center'>Not a registered vehicle</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        mysqli_close($con);
        include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/navbar-footer/footer.php"
        ?>
    </body>

    </html>

<?php
} else {
    include $_SERVER['DOCUMENT_ROOT'] . "/Traffic-Enforcement-Assistance-System/nopermission.php";
}
?>