<?php

// Included aws/aws-sdk-php via Composer's autoloader
require 'vendor/autoload.php';
use Aws\S3\S3Client;

$bucketName='utem-traffic-enforcement-sytstem';
$key='JRSZSJZZSGM4GUEUTEJT';

$client = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'frankfurt-1',
        'endpoint' => 'https://fra1.digitaloceanspaces.com',
        'credentials' => [
                'key'    => $key,
                'secret' => 'ElYMKwuYSRygUy4zguSoNPkGvFrTCcf/rIkW4x46e8s ',
            ],
]);

/* $objects = $client->listObjects([
    'Bucket' => 'utem-traffic-enforcement-sytstem',
]);

foreach ($objects['Contents'] as $obj){
    echo $obj['Key']."\n";
} */
?>