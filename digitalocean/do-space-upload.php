<?php
    function doSpaceUploadb64uri($base64uri,$photoDirectory){

        include "../digitalocean/do-space-connection.php";
        //this script need to be modified to receive images from a HTML form. 
        //The image will be passed to this script via POST and uploaded to DO
        
        // $uploadImage='C:\Users\Janson Liew\Desktop\Test Car Cropped.jpg'; //For diagnostics purposes only, will need to be commented
        // date_default_timezone_set('Asia/Kuala_Lumpur');
        // $currentDateTime=date('Y-m-d_H:i:s');
        // $summonID = 1; 
        //$uploadImage=base64_decode(end(explode(",", $base64uri))); baseurl.replace('JPEGxxxxx,','');
        $output_file = './temp.jpg';
        file_put_contents($output_file, file_get_contents($base64uri));

        $client->putObject([
            'Bucket' => $bucketName,
            //'Key'    => 'offence-images/' .basename($uploadImage),
            'Key'    => 'offence-images/'.$photoDirectory,
            //'Body'   => 'The contents of the file.', //The image from the form should go to here.  
            'SourceFile'=>$output_file, //For diagnostics purposes only, will need to be commented
            'ACL'    => 'private'
            ]);
        }
?>