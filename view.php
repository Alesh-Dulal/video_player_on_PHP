<?php
include 'connect.php';
?>

<!DOCTYPE Html>
<html>
    <head>
        <title> PHP MOVE FILE </title>
        <link href="http://vjs.zencdn.net/5.19.2/video-js.css" rel="stylesheet"><
        <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    </head>
    <body>
    <div id="playerbox">
        <?php
            $video = $_GET['video'];
        ?> 
    <video id="my-video" class="video-js" controls preload="auto" width="100%" height="450" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
        <source src="videos/<?php echo "$video";?>" type='video/mp4'>
    </video> 
  </div>    
    </body>
</html>