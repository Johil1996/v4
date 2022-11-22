


<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Pending </title>


</head> 

<body class="app">   	

<?php include'header.php' ?>

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">

			    <!-- WELCOME START -->
			    <h1 class="app-page-title" style="font-weight: normal;">Content</h1>
			    

	 

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
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/video.php'?></span>Content Details</span>
								        </div>
							        </div>
						        </div>
					        </div>
					        <!-- TITLE END -->

<?php

    include 'database/database.php';
    $query = "SELECT * FROM `video` WHERE `id` = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
?>

				<!-- VIDEO PLAYER START -->
			    <div class="row g-4 mb-4">

			    	<!-- START -->
			    	<div class="col-12 col-lg-6">


                  <!-- VIDEO PLAYER START -->
                  <div class="row g-4 mb-4" style="margin-top: 20px; margin-left:20px;">



									<video src="<?php echo $row['video']; ?>"  autoplay controls  ></video>				
					       
				</div>

			        </div>
			        <!-- END -->



 					<!-- SEARCH BUTTON START -->
			        <div class="col-12 col-lg-6">


<form method="POST" action="update/content_update.php" style="margin-top:-15px">
					        
<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

		<div class="table-responsive">

<table class="table table-borderless mb-0">					

		<thead>

			 <tr>
                <th>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" readonly 
                	   style="color: gray; font-size: 13px; font-weight:normal; background: none; " class="form-control form-control-md">  </th>

			</tr>


			 <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" hidden> File Name </th>
                <th>
                <input type="hidden" name="video" value="<?php echo $row['video']; ?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal;  " class="form-control form-control-md">  </th>

			</tr>

			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Title </th>
                <th>
                <input type="text" name="video_name" value="<?php echo $row['video_name']; ?>" 
                	   style="color: gray; font-size: 12px; font-weight:normal;  " class="form-control">  </th>
			</tr>

			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Duration </th>
                <th >
                <input type="text" name="duration" value="<?php echo $row['duration'];?> Seconds" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal;  " class="form-control"> 
                 </th>
			</tr>

			<tr >
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spot </th>
                <th >
                <input type="text" name="spots" value="<?php echo $row['spots'];?> Spots" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal;  " class="form-control"> 
                </th>
			</tr>

			<tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Category </th>
                <th >
                <input type="text" name="category" value="<?php echo $row['category'];?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal;  " class="form-control"> 
                </th>
			</tr>

			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Date Published</th>
                <th>
                <input type="text" name="date_time" value="<?php echo date("F d, Y - h:i A", strtotime ($row['date_time']));?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal;  " class="form-control">  
                </th>
			</tr>

			<tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" > Uploaded By </th>
                <th>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; " class="form-control">  
                </th>
			</tr>


			<tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" > Status </th>
                <th>
                <input type="hidden" name="status" value="<?php echo $row['status']; ?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; " class="form-control">  
                </th>
			</tr>


			<tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spot </th>
                <th >
                <input type="text" name="video_spots_no_yes" value="<?php echo $row['video_spots_no_yes'];?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal;  " class="form-control"> 
                </th>
			</tr>

		</thead>

    </table>
									
	</div>

</div>
<!-- TABLE END -->
<?php } ?>


	                        <div class="app-card-footer mt-auto" style="float: right; padding: 5px 30px; ">
									<button  type="submit" name="save"   class="btn btn-primary"  
									style="font-size: 13px; background: #006600; font-weight: normal; color: white;" > Update </button>
						    </div>


	
</form>


				    </div>
				    <!-- END -->

			        </div>
			        <!-- CONTENT END -->



			        </div>
			        <!-- SEARCH BUTTON END -->

			    </div>
			    <!-- VIDEO PLAYER START -->



 
</div>



	    </div><!--//app-content-->	    
    </div><!--//app-wrapper-->    					



</body>
</html> 

