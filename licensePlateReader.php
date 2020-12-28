<?php
function getLicensePlate($b64uri){
    $b64 = str_replace("data:image/jpeg;base64,","",$b64uri);;
    $url='http://138.68.103.88:5000';
    $data=array(
        "img"      =>"\"".$b64."\""
    );

    $options = array(
        'http' => array(
          'method'  => 'POST',
          'content' => json_encode( $data ),
          'header'=>  "Content-Type: application/json"
          )
      );
      
      $context  = stream_context_create( $options );
      $result = file_get_contents( $url, false, $context );
      $response = json_decode( $result );

      return $response->LicensePlateNumber;
}

?>
