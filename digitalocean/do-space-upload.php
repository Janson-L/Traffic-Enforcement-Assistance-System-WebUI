<?php
    function doSpaceUpload($base64uri){

        include "digitalocean/do-space-connection.php";
        //this script need to be modified to receive images from a HTML form. 
        //The image will be passed to this script via POST and uploaded to DO
        
        // $uploadImage='C:\Users\Janson Liew\Desktop\Test Car Cropped.jpg'; //For diagnostics purposes only, will need to be commented
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentDateTime=date('Y-m-d_H:i:s');
        $summonID=1; 
        $uploadImage=base64_decode(end(explode(",", $base64uri)));
        
        $client->putObject([
            'Bucket' => $bucketName,
            //'Key'    => 'offence-images/' .basename($uploadImage),
            'Key'    => 'offence-images/'.$summonID.'_'.$currentDateTime.'.png',
            //'Body'   => 'The contents of the file.', //The image from the form should go to here.  
            'SourceFile'=>$uploadImage, //For diagnostics purposes only, will need to be commented
            'ACL'    => 'private'
            ]);
        }
?>