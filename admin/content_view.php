

<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Approved </title>


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



				<!-- VIDEO PLAYER START -->
			    <div class="row g-4 mb-4" style="margin-left: 20px;">

			    	<!-- START -->
			    	<div class="col-12 col-lg-6" style="margin-top: 55px">

				<!-- VIDEO PLAYER START -->
			    <div class="row g-4 mb-4">
<?php

    include 'database/database.php';
    $query = "SELECT * FROM `video` WHERE id = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
?>


									<video src="<?php echo $row['video']; ?>"  autoplay controls  ></video>				
					       
				</div>

			        </div>
			        <!-- END -->



 					<!-- SEARCH BUTTON START -->
			        <div class="col-12 col-lg-6">


<form>
					        
<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

		<div class="table-responsive">

<table class="table table-borderless mb-0">					

		<thead>


			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Title </th>
                <th>
                <input type="text" name="video_name" value="<?php echo $row['video_name']; ?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md">  </th>
			</tr>

			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Duration </th>
                <th >
                <input type="text" name="duration" value="<?php echo $row['duration'];?> Seconds" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md"> 
                </th>
			</tr>

			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spot </th>
                <th >
                <input type="text" name="duration" value="<?php echo $row['spots'];?> Spot" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md"> 
                 </th>
			</tr>


			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Category </th>
                <th >
                <input type="text" name="video_name" value="<?php echo $row['category'];?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md">  </th>
			</tr>

			<tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Status </th>
                <th>
                <input type="hidden" name="video_name" value="Approve" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal;background: none;  " class="form-control form-control-md">  </th>
			</tr>

			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Date Uploed </th>
                <th>
                <input type="text" name="video_name" value="<?php echo date("F d, Y - h:i A", strtotime ($row['date_time']));?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md">  
                </th>
			</tr>

			<tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Uploeded By</th>
                <th>
                <input type="text" name="name"  value="<?php echo $row['name'];?>" readonly
                	   style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md">  
                </th>
			</tr>

		</thead>

    </table>
									
	</div>

</div>
<!-- TABLE END -->
 
 <?php } ?>		

	
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



