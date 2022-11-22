


<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Dashboard </title>


</head> 


<body class="app">   	

<?php include'header.php' ?>

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">

			    <!-- WELCOME START -->
			    <h1 class="app-page-title" style="font-weight: normal"> Dashboard </h1>

      <?php

      
         $select = mysqli_query($con, "SELECT * FROM account WHERE id = '$user_type'");
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
      ?>
			    


<?php

include 'database/database.php';

// SITE //
$siteQuery = "SELECT * FROM site ";
$resultSite = mysqli_query($con, $siteQuery);
$resultSiteCheck = mysqli_num_rows($resultSite);


// CONTENT //
$Name = $fetch['name'];   

$videoQuery = "SELECT * FROM video WHERE name='$Name'";
$resultVideo = mysqli_query($con, $videoQuery);
$resultVideoCheck = mysqli_num_rows($resultVideo);

// KIT //
$kit = "Yes";

$siteQuery = "SELECT * FROM site WHERE site_kit='$kit' ";
$resultSite = mysqli_query($con, $siteQuery);
$resultSitekit = mysqli_num_rows($resultSite);

// ONLINE //     
$activeQuery = "SELECT * FROM site WHERE site_status > site_status_end";
$resultActive = mysqli_query($con, $activeQuery);
$resultSiteactive = mysqli_num_rows($resultActive);

?> 


			    <!-- AIRCAST INFO START -->
			    <div class="row g-4 mb-4">

                    <!-- TOTAL SITE START -->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">

                                <span class="nav-link-text" style="color: black; font-size: 15px; font-weight:normal; font-family: sans-serif;" > Active Sites </span>
                                <div class="stats-figure">
                                <span class="nav-link-text" style="color: gray"><?php echo $resultSiteCheck;?></span>                        
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- VIDEO PLAYER END -->
                    

                    <!-- ONLINE SITE START -->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">

                                <span class="nav-link-text" style="color: black; font-size: 15px; font-weight:normal; font-family: sans-serif; " >Online Sites</span>

                                <div class="stats-figure">
                                <span class="nav-link-text" style="color: gray"><?php echo $resultSiteactive;?></span>                         
                               </div>

                            </div>
                        </div>
                    </div>
                    <!-- ONLINE SITE END -->

                    <!-- TOTAL CONTENT START -->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">

                                <span class="nav-link-text" style="color: black; font-size: 15px; font-weight:normal; font-family: sans-serif; " >Contents</span>

                                <div class="stats-figure">
                                <span class="nav-link-text" style="color: gray"><?php echo $resultVideoCheck;?> </span>            
                                </div>

                            </div>
                            <a class="app-card-link-mask" href="content.php"></a>
                        </div>
                    </div>
                    <!-- TOTAL CONTENT END -->
                    
                </div>
                <!-- AIRCAST INFO END -->

				    








				
				<!-- VIDEO PLAYER START -->
			    <div class="row g-4 mb-4">


 					<!-- SEARCH BUTTON START -->
			        <div class="col-12 col-lg-6">
				        <div class="app-card app-card-stats-table h-100 shadow-sm" >

					        <div class="app-card-header p-3" >
						        <div class="row justify-content-between align-items-center" >


						        	<div class="col-auto">
								        <div class="card-header-action">
									        <span style="color: black;">Previews Content</span>
								        </div>
							        </div>

							        <div class="col-auto">
                                        
                                        <div class="card-header-action">
 
                                            <form method="POST" class="app-search-form">

                                                 <select type="text" name="site" class="form-control search-input" 
                                                         style="color: black; font-size: 13px; font-weight:normal; margin-right: 200px;"  required >

                                                    <option value="" disabled selected > Select Site </option>

                                                 <?php


                                                 include 'database/database.php';
                                                 $query = mysqli_query($con,"SELECT site_name, video_status
                                                                             FROM playlist_data GROUP BY site_name");
                                                 while($row = mysqli_fetch_array($query)){

                                                 ?>

                                                    <option value="<?php echo $row['site_name']; ?>"  required> <?php echo $row['site_name']; ?> </option>

                                                 <?php } ?> 

                                                 </select>

                                                 <input type="submit" name="search" class="btn search-btn btn-primary" value="Search" 
                                                        style="color: #006600; font-size: 13px">        

                                            </form>

							            </div>	       

							        </div>
						        </div>
					        </div>
					        <!-- SEARCH BUTTON END -->


				    	<!-- VIDEO PLAYER START -->
			            <div class="row g-4 mb-4" >


   <?php

   $video_fil = array();

    if (isset($_POST['search'])) {
        include 'database/database.php';

        $Name = $fetch['name'];         
        $activate = "Activate";
        $site = $_POST['site'];

                if ($site == "site") {

      $vid_filter = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter)) {

        $video_fil[] = $row['video'];
      }


                $vid1 = "SELECT video_name, site_name, video, video_status, name FROM playlist_data 
                WHERE site_name='$site' AND name='$Name'  AND video IN ( '" . implode( "', '" , $video_fil ) . "' )  GROUP BY video_name DESC ";
                $filter1 = video1($vid1);

                } else {

      $vid_filter = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter)) {

        $video_fil[] = $row['video'];
      }


                 $vid1 = "SELECT video_name, site_name, video, video_status, name FROM playlist_data
                 WHERE site_name='$site' AND name='$Name'  AND video IN ( '" . implode( "', '" , $video_fil ) . "' )  GROUP BY video_name DESC ";
                 $filter1 = video1($vid1);
               }
    
      $content = array();
      foreach ($filter1 as $data) {
      $vid = $data['video'];
      array_push($content, $vid);
      $array = array($content);
    }

    $video = json_encode($content);

    $A = end($content);
    $AA = json_encode($A);

         } else {

        $Name = $fetch['name'];  
        $activate = "Activate";
        $site = "GP Nagata - Hallway";


      $vid_filter = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter)) {

        $video_fil[] = $row['video'];
      }


        $vid1 = "SELECT video_name, site_name, video, video_status, name FROM playlist_data
        WHERE site_name='$site' AND name='$Name'  AND video IN ( '" . implode( "', '" , $video_fil ) . "' )  GROUP BY video_name DESC ";
        $filter1 = video1($vid1);

      $content = array();
      foreach ($filter1 as $data) {
      $vid = $data['video'];
      array_push($content, $vid);
      $array = array($content);
    }

    $video = json_encode($content);

    $A = end($content);
    $AA = json_encode($A);

    }

    function video1($vid1) {
        include 'database/database.php';
 
        $result1 = mysqli_query($con, $vid1);
        return $result1;
    }

?>
									<video src="<?=$A;?>" id="video" type="video/mp4" autoplay muted  ></video>

									<script type="text/javascript">

									// VIDEO //    
									var database_videos = <?php echo $video;?>; 

									//last content
									var A = <?php echo $AA;?>;
									console.log(A);
									
									// VIDEO //
									var video = document.getElementById('video');

									// PLAY //
									var content = 0;

 									video.addEventListener('ended', function(e) {
 									content = (++content) % database_videos.length;

  									video.src = database_videos[content];
  									video.play();
									});

									</script>

									  		
								  </div>
			        <!-- VIDEO PLAYER END -->


				        </div><!-- SEARCH BUTTON START -->
			        </div><!-- SEARCH BUTTON START -->


                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-stats-table h-100 shadow-sm">
            
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">


                                   <table id="filter" class="table app-table-hover mb-0 text-left">
                                        <thead >
                                            <tr>
                                                <th class="cell" style="font-weight:normal;  text-align: center; " colspan="2">Content</th>
                                                <th class="cell" style="font-weight:normal; ">Date</th>
                                            </tr>
                                        </thead>
                                   <tbody>

<?php

    $video_sta = array();

    if (isset($_POST['search'])) {
        include 'database/database.php';

        $Name = $fetch['name'];          
        $activate = "Activate";
        $site = $_POST['site'];

                if ($site == "site") {

      $vidfil = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vidfil)) {

        $video_sta[] = $row['video'];
      }

                $q = "SELECT video_name, site_name, category, views, video, date_published, name, count, SUM(count) AS Count,  SUM(views) AS Views  FROM playlist_data 
                WHERE site_name='$site' AND name='$Name' AND video IN ( '" . implode( "', '" , $video_sta ) . "' )  GROUP BY video_name ASC ";
                $a = video_count($q);

                } else {

      $vidfil = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vidfil)) {

        $video_sta[] = $row['video'];
      }

                 $q = "SELECT video_name, site_name, category, views, video, date_published, name, count, SUM(count) AS Count,   SUM(views) AS Views FROM playlist_data
                 WHERE site_name='$site' AND name='$Name' AND video IN ( '" . implode( "', '" , $video_sta ) . "' )  GROUP BY video_name ASC ";
                 $a = video_count($q);
               }
    
         } else {

        $Name = $fetch['name'];  
        $activate = "Activate";
        $site = "GP Nagata - Hallway";

      $vidfil = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vidfil)) {

        $video_sta[] = $row['video'];
      }

        $q = "SELECT video_name, site_name, category, views, video, date_published, name, count, SUM(count) AS Count,  SUM(views) AS Views FROM playlist_data
        WHERE site_name='$site' AND name='$Name' AND video IN ( '" . implode( "', '" , $video_sta ) . "' )  GROUP BY video_name ASC ";
        $a = video_count($q);

    }

    function video_count($q) {
        include 'database/database.php';
 
        $result = mysqli_query($con, $q);
        return $result;
    }

?>


<?php while ($row = mysqli_fetch_assoc($a)) { ?>

<tr>

     <td class="cell" style="text-align: center;">
         <video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video>
     </td>

     <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?>
         <br><span style="color: gray; font-size: 11px;"><?php echo $row['category'];?></span>
     </td>   

     <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("M d, Y ", strtotime ($row['date_published']));?>
        <br><span style="color: black; font-size: 11px;">Published</span>
     </td>


</tr>


<?php  } ?>

        </tbody>

    </table>



   <?php

  $video_fil2 = array();

    if (isset($_POST['search'])) {
        include 'database/database.php';

        $Name = $fetch['name'];            
        $activate = "Activate";
        $site = $_POST['site'];

  				if ($site == "site") {

      $vid_filter2 = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter2)) {

        $video_fil2[] = $row['video'];
      }


                $view = "SELECT video_name, site_name, video FROM playlist_data WHERE site_name='$site' AND name='$Name' 
                                       AND video IN ( '" . implode( "', '" , $video_fil2 ) . "' ) GROUP BY video_name ASC LIMIT 1 ";
                $viewall = filterall($view);


                } else {

      $vid_filter2 = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site'  AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter2)) {

        $video_fil2[] = $row['video'];
      }

                $view = "SELECT video_name, site_name, video FROM playlist_data WHERE site_name='$site' AND name='$Name' 
                                       AND video IN ( '" . implode( "', '" , $video_fil2 ) . "' ) GROUP BY video_name ASC LIMIT 1 ";
                $viewall = filterall($view);
                
               }
    
         } else {

        $Name = $fetch['name'];    
        $activate = "Activate";
        $site = "GP Nagata - Hallway";

      $vid_filter2 = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND name='$Name' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter2)) {

        $video_fil2[] = $row['video'];
      }

                $view = "SELECT video_name, site_name, video FROM playlist_data WHERE site_name='$site' AND name='$Name' 
                                       AND video IN ( '" . implode( "', '" , $video_fil2 ) . "' ) GROUP BY video_name ASC LIMIT 1 ";
                $viewall = filterall($view);
  
    }

    function filterall($view) {
        include 'database/database.php';
 
        $filterall1 = mysqli_query($con, $view);
        return $filterall1;
    }

?>

<?php while ($row = mysqli_fetch_assoc($viewall)) { ?>

                          <td class="cell">
                            <span class="cell" style="color: black; font-size: 12px; font-weight:normal; margin-left: 15px; ">
                                  <?php echo $row['site_name'];?></span>

                               <a href="playlist.php?id=<?php echo $row['site_name']; ?>"> 
                                    <button class="btn app-btn-secondary" style="font-size: 12px; float: right; margin-top: -10px;"> 
                                    View All </button>
                                </a>

                          </td>

<?php  } ?>


						        </div><!--//table-responsive-->
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->

			    </div><!-- VIDEO PLAYER START -->

    <script>

    // Simple Datatable
    let filter = document.querySelector('#filter');
    let data = new jojo28.DataTable(filter);

    </script>



























                <!-- TABLE START -->
                <!-- TABLE START -->
                <div class="tab-content" id="orders-table-tab-content">

                    <!-- TABLE ACTIVE START -->
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-stats-table h-100 shadow-sm">
            
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">

                                   <table id="table1" class="table app-table-hover mb-0 text-left">
                                        <thead >
                                            <tr>
                                                <th class="cell" style="font-weight:normal;  text-align: center;" colspan="3"> Status</th>
                                                <th class="cell" style="font-weight:normal; ">Site & Area</th>
                                                <th class="cell" style="font-weight:normal; ">Category</th>
                                                <th class="cell" style="font-weight:normal; ">Location</th>
                                                <th class="cell" style="font-weight:normal; ">Aircast Kit</th>
                                            </tr>
                                        </thead>
                                   <tbody>


              <?php
               
               $kit = "Yes";
                
                include 'database/database.php';
                $query = mysqli_query($con,"select * from `site` where site_kit='$kit' ORDER BY ID ASC");
                while($row = mysqli_fetch_array($query)){

               ?>

                                      <tr >
  
                <?php

               $start = ($row['site_status']);
               $end = ($row['site_status_end']);

               $kit = "No";
               $site_kit = ($row['site_kit']);

                if ($start > $end) {
                 echo "<td> <i class='fa fa-circle' style='color:green; margin-left: 30px;'></i></td>";

                    } elseif ($kit == $site_kit) {

                 echo "<td> <i class='fa fa-circle' style='color:gray; margin-left: 30px;'></i></td>";

                    }  else {

                 echo "<td> <i class='fa fa-circle' style='color:red; margin-left: 30px;'></i></td>";

                    }


                $time = time();

                $dateDiff    = $time - $end;
                $fullDays    = floor($dateDiff/(60*60*24));
                $fullHours   = floor(($dateDiff-($fullDays*60*60*24))/(60*60));
                $fullMinutes = floor(($dateDiff-($fullDays*60*60*24)-($fullHours*60*60))/60);

                if ($start > $end) {
                 echo "<td class='cell'> Active  </td>";

                    } else if ($kit == $site_kit) {

                 echo "<td class='cell'>  Inactive </td>";

                    } else if ($fullDays) {

                 echo "<td class='cell'>  $fullDays days - $fullHours hrs Ago  </td>";

                    } else if ($fullHours) {

                 echo "<td class='cell'>  $fullHours hrs - $fullMinutes mins Ago </td>";

                    } else {

                 echo "<td class='cell'>  $fullMinutes mins Ago  </td>";

                    }
                ?> 

<!-- ON / O FF -->
<td class="cell">
<div class="wrapper"disabled >
         <div class="icon time-on-off" disabled>
            <span class="nav-icon" disabled><i><?php include 'icon/calendar.php'?></i></span>
         </div>
</div>
</td>


                            <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_name'];?></td>
                            <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_category'];?></td>
                            <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_location'];?></td>
                            <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_kit']; ?></td>

				</tr>


           <?php  } ?>

        </tbody>

    </table>



						        </div>
						       
						    </div>	

					    </div>

			        </div>
			        <!-- TABLE ACTIVE END -->


			    </div>
			    <!-- TABLE END -->
			    

    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>





        </div><!--//app-content-->      
    </div><!--//app-wrapper-->                      

</body>
</html> 

