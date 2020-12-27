<?php
    include "../digitalocean/do-space-upload.php";
    doSpaceUploadb64uri($_POST['image'],$_POST['photoDirectory']);
?>
 <body onload="window.location.href ='../summonIssueSuccess.php';"> 
 </body>