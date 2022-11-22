<?php

include '../database/database.php';

if(isset($_GET['id'])){

$id = [];
$id = $_GET['id'];
$video_name = $_GET['video_name'];

    $query = mysqli_query($con,"SELECT * FROM video WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    }

    mysqli_query($con,"DELETE FROM video WHERE id = '$id'");
    mysqli_query($con,"DELETE FROM playlist_video WHERE videojojo_id = '$id'");
    mysqli_query($con,"DELETE FROM reference WHERE videojojo_id = '$id'");

    echo "<script>alert('Successfull Delete')</script>";
    header('location: /v4/admin/content.php?id='.$video_name);  

}

?>


