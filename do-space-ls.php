<?php

include "do-space-connection.php";


$objects = $client->listObjectsV2([
    'Bucket' => $bucketName,
]);

foreach ($objects['Contents'] as $obj){
    echo $obj['Key']."\n";
}
?>