<?php
    function getImageLink($fileName){
        include '../digitalocean/do-space-connection.php';

        $cmd =$client->getCommand('GetObject', [
            'Bucket' => $bucketName,
            'Key'    => 'offence-images/'.$fileName
        ]);

        $request = $client->createPresignedRequest($cmd, '+5 minutes');
        $presignedUrl = (string) $request->getUri();
        return $presignedUrl;
    }
?>