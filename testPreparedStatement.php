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
    <title>Resolve Satria</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "navbar-footer/navbarCommander.php" ?>
<?php
    $query = 'SELECT `SummonID`,`SummonDateTime`
    FROM summon ORDER BY `SummonID` DESC LIMIT 1';
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $summonID,$summonDateTime);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    $summonDateTime= str_replace(" ","_",$summonDateTime);
    echo $summonID."<br>".$summonDateTime;

    include "navbar-footer/footer.php"
    ?>
    </body>
    
    </html>

<?php
} else {
    include "nopermission.php";
}
?>