<?php
    $uploadImage='C:\Users\Janson Liew\Desktop\Test Car Cropped.jpg';
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $currentDateTime=date('Y-m-d_H:i:s');
    $summonID=1;
    
    $client->putObject([
        'Bucket' => $bucketName,
        //'Key'    => 'offence-images/' .basename($uploadImage),
        'Key'    => 'offence-images/'.$summonID.'_'.$currentDateTime,
        //'Body'   => 'The contents of the file.', //used when you want to use body to upload the file
        'SourceFile'=>$uploadImage, //when you want to upload using the specified directory 
        'ACL'    => 'private'
    ]);
?>