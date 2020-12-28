<?php
SESSION_START();
if (isset($_SESSION['StaffID'])) {
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

<?php
    if($_POST['photoDirectory']!=='api'){    
        ?>
        <body onload="window.location.href ='../summonIssueSuccess.php';"> 
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!--    Letak gambar dekat sini  -->
                        <img src="image/Logo_Polis_Bantuan-01.png" style="height:100px;width: auto;margin: 0 auto;display: block;">
                        <h3>Processing Image, please wait patiently.</h3>
                    </div>
                </div>
            </div>
            
            <?php 
                include "../navbar-footer/navbarCommander.php";
                include "../navbar-footer/footer.php";
                include "../digitalocean/do-space-upload.php";
                doSpaceUploadb64uri($_POST['image'],$_POST['photoDirectory']);
            ?>
        </body>
        <?php
    }
    else{
        $b64 = str_replace("data:image/jpeg;base64,","",$_POST['image']);;
        echo $b64;
    }
?>

<?php
} else {
    include "nopermission.php";
}
?>