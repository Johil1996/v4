<?php

include '../database/database.php';

if(ISSET($_POST['save'])) {


// site add // 

        $site_name = $_POST['site_name'];   
        $site_location = $_POST['site_location'];  
        $address = $_POST['address'];   
        $site_category = $_POST['site_category'];
        $site_tags = $_POST['site_tags'];
        $site_kit = $_POST['site_kit'];


mysqli_query($con, "INSERT INTO site (site_name, site_location, site_category, site_kit, address, site_tags)

                                  VALUES ('$site_name', '$site_location', '$site_category', '$site_kit', '$address', '$site_tags')");

    }

   echo "<script>alert('Successfull Add Site')</script>";
   echo "<script>window.location = '/v4/admin/index.php'</script>"; 

?>


