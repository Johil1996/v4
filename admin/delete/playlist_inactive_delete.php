<?php

include '../database/database.php';

if(isset($_GET['id'])){

$id = $_GET['id'];
$videojojo_id = $_GET['videojojo_id'];

    $sql = "SELECT * FROM playlist_video WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $playlistname = $row['site_name'];
    }

    mysqli_query($con,"DELETE FROM playlist_video WHERE id = '$id'");
    mysqli_query($con,"DELETE FROM reference WHERE videojojo_id = '$videojojo_id'");

    echo "<script>alert('Successfull Delete')</script>";
    header('location: /v4/admin/playlist.php?id='.$playlistname);  

}

?>
