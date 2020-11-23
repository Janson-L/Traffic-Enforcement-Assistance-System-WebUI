<?php

// Included aws/aws-sdk-php via Composer's autoloader
require 'vendor/autoload.php';
use Aws\S3\S3Client;

$client = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'frankfurt-1',
        'endpoint' => 'https://utem-traffic-enforcement-sytstem.fra1.digitaloceanspaces.com',
        'credentials' => [
                'key'    => 'JRSZSJZZSGM4GUEUTEJT',
                'secret' => 'ElYMKwuYSRygUy4zguSoNPkGvFrTCcf/rIkW4x46e8s ',
            ],
]);

$spaces = $client->listBuckets();
foreach ($spaces['Buckets'] as $space){
    echo $space['Name']."\n";
}

?>