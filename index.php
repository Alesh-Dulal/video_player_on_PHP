<?php
include 'connect.php';
?>

<!DOCTYPE Html>
<html>
    <head>
        <title> PHP MOVE FILE </title>
    </head>
    <body>
    <div id="box">
    	<form method="post" enctype="multipart/form-data">
    	<?php

if(isset($_POST['moveFile'])){

    $fileName = $_FILES['fileName']['name'];
    $type = explode('.',$fileName);
	$type = end($type);
	$randomName = rand();
    $tempName = $_FILES['fileName']['tmp_name'];


    
    if(isset($fileName)){
        if($type != 'mp4' && $type != 'MP4' && $type != 'flv'){
        	$mes = "Format not supported";
        }else{
        	$location = "videos/";
        	move_uploaded_file($tempName, $location.$randomName.'.'.$type);
        	mysqli_query($con,"INSERT INTO `video` (`id`, `name`, `url`) VALUES ('', '$fileName', '$randomName.$type');");
        	$mes = 'File Uploaded';
        	}
            
        }
        echo "$mes<br/><br/>";
    }

?>
            Select Video::<br>
            <input type="file" name="fileName"><br><br>
            <input type="submit" name="moveFile" value="Upload">
        </form>
    </div> 
    <div id="box">
    	<?php
    		$query = mysqli_query($con,"SELECT `id`, `name`, `url` FROM `video`");
    		while ($run = mysqli_fetch_array($query)) {
    			$video_id = $run['id'];
    			$video_name = $run['name'];
    			$video_url = $run['url'];
    		
    		?>

    		<a href='view.php?video=<?php echo $video_url;?>'>
	    		<div id="url">
	    			<?php echo "$video_name"; ?>
	    		</div>
    		</a>

    		<?php
    		}
    	?>
    </div>       
    </body>
</html>