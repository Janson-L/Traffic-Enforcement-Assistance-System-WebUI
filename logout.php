<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logout</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
    SESSION_START();
    $_SESSION=array();
    session_destroy();
    ?>
    <br>
    <div class="container alert alert-success text-center" role="alert">You are logged out. You will be redirected back to login page in 3 seconds.</div>
    <?php
    header("Refresh:3;URL=login.php");
    die();
?>