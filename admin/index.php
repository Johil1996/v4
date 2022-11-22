

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
			    <h1 class="app-page-title" style="font-weight: normal;"> Dashboard </h1>
			    


			    <!-- AIRCAST INFO START -->
			    <div class="row g-4 mb-4">

<?php

include 'database/database.php';

// SITE //
$siteQuery = "SELECT * FROM site ";
$resultSite = mysqli_query($con, $siteQuery);
$resultSiteCheck = mysqli_num_rows($resultSite);

// CONTENT //
$videoQuery = "SELECT * FROM video ";
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

			    	<!-- TOTAL SITE START -->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">

							    <span class="nav-link-text" style="color: black; font-size: 15px; font-weight:normal; font-family: sans-serif;" > Total Sites </span>
							    <div class="stats-figure">
							    <span class="nav-link-text" style="color: gray"><?php echo $resultSiteCheck;?></span>                        
							    </div>

						    </div>
					    </div>
				    </div>
				    <!-- VIDEO PLAYER END -->
				    

				    <!-- ACTIVE SITE START -->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">

							    <span class="nav-link-text" style="color: black; font-size: 15px; font-weight:normal; font-family: sans-serif; " >Programmatic Sites</span>	
							    <div class="stats-figure">						    
							    <span class="nav-link-text" style="color: gray"><?php echo $resultSitekit; ?></span>						 
							   </div>

						    </div>
					    </div>
				    </div>
				    <!-- ACTIVE SITE END -->


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
			        <div class="col-12 col-lg-6" style="height: 60vh">
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

     											 	<option value="" disabled selected > Select Playlist </option>

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
        

        $activate = "Activate";
        $site = $_POST['site'];

  				if ($site == "site") {
               

      $vid_filter = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter)) {

        $video_fil[] = $row['video'];
      }

                $vid1 = "SELECT video_name, site_name, video, video_status FROM playlist_data 
                WHERE site_name='$site' AND video IN ( '" . implode( "', '" , $video_fil ) . "' )  GROUP BY video_name DESC ";
                $filter1 = video1($vid1);


                } else {

      $vid_filter = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter)) {

        $video_fil[] = $row['video'];
      }

                 $vid1 = "SELECT video_name, site_name, video, video_status FROM playlist_data
                 WHERE site_name='$site' AND video IN ( '" . implode( "', '" , $video_fil ) . "' )  GROUP BY video_name DESC";
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

 
      $activate = "Activate";
      $site = "GP Nagata - Hallway";

      $vid_filter = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter)) {

        $video_fil[] = $row['video'];
      }


        $vid1 = "SELECT video_name, site_name, video, video_status FROM playlist_data
        WHERE site_name='$site' AND video IN ( '" . implode( "', '" , $video_fil ) . "' )  GROUP BY video_name DESC ";
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
									var content = -1;

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
										<thead>
											<tr>
											    <th class="cell" style="font-weight:normal;  text-align: center; " colspan="2">Content</th>
												<th class="cell" style="font-weight:normal; ">Date</th>
												<th class="cell" style="font-weight:normal; ">Spot</th>
												<th class="cell" style="font-weight:normal; ">Frequency</th>
											</tr>
										</thead>
                                   <tbody>
<?php

    $video_sta = array();

    if (isset($_POST['search'])) {
        include 'database/database.php';
       
        $activate = "Activate";
        $site = $_POST['site'];

  				if ($site == "site") {


      $vidfil = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vidfil)) {

        $video_sta[] = $row['video'];
      }


                $q = "SELECT video_name, site_name, views, video, date_published, category, count, SUM(count) AS Count,  SUM(views) AS Views  FROM playlist_data 
                WHERE site_name='$site' AND video IN ( '" . implode( "', '" , $video_sta ) . "' )  GROUP BY video_name ASC ";
                $a = video_count($q);


                } else {

      $vidfil = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vidfil)) {
          
        
        $video_sta[] = $row['video'];
      }

                 $q = "SELECT video_name, site_name, views, video, date_published, category, count, SUM(count) AS Count,   SUM(views) AS Views FROM playlist_data
                 WHERE site_name='$site' AND video IN ( '" . implode( "', '" , $video_sta ) . "' ) GROUP BY video_name ASC ";
                 $a = video_count($q);


               }
    
         } else {

        $activate = "Activate";
        $site = "GP Nagata - Hallway";

        $vidfil = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
        while($row = mysqli_fetch_assoc($vidfil)) {

        $video_sta[] = $row['video'];
      }

        $q = "SELECT video_name, site_name, views, video, date_published, category, count, SUM(count) AS Count,  SUM(views) AS Views FROM playlist_data
        WHERE site_name='$site' AND video  IN ( '" . implode( "', '" , $video_sta ) . "' ) GROUP BY video_name ASC ";
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
	 	 <br><span style="color: gray; font-size: 11px;">Published</span>
	 </td>

	 <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['Count'];?>
		 <br><span style="color: gray; font-size: 11px;">Consumed</span>
	 </td>

	 <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['Views']; ?>
	 	 <br><span style="color: gray; font-size: 11px;">Loop</span>
	 </td>


</tr>

<?php  } ?>

        </tbody>

    </table>

   <?php

  $video_fil2 = array();

    if (isset($_POST['search'])) {
        include 'database/database.php';
        
        $activate = "Activate";
        $site = $_POST['site'];

  				if ($site == "site") {

      $vid_filter2 = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter2)) {

        $video_fil2[] = $row['video'];
      }

                $view = "SELECT video_name, site_name, video FROM playlist_data WHERE site_name='$site' 
                                       AND video IN ( '" . implode( "', '" , $video_fil2 ) . "' ) GROUP BY video_name ASC LIMIT 1 ";
                $viewall = filterall($view);


                } else {

      $vid_filter2 = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter2)) {

        $video_fil2[] = $row['video'];
      }

                $view = "SELECT video_name, site_name, video FROM playlist_data WHERE site_name='$site' 
                                       AND video IN ( '" . implode( "', '" , $video_fil2 ) . "' ) GROUP BY video_name ASC LIMIT 1 ";
                $viewall = filterall($view);

               }
    
         } else {

        $activate = "Activate";
        $site = "GP Nagata - Hallway";

      $vid_filter2 = mysqli_query($con,"SELECT * FROM playlist_video WHERE site_name='$site' AND video_status='$activate' ");
      while($row = mysqli_fetch_assoc($vid_filter2)) {

        $video_fil2[] = $row['video'];
      }

                $view = "SELECT video_name, site_name, video FROM playlist_data WHERE site_name='$site' 
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
				<div class="tab-content" id="orders-table-tab-content">

					<!-- TABLE ACTIVE START -->
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">

                                   <table id="table1" class="table app-table-hover mb-0 text-left">
										<thead >
											<tr>
												<th class="cell" style="font-weight:normal; background: whitesmoke;  text-align: center;" colspan="3" > Status</th>
												<th class="cell" style="font-weight:normal; ">Site & Area</th>
												<th class="cell" style="font-weight:normal; ">Category</th>
												<th class="cell" style="font-weight:normal; ">Location</th>
												<th class="cell" style="font-weight:normal; ">Aircast Kit</th>
											</tr>
										</thead>
                                   <tbody>


              <?php

                include 'database/database.php';
                $query = mysqli_query($con,"select * from `site`  ORDER BY ID ASC");
                while($row = mysqli_fetch_array($query)){

               ?>

                                    <tr>
  
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
                 echo "<td class='cell' style='color: black; font-size: 12px; font-weight:normal;'> Active  </td>";

                    } else if ($kit == $site_kit) {

                 echo "<td class='cell' style='color: black; font-size: 12px; font-weight:normal;'> Inactive </td>";

                    } else if ($fullDays) {

                 echo "<td class='cell' style='color: black; font-size: 12px; font-weight:normal;'> $fullDays days - $fullHours hrs Ago  </td>";

                    } else if ($fullHours) {

                 echo "<td class='cell' style='color: black; font-size: 12px; font-weight:normal;'> $fullHours hrs - $fullMinutes mins Ago </td>";

                    } else {

                 echo "<td class='cell' style='color: black; font-size: 12px; font-weight:normal;'> $fullMinutes mins Ago  </td>";

                    }
                ?> 



<!-- ON / O FF -->
<td class="cell" >
<div class="wrapper">
    <a href="site_on_off.php?id=<?php echo $row['site_name']; ?>">
         <div class="icon time-on-off">
            <div class="tooltip">
              Time On/Off
            </div>
            <span class="nav-icon"><i><?php include 'icon/calendar.php'?></i></span>
         </div>
   </a>
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

<div class="app-card-footer mt-auto" style="float: right; padding: 5px 30px; ">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
        style="font-size: 13px; background: #006600; font-weight: normal; color: white;"> Add Site
</button>
</div>


						        </div>
						       
						    </div>	

					    </div>

			        </div>
			        <!-- TABLE ACTIVE END -->


			    </div>
			    <!-- TABLE END -->
			    








<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">


      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> Add Site </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


<form action="add/site_add.php" enctype="multipart/form-data" method="post" >


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0">
            


       <!-- SITE NAME -->
       <tr >
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" > Site Name </th>
                <th class="meta">
                    <input type="text" name="site_name" class="form-control" placeholder="Site Name" required
                            style="color: gray; font-size: 12px; font-weight:normal; background: none; ">
                </th>

      </tr>




       <!-- LOCATION -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Location </th>
                <th class="meta">
                    <input type="text" name="site_location"  class="form-control" placeholder="Location" required
                    style="color: gray; font-size: 12px; font-weight:normal; background: none; ">
                </th>

      </tr>






       <!--  ADDRESS -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Address </th>
                <th class="meta">
                    <input type="text" name="address"  class="form-control" placeholder="Address" required
                    style="color: gray; font-size: 12px; font-weight:normal; background: none; ">
                </th>

      </tr>







      <!-- CATEGORY -->
      <tr>      
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Category </th>
                <th class="meta">
                <select  name="site_category"  class="form-control" 
                         style="color: gray; font-size: 12px; font-weight:normal; background: none;" required>
                        <option value="" disabled selected> Select Category </option>
                        <option value="hospital"> Hospital </option>
                        <option value="convenience Store"> Convenience Store </option>
                        <option value="bar and restaurants"> Bar & Restaurants </option>
                        <option value="Offices"> Offices </option>
                        <option value="bpo"> BPO </option>
                        <option value="university"> University </option>
                        <option value="fitness center"> Fitness Center </option>
                        <option value="clinic"> Clinis </option>
                        <option value="lgu"> LGU </option>
                        <option value="salon and spa"> Salon & Spa </option>
                        <option value="airport"> Airport </option>
                        <option value="hotel and condominium"> Hotel & Condominium </option>
                </select>
                </th>

      </tr>






       <!--  TAGS -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Tags </th>
                <th class="meta">
                <select  name="site_tags"  class="form-control" 
                         style="color: gray; font-size: 12px; font-weight:normal; background: none;" required>
                        <option value="" disabled selected> Select Tags </option>
                        <option value="Fastfood"> Fastfood </option>
                        <option value="Business"> Business </option>
                        <option value="School"> School </option>
                </select>
                </th>

      </tr>






       <!-- AIRCAST KIT -->
       <tr>      
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Aircast Kit </th>
                <th class="meta">
                    <select name="site_kit" class="form-control"  required style="color: gray; font-size: 12px; font-weight:normal; background: none; height: 5vh">
                         <option value="" disabled selected > Aircast Kit </option>
                         <option value="Yes"> Yes  </option>
                         <option value="No"> No  </option>
                    </select>

                </th>

        </tr>





</table>  


</div>

</div>


      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                style="background: gray ; font-weight: normal;"> Close </button>

        <a href="add/site_add.php">
        <button type="submit" name="save" class="btn btn-primary" value="save"
                style="background: #006600 ; font-weight: normal;"> Save </button>
        </a>
      </div>


</form>


    </div>
  </div>
</div>



























	    </div><!--//app-content-->	    
    </div><!--//app-wrapper-->    					

    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>





</body>
</html> 

