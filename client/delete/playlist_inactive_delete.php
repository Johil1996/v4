<?php include '../database/database.php';

if(isset($_GET['id'])){

$id = [];    
$id = $_GET['id'];

    $query = mysqli_query($con,"SELECT * FROM playlist_video WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {
    
     $playlistname = $row['site_name'];
     $video_id = $row['videojojo_id'];

    }
  
    mysqli_query($con,"DELETE FROM playlist_video WHERE id = '$id'");
    mysqli_query($con,"DELETE FROM reference WHERE videojojo_id = '$video_id'");

    echo "<script>alert('Successfull Activate')</script>";
    header('location: /v4/client/playlist.php?id='.$playlistname);  

    }
?>






