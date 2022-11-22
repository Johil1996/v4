


<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | View Details </title>


</head> 

<body class="app">   	

<?php include'header.php' ?>


    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">

<?php

    include 'database/database.php';

    $site = $_POST['site_name'];

    $id = "SELECT * FROM playlist_video WHERE site_name='$site' and id ='".$_REQUEST['id']."'";
    $idResults = mysqli_query($con, $id);

    while ($rowid = mysqli_fetch_assoc($idResults)) {
       $video = $rowid['id'];
    }
    
    $site = $_POST['site_name'];

    $query = mysqli_query ($con,"SELECT * FROM playlist_video WHERE site_name='$site' and  id = '$video'");
    $row = mysqli_fetch_array ($query);

?>

<form method="POST" action="playlist_view_details_no_spots.php">


			    <!-- SEARCH START -->

			            <h1 class="app-page-title" style="font-weight: normal;"> Content | 
			            	<input type="text" value="<?php echo $row['site_name']; ?>"  style="color: gray; font-size: 15px; font-weight:normal; background: none; border: none; " >
			            </h1>

<input type="hidden" name="site_name" value="<?php echo $site;?>" id = "butt">

</form>

<?php  ?>










								    
  				 <!-- CONTENT START -->
		   		 <div class="row g-4 mb-4">

			    	<!--  START -->
				        <div class="app-card app-card-stats-table h-100 shadow-sm" >

				        	<!-- TITLE START -->
					        <div class="app-card-header p-3" >
						        <div class="row justify-content-between align-items-center" >

						        	<div class="col-auto">
								        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/video.php'?></span>Content Details</span>
								        </div>
							        </div>
						        </div>
					        </div>
					        <!-- TITLE END -->



<!-- FORM SAVE START -->

<?php

    include 'database/database.php';

    $site = $_POST['site_name'];

    $id = "SELECT * FROM playlist_video WHERE site_name='$site' and id ='".$_REQUEST['id']."'";
    $idResults = mysqli_query($con, $id);

    while ($rowid = mysqli_fetch_assoc($idResults)) {
       $video = $rowid['id'];
    }
    
    $site = $_POST['site_name'];

    $query = mysqli_query ($con,"SELECT * FROM playlist_video WHERE site_name='$site' and  id = '$video'");
    $row = mysqli_fetch_array ($query);

?>

<form method="POST" action="playlist_view_details_no_spots.php">



				<!-- VIDEO PLAYER START -->
			    <div class="row g-4 mb-4" style="margin-left: 20px">

			    	<!-- START -->
			    	<div class="col-12 col-lg-6" style="margin-top: 55px">



					      <!-- VIDEO PLAYER START -->
			            <div class="row g-4 mb-4">

              				    <video src="<?php echo $row['video'] ?>" autoplay loop controls ></video>

<script>
document.getElementById("videoUpload")
.onchange = function(event) {
  let file = event.target.files[0];
  let blobURL = URL.createObjectURL(file);
  document.querySelector("video").src = blobURL;
}
</script>

				  		</div>

			        </div>
			        <!-- END -->


 					<!-- SEARCH BUTTON START -->
			        <div class="col-12 col-lg-6">


					        
<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

		<div class="table-responsive">

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

		</thead>

    </table>
									
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





































				<!-- DATE RANGES START -->
			    <div class="row g-4 mb-4">


 					<!-- START -->
				        <div class="app-card app-card-stats-table h-100 shadow-sm" >
				        	<!-- TITLE START -->
					        <div class="app-card-header p-3" >
						        <div class="row justify-content-between align-items-center" >
						        	<div class="col-auto">
								        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/calendar.php'?> </span>Date Ranges</span>
								        </div>
							        </div>
						        </div>
					        </div>
					        <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

		<div class="table-responsive">

<table class="table table-borderless mb-0">
						
		<thead>


			<tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Start Date  </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> End Date </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal; width: 15%"> Campaign Duration </th>
			</tr>


		</thead>

		<tbody>
			
           <tr>


           	<!-- START -->
           	<td class="cell">
                <input type="text" name="play_start" value="<?php echo date("F d, Y", strtotime ($row['play_start']));?>" id="start_date_Cal" placeholder="Date" disabled
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none;  " class="form-control form-control-md" >  
            </td>



           	<!-- END -->
           	<td class="cell">
                <input type="text" name="end_start" value="<?php echo date("F d, Y", strtotime ($row['end_start']));?>"   id="end_date_Cal" placeholder="Date" disabled
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md" > 
            </td>

            <td class="meta">
                <input type="int" name="campaign_duration"  value="<?php echo $row['campaign_duration']; ?>"   id="campaign_duration_Cal" placeholder="None" disabled
                	   style="color: gray; font-size: 12px; font-weight:normal;background: none;  " class="form-control form-control-md" >  
            </td>


        </tr>

    </tbody>

    </table>
									
	</div>

</div>
<!-- TABLE END -->

					       
			        </div>
			        <!-- END -->

			    </div>
			    <!-- DATE RANGES END -->





<!-- --------------------       --------------------->





				<!-- DAYS START -->
			    <div class="row g-4 mb-4">				     

 					<!-- START -->
				        <div class="app-card app-card-stats-table h-100 shadow-sm" >

				        	<!-- TITLE START -->
					        <div class="app-card-header p-3" >
						        <div class="row justify-content-between align-items-center" >

						        	<div class="col-auto">
								        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/calendar-check.php'?> </span>Days</span>
								        </div>
							        </div>
						        </div>
					        </div>
					        <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

		<div class="table-responsive">

<table class="table table-borderless mb-0">
						
		<thead>

			<tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Monday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Tuesday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Wednesday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Thusday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Friday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Saturday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Sunday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Days Appearance </th>

			</tr>


		</thead>

		<tbody>
			
           <tr>

           	<!-- MONDAY -->
           	<td class="cell">

                <?php

                $start = ($row['monday']);
                $end = "Mon";

                if ($start == $end) {

                 echo "<input type='int' name='monday'  value='Yes'  id='monday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='monday'  value='No'  id='monday_Cal' placeholder='None' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none; ' class='form-control form-control-md'>";

                    }

                ?>

            </td>


            <!-- THUSDAY -->
           	<td class="cell">

                <?php

                $start = ($row['tuesday']);
                $end = "Tue";

                if ($start == $end) {

                 echo "<input type='int' name='tuesday'  value='Yes'   id='tuesday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'> ";

                    }  else {

                 echo "<input type='int' name='tuesday'  value='No'   id='tuesday_Cal' placeholder='None' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none; ' class='form-control form-control-md'> ";

                    }

                ?>           		

            </td>

            <!-- WENESDAY -->
           	<td class="cell">

                <?php

                $start = ($row['wednesday']);
                $end = "Wed";

                if ($start == $end) {

                 echo "<input type='int' name='wednesday' value='Yes' id='wednesday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='wednesday' value='No' id='wednesday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none; ' class='form-control form-control-md'>";

                    }

                ?>  

            </td>

            <!-- THURSDAY -->
           	<td class="cell">

                <?php

                $start = ($row['thursday']);
                $end = "Thu";

                if ($start == $end) {

                 echo "<input type='int' name='thursday'  value='Yes' id='thursday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='thursday'  value='No' id='thursday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }

                ?>  
          	
            </td>

            <!-- FRIDAY -->
           	<td class="cell">

                <?php

                $start = ($row['friday']);
                $end = "Fri";

                if ($start == $end) {

                 echo "<input type='int' name='friday' value='Yes' id='friday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='friday' value='No' id='friday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal;background: none;' class='form-control form-control-md'>";

                    }

                ?>             		  

            </td>

            <!-- SATURDAY -->
           	<td class="cell">

                <?php

                $start = ($row['saturday']);
                $end = "Sat";

                if ($start == $end) {

                 echo "<input type='int' name='saturday'  value='Yes' id='saturday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='saturday'  value='No' id='saturday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }

                ?>             		

            </td>

            <!-- SUNDAY -->
           	<td class="cell">

                <?php

                $start = ($row['sunday']);
                $end = "Sun";

                if ($start == $end) {

                 echo "<input type='int' name='sunday'  value='Yes'  id='sunday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='sunday'  value='No'  id='sunday_Cal' disabled
                	   style='color: gray; font-size: 12px; font-weight:normal;background: none;' class='form-control form-control-md'>";

                    }

                ?>            		 

            </td>



            <td class="meta">
                <input type="int" name="days_appearance"  value="<?php echo $row['days_appearance']; ?>"   id="days_appearance_Cal" placeholder="None" disabled
                       style="color: gray; font-size: 12px; font-weight:normal;background: none;  " class="form-control form-control-md" >  
            </td>





           </tr>

		</tbody>

    </table>
									
	</div>

</div>
<!-- TABLE END -->

					                
			        </div>
			        <!-- END -->


			    </div>
			    <!-- DAYS END -->




























<!-- ---------------      -------------------------->


				<!-- HOUSR START -->
			    <div class="row g-4 mb-4">

 					<!-- START -->
				        <div class="app-card app-card-stats-table h-100 shadow-sm" >

				        	<!-- TITLE START -->
					        <div class="app-card-header p-3" >
						        <div class="row justify-content-between align-items-center" >

						        	<div class="col-auto">
								        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/clock.php'?> </span>Time Aired Per Day</span> 
								        </div>
							        </div>
						        </div>
					        </div>
					        <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

		<div class="table-responsive">

<table class="table table-borderless mb-0">
						
		<thead>

			<tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 8:00 AM - 10:00 AM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 10:00 AM - 12:00 PM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 12:00 PM - 2:00 PM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 2:00 PM - 4:00 PM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 4:00 PM - 6:00 PM </th>

			</tr>


		</thead>

		<tbody>
			
           <tr>

           	<!-- 8:00 AM - 10:00 AM -->
           	<td class="cell">
  
                <?php

                $start = ($row['AA']);
                $end = "0";

                if ($start > $end) {

                 echo "<input type='int' name='AA' id='A_Cal' disabled  value='Yes' 
                       style='color: gray; font-size: 12px; font-weight:normal; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='AA' id='A_Cal' disabled  value='No'
                       style='color: gray; font-size: 12px; font-weight:normal;background: none;' class='form-control form-control-md'>";

                    }

                ?>

            </td>

            <!-- 10:00 AM - 12:00 PM -->
           	<td class="cell">

                <?php

                $start = ($row['BB']);
                $end = "0";

                if ($start > $end) {

                 echo "<input type='int' name='BB' id='B_Cal' disabled value='Yes' 
    				   style='color: gray; font-size: 12px; font-weight:normal ; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='BB' id='B_Cal' disabled value='No' 
    				   style='color: gray; font-size: 12px; font-weight:normal; background: none; ' class='form-control form-control-md'>";

                    }

                ?>
    				  			 	
            </td>

            <!-- 12:00 PM - 2:00 PM -->
           	<td class="cell">

                <?php

                $start = ($row['CC']);
                $end = "0";

                if ($start > $end) {

                 echo "<input type='int' name='CC' id='C_Cal' disabled value='Yes' 
  					  style='color: gray; font-size: 12px; font-weight:normal ; background: none; ' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='CC' id='C_Cal' disabled value='No' 
  					  style='color: gray; font-size: 12px; font-weight:normal;background: none;  ' class='form-control form-control-md'>";

                    }

                ?>
    				  	  	
            </td>

            <!-- 2:00 PM - 4:00 PM -->
           	<td class="cell">

                <?php

                $start = ($row['DD']);
                $end = "0";

                if ($start > $end) {

                 echo "<input type='int' name='DD' id='D_Cal' disabled value='Yes' 
   					   style='color: gray; font-size: 12px; font-weight:normal ; background: none; ' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='DD' id='D_Cal' disabled value='No' 
   					   style='color: gray; font-size: 12px; font-weight:normal; background: none; ' class='form-control form-control-md'>";

                    }

                ?>      

            </td>

            <!-- 4:00 PM - 6:00 PM -->
           	<td class="cell"> 

                <?php

                $start = ($row['EE']);
                $end = "0";

                if ($start > $end) {

                 echo "<input type='int' name='EE' id='E_Cal' disabled value='Yes' 
   					  style='color: gray; font-size: 12px; font-weight:normal ; background: none;' class='form-control form-control-md'>";

                    }  else {

                 echo "<input type='int' name='EE' id='E_Cal' disabled value='No' 
   					  style='color: gray; font-size: 12px; font-weight:normal; background: none; ' class='form-control form-control-md'>";

                    }

                ?>             		

            </td>

           </tr>


		</tbody>

    </table>									

	</div>

</div>
<!-- TABLE END -->

					        		        
			        </div>
			        <!-- END -->


			    </div>
			    <!-- HOURS END -->




















<!-- ---------------      -------------------------->


                <!-- TOTAL START -->
                <div class="row g-4 mb-4" hidden>


                    <!-- START -->
                        <div class="app-card app-card-stats-table h-100 shadow-sm" >

                            <!-- TITLE START -->
                            <div class="app-card-header p-3" >
                                <div class="row justify-content-between align-items-center" >

                                    <div class="col-auto">
                                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/tags.php'?> </span>Total Price & Spot</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

        <div class="table-responsive">

<table class="table table-borderless mb-0">
                        
        <thead>


            <tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spot </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Price </th>

            </tr>


        </thead>

        <tbody>

            <!-- TOTAL SPOTS -->
                <th class="meta">
                <input type="int" name="total_spots"  value="<?php echo $row['total_spots_per_site']; ?>"    id="total_spots_Cal" placeholder="Total Spots " readonly
                       style="color: gray; font-size: 12px; font-weight:normal; background: none;  " class="form-control form-control-md" >  
                </th>


            <!-- TOTAL PRICES -->
                <th class="meta">
                <input type="int" name="total_price" value="<?php echo $row['total_price']; ?>"   id="total_prices_Cal" placeholder="Total Price " readonly
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md" >  
                </th>

            </tr>

        </tbody>

    </table>
                            
                            
    </div>

</div>
<!-- TABLE END -->

                            
                    </div>
                    <!-- END -->

                </div>
                <!-- TOTAL END -->


<input type="hidden" name="site_name" value="<?php echo $site;?>" id = "butt">

</form>

<?php  ?>



						        </div>
						       
						    </div>	

						</div>
						
			        </div>
			        <!-- TABLE INACTIVE END -->

	    </div><!--//app-content-->	    
    </div><!--//app-wrapper-->    					


</body>
</html> 

