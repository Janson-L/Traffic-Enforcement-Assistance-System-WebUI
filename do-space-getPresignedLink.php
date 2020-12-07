<?php
    function getImageLink($filename){
        include 'do-space-connection.php';
        $fileName='1_2020-11-29_18:34:09'; //file name should be passed when calling the Function. Remove this line during production.

        $cmd =$client->getCommand('GetObject', [
            'Bucket' => $bucketName,
            'Key'    => 'offence-images/'.$fileName
        ]);

        $request = $client->createPresignedRequest($cmd, '+5 minutes');
        $presignedUrl = (string) $request->getUri();
        
        return $presignedUrl;
    }
?>