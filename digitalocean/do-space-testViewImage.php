<?php
include 'do-space-getPresignedLink.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML img Tag</title>
</head>
<body>
    <img src="<?php echo(getImageLink(''));?>" alt="Image" width="150" height="200">
</body>
</html>