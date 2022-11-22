<?php
  
 include 'database/database.php';
 
  session_start();
    
  $site = "GP Nagata - Hallway";
  $active = "Activate";

  $queryStatus = "SELECT * FROM site WHERE site_name='$site'";
  $resultStatus = mysqli_query($con, $queryStatus);
  while ($row = mysqli_fetch_assoc($resultStatus)) {


$time = time();

  $_SESSION['id'] = $row['id'];

  if (isset($_SESSION['id'])) {
    mysqli_query($con, "UPDATE site SET site_status_end = '$time' WHERE id ='".$_SESSION['id']."'");
  } 

}

?>

