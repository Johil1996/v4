<?php

    if (isset($_POST['search'])) {
        include 'database/database.php';
        
        $content = $_POST['content'];
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

    if ($startdate == "" || $enddate == "") {
        ?>
        
        <?php

        } else {
          
            if ($content == "Content") {
                $query = "SELECT * FROM reference WHERE site_name='$content' AND g_date BETWEEN '$startdate' AND '$enddate' AND 
                                                            site_name = '".$_REQUEST['id']."'  ORDER by id ASC ";

                $searchResult = date_time($query);
            } else {
                $query = "SELECT * FROM reference WHERE site_name='$content' AND g_date BETWEEN '$startdate' AND '$enddate' AND 
                                                            site_name = '".$_REQUEST['id']."'ORDER by id ASC ";

                $searchResult = date_time($query);
            }
    
        }     

    } else {


    $query = "SELECT * FROM reference WHERE site_name = '".$_REQUEST['id']."' ORDER by id ASC ";
        $searchResult = date_time($query);
    }

    function date_time($query) {
        include 'database/database.php';

        $filterResults = mysqli_query($con, $query);
        return $filterResults;
    }

?>


<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Execution Plan </title>


</head> 

<body class="app"> 

<?php include 'header.php'; ?>

    <div class="app-wrapper">
        
        <div class="app-content pt-3 p-md-3 p-lg-4">
                

                <!-- SEARCH START -->
                <div class="row g-3 mb-4 align-items-center justify-content-between">
    


<?php

    include 'database/database.php';
    $id = "SELECT * FROM site WHERE site_name ='".$_REQUEST['id']."'";
    $idResults = mysqli_query($con, $id);

    while ($rowid = mysqli_fetch_assoc($idResults)) {
       $site = $rowid['site_name'];
    }
    
    $query = mysqli_query ($con,"SELECT * FROM site WHERE site_name = '$site'");
    $row = mysqli_fetch_array ($query);

?>

                <!-- WELCOME START -->
                <h1 class="app-page-title" style="font-weight: normal;"> Execution Plan Per Site |
                    <span style="font-size: 15px; color: gray"><?php echo $row['site_name']; ?> </span></h1>
    <?php
  
?>


                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">

                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true" style="font-weight: normal; font-family: sans-serif;">Client</a>

                    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false" style="font-weight: normal; font-family: sans-serif;">Site Partner</a>

                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false" style="font-weight: normal; font-family: sans-serif;">Tv Partner</a>

                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-jojo-tab" data-bs-toggle="tab" href="#orders-jojo" role="tab" aria-controls="orders-jojo" aria-selected="false" style="font-weight: normal; font-family: sans-serif;">Complete</a>

                </nav>


                <div class="tab-content" id="orders-table-tab-content">

<!-- SITE PARTNER START -->

                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-stats-table h-100 shadow-sm">
            
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">

                                    <table id="Client" class="table app-table-hover mb-0 text-left">
                                        <thead >
                                            <tr>
                                               <th class="cell" style="font-weight:normal; text-align: center; ">Content</th>
                                                <th class="cell" style="font-weight:normal; " >Title</th>
                                                <th class="cell" style="font-weight:normal; " >Duration</th>
                                                <th class="cell" style="font-weight:normal; " >Spot</th>
                                                <th class="cell" style="font-weight:normal; " >Category</th>
                                                <th class="cell" style="font-weight:normal; " >Date</th>
                                                <th class="cell" style="font-weight:normal; " >From Date / To Date</th>
                                                <th class="cell" style="font-weight:normal; " >Uploaded By</th>
                                                <th class="cell" style="font-weight:normal; " >Status</th>
                                                <th class="cell" style="font-weight:normal; text-align: center; " >Campaign Performance</th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php
    
    
    $client = "Client";
    $Activate = "Activate";
    $date = date('Y-m-d');

    include 'database/database.php';

    $site = $_REQUEST['id'];      

    $query = "SELECT * FROM playlist_video WHERE video_status='$Activate'  AND category='$client' AND end_start >= '$date' AND
    site_name = '".$_REQUEST['id']."'  ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

    $end_play = ($row['end_start']);

?>


               <tr>

                <td class="cell" style="text-align: center;"><video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['count'];?> Spot</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;">
                    <?php echo date("F d, Y ", strtotime ($row['date_time']));?><br><span style="color: black; font-size: 11px; color: gray;">Published</span>
                </td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 15%;">
                    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
                    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
                </td>
                        
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['name'];?></td>  

                <td class="cell">
                <div class="dropdown">

                <?php 

                $Activate = "Activate";
                $Deactivate = "Deactivate";

                 if ($row['video_status'] > $Deactivate) {

                } else if ($row['video_status'] == $Activate) {
                 echo "
                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye' style='margin-left: -10px; color: green'></i> <span style='margin-left: 5px'> Active </span> </h3>";

                } else {
                  echo "
                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye-slash' style='margin-left: -10px; color: red'></i> <span style='margin-left: 5px'> Inactive </span> </h3>";

                }

                ?>

                </div>
                </td>





<td class="cell" style="text-align: center;">



                <?php 

                 $Yes = "Yes";
                 $site_name = ($row['site_name']);
                 $video_name = ($row['video_name']);
                 $end_start = ($row['end_start']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='execution_plan_details.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='execution_plan_details_no_spots.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details_no_spots.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                }

                ?>


</td>


































                </tr>
                                       

 <?php } ?>

                                        </tbody>

                                    </table>

                               </div><!--//table-responsive-->                           
                            </div><!--//app-card-body-->        
                        </div><!--//app-card-->
                    </div><!--//app-card-->

    <script>

    // Simple Datatable
    let Client = document.querySelector('#Client');
    let A = new jojo.DataTable(Client);

    </script>

<!-- SITE PARTNER END -->












<!-- TV PARTNER START -->

                <!-- TABLE START -->
                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                         <div class="app-card app-card-stats-table h-100 shadow-sm">
            
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">


                                    <table id="Site_Partner" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                               <th class="cell" style="font-weight:normal; text-align: center; ">Content</th>
                                                <th class="cell" style="font-weight:normal; " >Title</th>
                                                <th class="cell" style="font-weight:normal; " >Duration</th>
                                                <th class="cell" style="font-weight:normal; " >Spot</th>
                                                <th class="cell" style="font-weight:normal; " >Category</th>
                                                <th class="cell" style="font-weight:normal; " >Date</th>
                                                <th class="cell" style="font-weight:normal; " >From Date / To Date</th>
                                                <th class="cell" style="font-weight:normal; " >Uploaded By</th>
                                                <th class="cell" style="font-weight:normal; " >Status</th>
                                                <th class="cell" style="font-weight:normal; text-align: center; " >Campaign Performance</th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php
    
    
    $site_partner = "Site Partner";
    $Activate = "Activate";
    $date = date('Y-m-d');

    include 'database/database.php';

    $site = $_REQUEST['id'];   

    $query = "SELECT * FROM playlist_video WHERE video_status='$Activate'  AND category='$site_partner' AND end_start >= '$date' AND
    site_name = '".$_REQUEST['id']."'  ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

    $end_play = ($row['end_start']);

?>


               <tr>

                <td class="cell" style="text-align: center;"><video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['count'];?> Spot</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;">
                    <?php echo date("F d, Y ", strtotime ($row['date_time']));?><br><span style="color: black; font-size: 11px; color: gray;">Published</span>
                </td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 15%;">
                    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
                    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
                </td>
                        
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['name'];?></td>  

                <td class="cell">
                <div class="dropdown">
                <?php 

                $Activate = "Activate";
                $Deactivate = "Deactivate";

                 if ($row['video_status'] > $Deactivate) {

                } else if ($row['video_status'] == $Activate) {
                 echo "
                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye' style='margin-left: -10px; color: green'></i> <span style='margin-left: 5px'> Active </span> </h3>";

                } else {
                  echo "
                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye-slash' style='margin-left: -10px; color: red'></i> <span style='margin-left: 5px'> Inactive </span> </h3>";

                }

                ?>

                </div>
                </td>




<td class="cell" style="text-align: center;">



                <?php 

                 $Yes = "Yes";
                 $site_name = ($row['site_name']);
                 $video_name = ($row['video_name']);
                 $end_start = ($row['end_start']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='execution_plan_details.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='execution_plan_details_no_spots.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details_no_spots.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                }

                ?>


</td>


 
                 </tr>

<?php } ?>

                                        </tbody>

                                    </table>


                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->        
                        </div><!--//app-card-->
                    </div><!--//tab-pane-->

    <script>

    // Simple Datatable
    let Site_Partner = document.querySelector('#Site_Partner');
    let B = new jojo1.DataTable(Site_Partner);

    </script>

<!-- TV PARTNER END -->













<!-- CLIENT START -->

                    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
                         <div class="app-card app-card-stats-table h-100 shadow-sm">
            
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">


                                    <table id="Tv_Partner" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                               <th class="cell" style="font-weight:normal; text-align: center; ">Content</th>
                                                <th class="cell" style="font-weight:normal; " >Title</th>
                                                <th class="cell" style="font-weight:normal; " >Duration</th>
                                                <th class="cell" style="font-weight:normal; " >Spot</th>
                                                <th class="cell" style="font-weight:normal; " >Category</th>
                                                <th class="cell" style="font-weight:normal; " >Date</th>
                                                <th class="cell" style="font-weight:normal; " >From Date / To Date</th>
                                                <th class="cell" style="font-weight:normal; " >Uploaded By</th>
                                                <th class="cell" style="font-weight:normal; " >Status</th>
                                                <th class="cell" style="font-weight:normal; text-align: center; " >Campaign Performance</th>
                                            </tr>
                                        </thead>
                                        <tbody>


<?php
    
    
    $tv_partner = "Tv Partner";
    $Activate = "Activate";
    $date = date('Y-m-d');

    include 'database/database.php';

    $site = $_REQUEST['id'];   

    $query = "SELECT * FROM playlist_video WHERE video_status='$Activate'  AND category='$tv_partner' AND end_start >= '$date' AND
    site_name = '".$_REQUEST['id']."'  ORDER by id DESC";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

    $end_play = ($row['end_start']);

?>

    <script>

    // Simple Datatable
    let Tv_Partner = document.querySelector('#Tv_Partner');
    let C = new jojo2.DataTable(Tv_Partner);

    </script>


               <tr>

                <td class="cell" style="text-align: center;"><video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['count'];?> Spot</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;">
                    <?php echo date("F d, Y ", strtotime ($row['date_time']));?><br><span style="color: black; font-size: 11px; color: gray;">Published</span>
                </td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 15%;">
                    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
                    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
                </td>
                        
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['name'];?></td>  

                <td class="cell">
                <div class="dropdown">

                <?php 

                $Activate = "Activate";
                $Deactivate = "Deactivate";

                 if ($row['video_status'] > $Deactivate) {

                } else if ($row['video_status'] == $Activate) {
                 echo "
                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye' style='margin-left: -10px; color: green'></i> <span style='margin-left: 5px'> Active </span> </h3>";

                } else {
                  echo "
                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye-slash' style='margin-left: -10px; color: red'></i> <span style='margin-left: 5px'> Inactive </span> </h3>";

                }

                ?>

                </div>
                </td>




<td class="cell" style="text-align: center;">



                <?php 

                 $Yes = "Yes";
                 $site_name = ($row['site_name']);
                 $video_name = ($row['video_name']);
                 $end_start = ($row['end_start']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='execution_plan_details.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='execution_plan_details_no_spots.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details_no_spots.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                }

                ?>


</td>

  
                 </tr>
<?php } ?>

                                        </tbody>

                                    </table>
                    

                                </div><!--//table-responsive-->
                            </div><!--//app-card-body--> 
                        </div><!--//app-card-->
                    </div><!--//tab-pane-->


            
    <script>

    // Simple Datatable
    let Tv_Partner = document.querySelector('#Tv_Partner');
    let C = new jojo2.DataTable(Tv_Partner);

    </script>

<!-- CLIENT END -->













                <!-- TABLE START -->
                    <div class="tab-pane fade" id="orders-jojo" role="tabpanel" aria-labelledby="orders-jojo-tab">
                        <div class="app-card app-card-stats-table h-100 shadow-sm">
            
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">
                                    <table id="inactive_a" class="table app-table-hover mb-0 text-left">
                                        <thead >
                                            <tr>
                                                <th class="cell" style="font-weight:normal; text-align: center; ">Content</th>
                                                <th class="cell" style="font-weight:normal; " >Title</th>
                                                <th class="cell" style="font-weight:normal; " >Duration</th>
                                                <th class="cell" style="font-weight:normal; " >Category</th>
                                                <th class="cell" style="font-weight:normal; " >Date</th>
                                                <th class="cell" style="font-weight:normal; " >From Date / To Date</th>
                                                <th class="cell" style="font-weight:normal; " >Site</th>
                                                <th class="cell" style="font-weight:normal; " >Uploaded By</th>
                                                <th class="cell" style="font-weight:normal; " >Status</th>
                                                <th class="cell" style="font-weight:normal; " >Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
   
    $date = date('Y-m-d');
    $Deactivate = "Deactivate";
    $site = $_REQUEST['id'];   
    
    $query = "SELECT * FROM playlist_video WHERE end_start <= '$date' AND video_status = '$Deactivate' AND 
    site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

    $end_play = ($row['end_start']);

?>

                <tr>
                    
                <td class="cell" style="text-align: center;"><video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['count'];?> Spot</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;">
                    <?php echo date("F d, Y ", strtotime ($row['date_time']));?><br><span style="color: black; font-size: 11px; color: gray;">Published</span>
                </td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 15%;">
                    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
                    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
                </td>
                        
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['name'];?></td>  

                <td class="cell">
                <div class="dropdown">

                <?php 

                $Deactivate = "Deactivate";

                 if ($row['video_status'] > $Deactivate) {

                } else {
                 echo "

                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye-slash' style='margin-left: -10px; color: red'></i> <span style='margin-left: 5px'> Inactive </span> </h3>";
                }

                ?>

                </div>
                </td>
                



<td class="cell" style="text-align: center;">



                <?php 

                 $Yes = "Yes";
                 $site_name = ($row['site_name']);
                 $video_name = ($row['video_name']);
                 $end_start = ($row['end_start']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='execution_plan_details.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='execution_plan_details_no_spots.php?id=$video_name'>

                      <div class='app-card-footer mt-auto'>
                               <a href='execution_plan_details_no_spots.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                }

                ?>


</td>



                                            </tr>
                <?php } ?>

                                        </tbody>

                                    </table>

                                </div>
                               
                            </div>  

                        </div>
                        

                    </div>
                    <!-- TABLE ACTIVE START -->
                    

    <script>

    // Simple Datatable
    let inactive_a = document.querySelector('#inactive_a');
    let aa = new inactive.DataTable(inactive_a);

    </script>               

                </div><!--//tab-content-->

        </div><!--//app-content-->      
    </div><!--//app-wrapper-->                      

    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>



<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>


</body>
</html> 

