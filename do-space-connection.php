<?php
//This script will need to be included in every php script that requires connection to DO Space


// Included aws/aws-sdk-php via Composer's autoloader
require 'vendor/autoload.php';
use Aws\S3\S3Client;

$bucketName='utem-traffic-enforcement-sytstem';

$client = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'frankfurt-1',
        'endpoint' => 'https://fra1.digitaloceanspaces.com',
        'credentials' => [
                'key'    => 'JRSZSJZZSGM4GUEUTEJT',
                'secret' => 'ElYMKwuYSRygUy4zguSoNPkGvFrTCcf/rIkW4x46e8s ',
            ],
]);
?>