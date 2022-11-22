<?php

    include '../database/database.php';

    if(ISSET($_POST['save'])){

  // changing the upload limits
   ini_set('upload_max_filesize', '3000M');
   ini_set('post_max_size', '3000M');
   ini_set('max_input_time', 300);
   ini_set('max_execution_time', 600);

        $video_name = $_POST['video_name'];     
        $duration = $_POST['duration'];
        $category = $_POST['category'];
        $status = $_POST['status'];

$fileName = $_FILES["video"]["name"]; // The file name
$fileTmpLoc = $_FILES["video"]["tmp_name"]; // File in the PHP tmp folder
$fileSize = $_FILES["video"]["size"]; // File size in bytes

        if($fileSize){
         $file = explode('.', $fileName);
            $end = end($file);
            $allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4', 'mkv');
            if(in_array($end, $allowed_ext)){
                
                $video = 'video/'.$video_name.".".$end;

if(move_uploaded_file($fileTmpLoc, $video)){
    
mysqli_query($con, "INSERT INTO video (video, video_name, duration, category, status)
 VALUES ('$video', '$video_name', '$duration', '$category', '$status' )");


                    echo "<script>alert('Successfull upload video')</script>";
                    echo "<script>window.location = '/v4/site_partner/content.php'</script>";
                }
            }else{
                echo "<script>alert('Wrong video format')</script>";
                echo "<script>window.location = 'add/client/content_add.php'</script>";
            }
        }else{
            echo "<script>alert('File too large to upload')</script>";
            echo "<script>window.location = 'add/client/content_add.php'</script>";
        }
    }


?>


