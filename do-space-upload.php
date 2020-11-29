<?php
    $client->putObject([
        'Bucket' => $bucketName,
        'Key'    => $key,
        'Body'   => 'interface.html',
        //'SourceFile'=>'',
        'ACL'    => 'private'
    ]);
?>