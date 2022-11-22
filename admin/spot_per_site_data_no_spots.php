<?php

    if (isset($_POST['search'])) {

        include 'database/database.php';
        
        $end_play = $_POST['end_start'];
        $site = $_POST['site_name'];
        $content = $_POST['content'];
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

    if ($startdate == "" || $enddate == "") {
        ?>

        <?php

        } else {
          
        if ($content == "Content") {
            $query = "SELECT * FROM playlist_data WHERE end_start = '$end_play' AND site_name = '$site' AND video='$content' AND date_time BETWEEN '$startdate' AND '$enddate' AND video_name = '".$_REQUEST['id']."' ORDER by id DESC ";
            $searchResult = filtertable($query);

        } else {
            $query = "SELECT * FROM playlist_data WHERE end_start = '$end_play' AND site_name = '$site' AND video='$content' AND date_time BETWEEN '$startdate' AND '$enddate' AND video_name = '".$_REQUEST['id']."' ORDER by id DESC ";
            $searchResult = filtertable($query);

            }
    
        }     

    } else {

    $site = $_POST['site_name'];
    $end_play = $_POST['end_start'];

    $query = "SELECT * FROM playlist_data WHERE end_start = '$end_play' AND site_name = '$site' AND video_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $searchResult = filtertable($query);
    
    }

    function filtertable($query) {
        include 'database/database.php';

        $filterResults = mysqli_query($con, $query);
        return $filterResults;
    }

?>

<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Spot Per Site </title>


</head> 


<body class="app">      

<?php include'header.php' ?>

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">



<?php

    include 'database/database.php';

    $site = $_POST['site_name'];
    $end_play = $_POST['end_start'];

    $id = "SELECT * FROM playlist_video WHERE end_start = '$end_play' AND site_name='$site' AND video_name ='".$_REQUEST['id']."'";
    $idResults = mysqli_query($con, $id);

    while ($rowid = mysqli_fetch_assoc($idResults)) {
       $video = $rowid['video_name'];
    }
    
    $site = $_POST['site_name'];
    $end_play = $_POST['end_start'];

    $query = mysqli_query ($con,"SELECT * FROM playlist_video WHERE end_start = '$end_play' AND site_name='$site' AND video_name = '$video'");
    $row = mysqli_fetch_array ($query);

?>

<form method="POST" action="spot_per_site_data.php">

                <!-- WELCOME START -->
                <h1 class="app-page-title" style="font-weight: normal"> Spot Per Site | <span style="font-size: 15px; color: gray"><?php echo $row['site_name']; ?></span></h1>

                    <!-- TABLE START -->
                <div class="tab-content" id="orders-table-tab-content">

                
                <!-- VIDEO PLAYER START -->
                <div class="row g-4 mb-4">


                    <!--  START -->
                        <div class="app-card app-card-stats-table h-100 shadow-sm" >

                            <!-- TITLE START -->
                            <div class="app-card-header p-3" >
                                <div class="row justify-content-between align-items-center" >

                                    <div class="col-auto">
                                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/bag-check.php'?></span>Campaign Performance</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TITLE END -->





                <!-- VIDEO PLAYER START -->
                <div class="row g-4 mb-4">

                    <!-- START -->
                    <div class="col-12 col-lg-6">

                 
                         <div class="row g-4 mb-4" style="margin-top: 20px; margin-left:20px;">

                                    <video src="<?php echo $row['video'] ?>" id="video" autoplay loop controls  ></video>
                        </div>
                                  
                    </div>
                    <!-- VIDEO PLAYER END -->


                    <!-- SEARCH BUTTON START -->
                    <div class="col-12 col-lg-6">




<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

        <div class="table-responsive" >


<table class="table table-borderless mb-0">
                        
        <thead>

            <!-- VIDEO FILE -->
             <tr hidden>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" hidden> File Name </th>
             <th class="meta">
                <input type="hidden" name="video" value="<?php echo $row['video']; ?>" placeholder="Video File" id="video_file_Cal"
                       style="color: gray; font-size: 12px; font-weight:normal; background: none;  " class="form-control form-control-md" disabled>  
                </th>

            </tr>


             <!-- TITLE -->
             <tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Title </th>
                <th class="meta">
                <input type="text" name="video_name" value="<?php echo $row['video_name']; ?>" placeholder="Title" id="video_name_Cal"
                       style="color: gray; font-size: 12px; font-weight:normal;background: none;  " class="form-control form-control-md" disabled>  
                </th>
            </tr>

             <!-- DURATION -->
             <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Duration </th>
                <th class="meta">
                <input type="text" name="duration" value="<?php echo $row['duration']; ?> Seconds" placeholder="Seconds" id="duration_Cal" 
                       style="color: gray; font-size: 12px; font-weight:normal;background: none;  " class="form-control form-control-md" disabled>  
                </th>

            </tr>


            <!-- CONTENT END -->
            <tr >
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Categoty </th>
                <th class="meta">
                <input type="text" name="category" value="<?php echo $row['category']; ?>" placeholder="Category" id="category_Cal"
                       style="color: gray; font-size: 12px; font-weight:normal;background: none;  " class="form-control form-control-md" disabled>  
                </th>
            </tr>


            <!-- NAME -->
            <tr >
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Uploaded By </th>
                <th class="meta">
                <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Uploaded By" id="Uploaded"
                       style="color: gray; font-size: 12px; font-weight:normal;background: none;  " class="form-control form-control-md" disabled>  
                </th>
            </tr>

             <!-- DATE -->
             <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Date Published </th>
                <th class="meta">
                <input type="text" name="date_time" value="<?php echo date("F d, Y - h:i A", strtotime ($row['date_time']));?>" 
                placeholder="Date" id="video_status_Cal"
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md" disabled>  
                </th>

            </tr>

             <!-- STATUS -->
             <tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Status </th>
                <th class="meta">
                <input type="hidden" name="video_status" value="<?php echo $row['video_status']; ?>" placeholder="Content" id="video_status_Cal"
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md" disabled>  
                </th>

            </tr>


<input type="hidden" name="site_name" value="<?php echo $site;?>" id = "butt">
<input type="hidden" name="end_start" value="<?php echo $end_play;?>" id = "butt">

</form>

<?php ?>

  
        </thead>

    </table>


              <?php

                include 'database/database.php';
                
                $end_play = $_POST['end_start'];

                $query = mysqli_query($con,"SELECT video_name, video, id, active, end_start, inactive, video_status, date_time, play_start, end_start, site_name, video_spots_no_yes,
                                                   days_appearance, name, number_of_sites, total_spots,  total_spots_per_site, total_frequency_per_site
                                              FROM playlist_video WHERE end_start = '$end_play' AND video_name ='".$_REQUEST['id']."' GROUP BY video_name");
                while($row = mysqli_fetch_array($query)) {

                $site = ($row['site_name']);

               ?>


                <?php 

                 $Yes = "Yes";
                 $video_name = ($row['video_name']);
                 $end_start = ($row['end_start']);
                 $site_name = ($row['site_name']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='spot_view_details.php?id=$video_name'>

                            <div class='app-card-footer mt-auto' style='margin-top: 20px; padding: 10px 5px ; float: right;'>
                               <a href='spot_view_details.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' style='font-size: 12px; font-family: sans-serif;'
                                    style='font-size: 12px; font-family: sans-serif;'> View Details </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
 <input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='spot_view_details_no_spots.php?id=$video_name'>

                            <div class='app-card-footer mt-auto' style='margin-top: 20px; padding: 10px 5px ; float: right;'>
                               <a href='spot_view_details_no_spots.php?id=$video_name'> 
                                    <button class='btn app-btn-secondary' style='font-size: 12px; font-family: sans-serif;'
                                    style='font-size: 12px; font-family: sans-serif;'> View Details </button>
                                </a>
                            </div>

 <input type='hidden' name='end_start' value='$end_start'>
 <input type='hidden' name='video_name' value='$video_name'>
<input type='hidden' name='site_name' value='$site_name'>

 </form>

 </td>";
                }

                ?>

<?php  } ?>


    </div>

</div>
<!-- TABLE END -->
 

                                    
                    </div>
                    <!-- END -->

                    </div>
                    <!-- CONTENT END -->



                    </div>
                    <!-- SEARCH BUTTON END -->

                </div>
                <!-- VIDEO PLAYER START -->



 
</div>




                            






























        <!-- DAYS APPREARANCE START -->
          <div class="row g-4 mb-4" >

          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm">
                             <!-- TITLE START -->
                            <div class="app-card-header p-3" >
                                <div class="row justify-content-between align-items-center" >

                                    <div class="col-auto">
                                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/transaction.php'?></span> Spot per Site Data</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TITLE END -->           

            
<div class="app-card-body p-3 p-lg-4">
        <div class="table-responsive">

<form method="POST" action="spot_per_site_data.php?id=<?php echo $row['video_name'];?>">

      <select type="text" name="content" readonly hidden>
 
    <?php

    include 'database/database.php';
    $query = "SELECT * FROM video WHERE video_name = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    
    ?>

        <option value="<?php echo $row['video']; ?>"> <?php echo $row['video']; ?> </option>

     <?php } ?> 

    </select>

<table class="table table-borderless mb-0">
                        
        <thead>


            <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> From Date  </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> To Date </th>
            </tr>


        </thead>

        <tbody>
            
           <tr>


            <!-- START -->
            <td class="cell">
                <input type="date" value="<?=$startdate?>" name="txtStartdate" required
                       style="color: gray; font-size: 13px; font-weight:normal; background: none;  " class="form-control form-control-md" >  
            </td>

            <!-- END -->
            <td class="cell">
                <input type="date" value="<?=$enddate?>" name="txtEnddate" required
                       style="color: gray; font-size: 13px; font-weight:normal; background: none; " class="form-control form-control-md" > 
            </td>

            <td class="cell">
                <button  type="submit" name="search" class="btn btn-primary"  
                        style="font-size: 13px; font-family: sans-serif; background: #000099; font-weight: normal; color: white;"> Filter </button>
                            
            </td>  

           </tr>


       </tbody>

    </table>

<input type="hidden" name="site_name" value="<?php echo $site;?>" id = "butt">
<input type="hidden" name="end_start" value="<?php echo $end_play;?>" id = "butt">

</form>  

                                   <table id="table1" class="table app-table-hover mb-0 text-left">
                                        <thead >
                                            <tr>
                                                <th class="cell" style="font-weight: normal;"> Title </th>
                                                <th class="cell" style="font-weight: normal;"> Duration </th>
                                                <th class="cell" style="font-weight: normal;"> Category </th>
                                                <th class="cell" style="font-weight: normal;"> Site </th>
                                                <th class="cell" style="font-weight: normal;"> Date </th>
                                                <th class="cell" style="font-weight: normal;"> Time </th>
                                                <th class="cell" style="font-weight: normal;"> Status </th>                                                                                        
                                            </tr>
                                        </thead>
                                   <tbody>

<?php while ($row = mysqli_fetch_assoc($searchResult)) {  ?>

<form method="POST" action="spot_per_site_data.php">

                <tr>
                         
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("F d, Y", strtotime ($row['date_time']));?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("h:i:s A", strtotime ($row['date_time']));?></td>

                <td class="cell">
                <div class="dropdown">

                <?php 

                $Activate = "Activate";

                 if ($row['video_status'] > $Activate) {

                } else {
                 echo "

                 <h3 class=meta' style='color: black; font-size: 13px; font-weight:normal'>
                 <i class='fa fa-eye' style='margin-left: -10px; color: green'></i> <span style='margin-left: 5px'> Active </span> </h3>";

                }

                ?>

                </div>
                </td>                                            

                </tr>

<input type="hidden" name="site_name" value="<?php echo $site;?>" id = "butt">
<input type="hidden" name="end_start" value="<?php echo $end_play;?>" id = "butt">

</form>

 <?php } ?>

        </tbody>

    </table>

                            <div class="app-card-footer mt-auto" style="float: right; padding: 20px 8px;">
                                    <button  type="button" onclick="tableToExcel('table1', 'W3C Example Table')" class="btn app-btn-secondary"
                                     style="font-size: 13px; font-family: sans-serif; background: #006600; font-weight: normal; color: white;"> Download EXL</button>
                            </div>


                                </div>

                            </div>  
   
                        </div>
                        
                    </div>

                </div>
                <!-- TABLE END -->
                





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

