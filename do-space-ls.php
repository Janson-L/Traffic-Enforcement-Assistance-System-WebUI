<?php
//Diagnostic script. To view whether the file is uploaded to the DO Space
include "do-space-connection.php";


$objects = $client->listObjectsV2([
    'Bucket' => $bucketName,
]);

foreach ($objects['Contents'] as $obj){
    echo $obj['Key']."\n";
}
?>