<?php
if(isset($_POST['video_data'])) {
    $video_data = base64_decode($_POST['video_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
        }
        #video-container {
            text-align: center;
        }
        video {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video width="640" height="360" controls>
            <source src="data:video/mp4;base64,<?php echo base64_encode($video_data); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</body>
</html>
<?php
} else {
    // Handle jika data tidak ditemukan
    echo "Data file video tidak ditemukan.";
}
?>
