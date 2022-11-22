<?php include '../database/database.php';

if (isset($_GET['id'])) {

$id = [];
$id = $_GET['id'];

    $Activate = "Activate";
    $active = "1";
    $inactive = "0";

    $query = mysqli_query($con,"SELECT * FROM playlist_video WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {
    
     $playlistname = $row['site_name'];
     $video_id = $row['videojojo_id'];

    }

    mysqli_query($con,"UPDATE playlist_video SET video_status = '$Activate' WHERE id = '$id'");
    mysqli_query($con,"UPDATE playlist_video SET active = '$active' WHERE id = '$id'");
    mysqli_query($con,"UPDATE playlist_video SET inactive = '$inactive' WHERE id = '$id'");     

    mysqli_query($con,"UPDATE reference SET video_status = '$Activate' WHERE site_name = '$playlistname' AND videojojo_id = '$video_id'");

    echo "<script>alert('Successfull Inactivate')</script>";
    header('location: /v4/admin/playlist.php?id='.$playlistname); 

    }
?>


