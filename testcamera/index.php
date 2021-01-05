<!DOCTYPE html>

<html>

<head>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="/Traffic-Enforcement-Assistance-System/js/webcam.js"></script>

    <style type="text/css">

        #results { padding:20px; border:1px solid; background:#ccc; }

    </style>

</head>

<body>

  

<div class="container">
    <form method="POST" action="<?php 
        if ($photoDirectory !== 'api'){
            echo "/Traffic-Enforcement-Assistance-System/testcamera/storeImage.php";
        }
        else{
            echo"/Traffic-Enforcement-Assistance-System/confirmLicensePlate.php";
        }
    ?>">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button class="btn btn-default" value="Take a Photo" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
                <input type="text" name="photoDirectory" value="<?php echo $photoDirectory?>" style="display:none">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center form-group">
                <br/>
                <button id="postBtn" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

  

<!-- Configure a few settings and attach camera -->

<script language="JavaScript">
    Webcam.set({
        width: 500,
        height: 400,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
    
    Webcam.on("init", function () {
        Webcam.getCameras(function (cameras) {
          if (cameras.length > 0) {
            Webcam.setAndInitCamera(cameras[cameras.length - 1].id);
          }
        });
      });
    Webcam.attach( '#my_camera' );

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
</body>
</html>