<?php
include '../digitalocean/do-space-getPresignedLink.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML img Tag</title>
</head>
<body>
    <?php
        $link=getImageLink('1_2020-12-27_21:15:10.png');
        echo $link;
    ?>
    <img src="<?php echo $link;?>" alt="Image" width="150" height="200">
</body>
</html>