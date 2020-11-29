<?php
    $client->putObject([
        'Bucket' => $bucketName,
        'Key'    => $key,
        //'Body'   => 'The contents of the file.', //used when you want to use body to upload the file
        'SourceFile'=>'C:\Users\Janson Liew\Desktop\Test Car Cropped.jpg', //when you want to upload using the specified directory 
        'ACL'    => 'private'
    ]);
?>