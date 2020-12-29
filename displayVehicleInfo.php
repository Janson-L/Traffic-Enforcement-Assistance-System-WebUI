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


        $licensePlate = mysqli_real_escape_string($con, $_POST['LicensePlate']);

        $query = "SELECT vehicle.licensePlate,vehicle.staffID,vehicle.studentID,sticker.stickerID,sticker.type,student.name as studentName,staff.name as staffName
        FROM `vehicle` 
        INNER JOIN sticker ON vehicle.LicensePlate=sticker.LicensePlate
        LEFT JOIN staff ON vehicle.StaffID = staff.StaffID
        LEFT JOIN student ON vehicle.StudentID = student.StudentID
        WHERE vehicle.LicensePlate='$licensePlate'";
        $result = mysqli_query($con, $query);
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
                        echo '<table class="centerthistable">';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>License Plate Number:</td><td>" . $row['licensePlate'] . "</td></tr>";
                            echo  "<tr><td>Sticker ID:</td><td>" . $row['stickerID'] . "</td></tr>";

                            if ($row['type'] == 1) {
                                $stickerType = 'Staff';
                            } elseif ($row['type'] == 2) {
                                $stickerType = 'Inside Student';
                            } elseif ($row['type'] == 3) {
                                $stickerType = 'Outside Student';
                            }

                            echo  "<tr><td>Sticker Type:</td><td>" . $stickerType . "</td></tr>";
                            if (is_null($row['studentID'])) {
                                echo "<tr><td>Staff ID:</td><td>" . $row['staffID'] . "</td></tr>";
                                echo "<tr><td>Staff Name:</td><td>" . $row['staffName'] . "</td></tr>";
                            } else {
                                echo "<tr><td>Student ID:</td><td>" . $row['studentID'] . "</td></tr>";
                                echo "<tr><td>Student Name:</td><td>" . $row['studentName'] . "</td></tr>";
                            }
                        }
                        echo '</table>';

                    ?>
                        <br>
                        <form method='POST' action='resolveWithSummon.php'>
                            <input type="text" name="LicensePlate" value="<?php echo $_POST['LicensePlate']; ?>" style="display:none">
                            <select name='offenseID' class="form-control">
                                <option value="1" selected>Sticker Misuse</option>
                                <option value="2">Illegal Parking</option>
                            </select>
                            <br>
                            <input type="submit" id='summonBtn' name="resolveWithSummon" class="btn btn-primary" value="Summon">
                        </form>

                    <?php
                    } else {
                        echo "<div class='container-fluid text-center'>Not a registered vehicle</div>";
                    }

                    ?>
                    <br>
                    <div class="row">
                        <a href="/Traffic-Enforcement-Assistance-System/scanNumberPlate.php" class="btn btn-primary">
                            Back
                        </a>
                    </div>
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