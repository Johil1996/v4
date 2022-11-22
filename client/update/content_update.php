
<?php 

include '../database/database.php';

if (isset($_POST['save'])) {

mysqli_query($con,"UPDATE video SET 

	id = '" .  $_POST['id'] . "',	
	video ='" .  $_POST['video'] . "', 
	video_name ='" . $_POST['video_name'] . "', 
	duration ='" . $_POST['duration'] . "' ,
	spots ='" . $_POST['spots'] . "' ,	
	category ='" . $_POST['category'] . "' ,
	name = '" . $_POST['name'] . "' ,
	video_spots_no_yes = '" . $_POST['video_spots_no_yes'] . "'  WHERE id = '" . $_POST['id'] . "'");


mysqli_query($con,"UPDATE playlist_video SET 

	videojojo_id = '" .  $_POST['id'] . "',	
	video = '" .  $_POST['video'] . "', 
	video_name = '" . $_POST['video_name'] . "'  WHERE videojojo_id = '" . $_POST['id'] . "'");


mysqli_query($con,"UPDATE reference SET 

	videojojo_id = '" .  $_POST['id'] . "',	
	video = '" .  $_POST['video'] . "', 
	video_name = '" . $_POST['video_name'] . "'  WHERE videojojo_id = '" . $_POST['id'] . "'");

}

   echo "<script>alert('Successfull Update')</script>";
   echo "<script>window.location = '/v4/client/content.php'</script>"; 

?>


