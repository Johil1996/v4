

<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Playlist </title>


</head> 

<body class="app"> 

<?php include 'header.php'; ?>

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
			    


<?php

    include 'database/database.php';
    $id = "SELECT * FROM site WHERE site_name ='".$_REQUEST['id']."'";
    $idResults = mysqli_query($con, $id);

    while ($rowid = mysqli_fetch_assoc($idResults)) {
       $id = $rowid['site_name'];
    }
    
    $query = mysqli_query ($con,"SELECT * FROM site WHERE site_name = '$id'");
    $row = mysqli_fetch_array ($query);

?>

			    <!-- SEARCH START -->
			            <h1 class="app-page-title"  style="font-weight: normal;"> Playlist | 
			            	<input type="text" value="<?php echo $row['site_name']; ?>"  style="color: black; font-size: 15px; font-weight:normal; background: none; border: none; " disabled >
			            </h1>


<?php ?>
			    
			    <!-- SEARCH END -->


			    <!-- MODAL START -->
			    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">

				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true" style="font-weight: normal; font-family: sans-serif;">Active</a>

				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false" style="font-weight: normal; font-family: sans-serif;">Inactive</a>

                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false" style="font-weight: normal; font-family: sans-serif;">Complate</a>

				</nav>
				<!-- MODAL END -->
				
				

                <!-- TABLE START -->
				<div class="tab-content" id="orders-table-tab-content">


					<!-- TABLE ACTIVE START -->
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


							 <div class="app-card-header p-3">
						        	<div class="col-auto">
								        <div class="card-header-action"> <span style="color: black;"> All Content </span>
								        </div>
							        </div>
					          </div>

				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">

							        <table id="table1" class="table app-table-hover mb-0 text-left">
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
												<th class="cell" style="font-weight:normal; " >Details</th>
											</tr>
										</thead>
										<tbody>







<?php
    
    include 'database/database.php';

    $date = date('Y-m-d');
    $active = "Activate";
    $site = $_REQUEST['id'];  
    
    $query = "SELECT * FROM playlist_video WHERE video_status = '$active' AND  end_start >= '$date' AND site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    

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

                 if ($row['video_status'] > $Activate) {

                } else {
                 echo "<button class='activate_btn'> <i class='fa fa-eye' style='margin-left: -10px'></i> <span style='margin-left: 5px'> Active</span> </button>";

                }

                ?>

                <div class="dropdown-content">
                <a href='active_inactive/deactivate.php?id=<?php echo $row['id'];?>' onclick='return Deactivate()'>Deactivate</a>
                </div>


                </div>
				</td>



<td class="cell" style="text-align: center;">



                <?php 

                 $Yes = "Yes";
                 $id = ($row['id']);
                 $site_name = ($row['site_name']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='playlist_view_details.php?id=$id'>

                      <div class='app-card-footer mt-auto'>
                               <a href='playlist_view_details.php?id=$id'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='site_name' value='$site_name'>
 <input type='hidden' name='id' value='$id'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='playlist_view_details_no_spots.php?id=$id'>

                      <div class='app-card-footer mt-auto'>
                               <a href='playlist_view_details_no_spots.php?id=$id'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='site_name' value='$site_name'>
 <input type='hidden' name='id' value='$id'>
 
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
						
    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>



























							 <div class="app-card-header p-3" style="margin-top: 20px">
						        	<div class="col-auto">
								        <div class="card-header-action"> <span style="color: black;"> Timed Aired : 8am to 10am </span>
								        </div>
							        </div>
					          </div>


				        <div class="app-card app-card-stats-table h-100 shadow-sm" >
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">

							        <table id="example" class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
								            	<th class="cell" style="text-align: center; font-weight:normal;">Content</th>
												<th class="cell" style=" font-weight:normal;" >Title</th>
												<th class="cell" style=" font-weight:normal;" >Duration</th>
												<th class="cell" style=" font-weight:normal;" >Category</th>
												<th class="cell" style=" font-weight:normal;" >From Date / To Date</th>
												<th class="cell" style=" font-weight:normal;" >Days </th>
												<th class="cell" style=" font-weight:normal;" >Time Aired </th>
												<th class="cell" style=" font-weight:normal;" >Status</th>
											</tr>
										</thead>
										<tbody>


<?php
    
    $date = date('Y-m-d');
    $active = "Activate";
    $a = "810";

    include 'database/database.php';
    $query = "SELECT * FROM playlist_video WHERE  end_start >= '$date' AND video_status='$active' AND eigth_to_ten='$a' AND site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

?>

				<tr>

				<td class="cell" style="text-align: center;"> <video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
				</td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo $row['monday'];?> / <?php echo $row['tuesday'];?> / <?php echo $row['wednesday'];?> / <?php echo $row['thursday'];?> / 
				    <?php echo $row['friday'];?> / <?php echo $row['saturday'];?> / <?php echo $row['sunday'];?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Days</span>
				</td>	

				<td class="cell" style="color: black; font-size: 12px; font-weight:normal;"> 8am to 10pm 
					<br><span style="color: black; font-size: 11px; color: gray;">Frequency - <?php echo $row['AA'];?></span>
				</td>	


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

		        <?php } ?>

										</tbody>

									</table>

						        </div>
						       
						    </div>	

						</div>
						


    <script>

    // Simple Datatable
    let example = document.querySelector('#example');
    let A = new time.DataTable(example);

    </script>   











							 <div class="app-card-header p-3" style="margin-top: 20px">
						        	<div class="col-auto">
								        <div class="card-header-action"> <span style="color: black;"> Timed Aired : 10am to 12pm </span>
								        </div>
							        </div>
					          </div>


				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">

							        <table id="example1" class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
								            	<th class="cell" style="text-align: center; font-weight:normal;">Content</th>
												<th class="cell" style=" font-weight:normal;" >Title</th>
												<th class="cell" style=" font-weight:normal;" >Duration</th>
												<th class="cell" style=" font-weight:normal;" >Category</th>
												<th class="cell" style=" font-weight:normal;" >From Date / To Date</th>
												<th class="cell" style=" font-weight:normal;" >Days </th>
												<th class="cell" style=" font-weight:normal;" >Time Aired </th>
												<th class="cell" style=" font-weight:normal;" >Status</th>
											</tr>
										</thead>
										<tbody>

<?php
    
    $date = date('Y-m-d');
    $active = "Activate";
    $b = "1012";

    include 'database/database.php';
    $query = "SELECT * FROM playlist_video WHERE  end_start >= '$date' AND video_status='$active' AND ten_to_twelve='$b' AND site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

?>

				<tr>

				<td class="cell" style="text-align: center;"> <video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
				</td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo $row['monday'];?> / <?php echo $row['tuesday'];?> / <?php echo $row['wednesday'];?> / <?php echo $row['thursday'];?> / 
				    <?php echo $row['friday'];?> / <?php echo $row['saturday'];?> / <?php echo $row['sunday'];?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Days</span>
				</td>	

				<td class="cell" style="color: black; font-size: 12px; font-weight:normal;"> 10am to 12pm 
					<br><span style="color: black; font-size: 11px; color: gray;">Frequency - <?php echo $row['AA'];?></span>
				</td>	


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

		        <?php } ?>



										</tbody>

									</table>

						        </div>
						       
						    </div>	

						</div>
						

    <script>

    // Simple Datatable
    let example1 = document.querySelector('#example1');
    let B = new time1.DataTable(example1);

    </script>   









						 <div class="app-card-header p-3" style="margin-top: 20px">
						        	<div class="col-auto">
								        <div class="card-header-action"> <span style="color: black;"> Timed Aired : 12pm to 2pm </span>
								        </div>
							        </div>
					          </div>


				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">


							        <table id="example2" class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
								            	<th class="cell" style="text-align: center; font-weight:normal;">Content</th>
												<th class="cell" style=" font-weight:normal;" >Title</th>
												<th class="cell" style=" font-weight:normal;" >Duration</th>
												<th class="cell" style=" font-weight:normal;" >Category</th>
												<th class="cell" style=" font-weight:normal;" >From Date / To Date</th>
												<th class="cell" style=" font-weight:normal;" >Days </th>
												<th class="cell" style=" font-weight:normal;" >Time Aired </th>
												<th class="cell" style=" font-weight:normal;" >Status</th>
											</tr>
										</thead>
										<tbody>


<?php
   
    $date = date('Y-m-d');
    $active = "Activate";
    $c = "122";

    include 'database/database.php';
    $query = "SELECT * FROM playlist_video WHERE  end_start >= '$date' AND video_status='$active' AND twelve_to_two='$c' AND site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

?>

				<tr>

				<td class="cell" style="text-align: center;"> <video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
				</td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo $row['monday'];?> / <?php echo $row['tuesday'];?> / <?php echo $row['wednesday'];?> / <?php echo $row['thursday'];?> / 
				    <?php echo $row['friday'];?> / <?php echo $row['saturday'];?> / <?php echo $row['sunday'];?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Days</span>
				</td>	

				<td class="cell" style="color: black; font-size: 12px; font-weight:normal;"> 12pm to 2pm 
					<br><span style="color: black; font-size: 11px; color: gray;">Frequency - <?php echo $row['AA'];?></span>
				</td>		


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

		        <?php } ?>


										</tbody>

									</table>

						        </div>
						       
						    </div>	

						</div>


    <script>

    // Simple Datatable
    let example2 = document.querySelector('#example2');
    let C = new time2.DataTable(example2);

    </script>   








						 <div class="app-card-header p-3" style="margin-top: 20px">
						        	<div class="col-auto">
								        <div class="card-header-action"> <span style="color: black;"> Timed Aired : 2pm to 4pm </span>
								        </div>
							        </div>
					          </div>


				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">


							        <table id="example3" class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
								            	<th class="cell" style="text-align: center; font-weight:normal;">Content</th>
												<th class="cell" style=" font-weight:normal;" >Title</th>
												<th class="cell" style=" font-weight:normal;" >Duration</th>
												<th class="cell" style=" font-weight:normal;" >Category</th>
												<th class="cell" style=" font-weight:normal;" >From Date / To Date</th>
												<th class="cell" style=" font-weight:normal;" >Days </th>
												<th class="cell" style=" font-weight:normal;" >Time Aired </th>
												<th class="cell" style=" font-weight:normal;" >Status</th>
											</tr>
										</thead>
										<tbody>


<?php
   
    $date = date('Y-m-d');
    $active = "Activate";
    $d = "24";

    include 'database/database.php';
    $query = "SELECT * FROM playlist_video WHERE  end_start >= '$date' AND video_status='$active' AND two_to_four='$d' AND site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

?>

				<tr>

				<td class="cell" style="text-align: center;"> <video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
				</td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo $row['monday'];?> / <?php echo $row['tuesday'];?> / <?php echo $row['wednesday'];?> / <?php echo $row['thursday'];?> / 
				    <?php echo $row['friday'];?> / <?php echo $row['saturday'];?> / <?php echo $row['sunday'];?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Days</span>
				</td>	

				<td class="cell" style="color: black; font-size: 12px; font-weight:normal;"> 2pm to 4pm 
					<br><span style="color: black; font-size: 11px; color: gray;">Frequency - <?php echo $row['AA'];?></span>
				</td>		


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

		        <?php } ?>

										</tbody>

									</table>

						        </div>
						       
						    </div>	

						</div>


    <script>

    // Simple Datatable
    let example3 = document.querySelector('#example3');
    let D = new time3.DataTable(example3);

    </script>   






						 <div class="app-card-header p-3" style="margin-top: 20px">
						        	<div class="col-auto">
								        <div class="card-header-action"> <span style="color: black;"> Timed Aired : 4pm to 6pm </span>
								        </div>
							        </div>
					          </div>


				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">


							        <table id="example4" class="table app-table-hover mb-0 text-left">
										<thead >
											<tr>
								            	<th class="cell" style="text-align: center; font-weight:normal;">Content</th>
												<th class="cell" style=" font-weight:normal;" >Title</th>
												<th class="cell" style=" font-weight:normal;" >Duration</th>
												<th class="cell" style=" font-weight:normal;" >Category</th>
												<th class="cell" style=" font-weight:normal;" >From Date / To Date</th>
												<th class="cell" style=" font-weight:normal;" >Days </th>
												<th class="cell" style=" font-weight:normal;" >Time Aired </th>
												<th class="cell" style=" font-weight:normal;" >Status</th>
											</tr>
										</thead>
										<tbody>


<?php
   
    $date = date('Y-m-d');
    $active = "Activate";
    $e = "46";

    include 'database/database.php';
    $query = "SELECT * FROM playlist_video WHERE  end_start >= '$date' AND video_status='$active' AND four_to_six='$e' AND site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

?>

				<tr>

				<td class="cell" style="text-align: center;"> <video src="<?php echo $row['video'];?>" autoplay muted loop width="90" height="50"></video></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['video_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs</td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['category'];?></td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo date("M d, Y", strtotime ($row['play_start']));?> / <?php echo date("M d, Y", strtotime ($row['end_start']));?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Campaign Duartion</span>
				</td>

                <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 19%;">
				    <?php echo $row['monday'];?> / <?php echo $row['tuesday'];?> / <?php echo $row['wednesday'];?> / <?php echo $row['thursday'];?> / 
				    <?php echo $row['friday'];?> / <?php echo $row['saturday'];?> / <?php echo $row['sunday'];?>
				    <br><span style="color: black; font-size: 11px; color: gray;">Days</span>
				</td>	

				<td class="cell" style="color: black; font-size: 12px; font-weight:normal;"> 4pm to 6pm 
					<br><span style="color: black; font-size: 11px; color: gray;">Frequency - <?php echo $row['AA'];?></span>
				</td>	


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
    let example4 = document.querySelector('#example4');
    let E = new time4.DataTable(example4);

    </script>   












			        <!-- TABLE INACTIVE START -->
			        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">

				        <div class="app-card app-card-stats-table h-100 shadow-sm">
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">
						        	
							        <table id="inactive_a" class="table app-table-hover mb-0 text-left">
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
												<th class="cell" style="font-weight:normal; " >Details</th>
											</tr>
										</thead>
										<tbody>
<?php
    
    include 'database/database.php';

    $date = date('y-m-d');
    $Deactivate = "Deactivate";
    $site = $_REQUEST['id'];  
    
    $query = "SELECT * FROM playlist_video WHERE video_status = '$Deactivate' AND end_start > '$date' AND
    site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

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
                 echo "<button class='deactivate_btn'> <i class='fa fa-eye-slash' style='margin-left: -10px'></i>
                  <span style='margin-left: 5px'> Inactive </span> </button>";

                }

                ?>

                <div class="dropdown-content">
                <a href='active_inactive/activate.php?id=<?php echo $row['id'];?>' onclick='return Activate()'>Activate</a>
                <a hidden href='delete/playlist_inactive_delete.php?id=<?php echo $row['id'];?>' onclick='return Activate()'>Delete</a>
                </div>


                </div>
				</td>
				
    <script>
        function checkdelete()
        {

        return confirm ('Are you sure you want to Delete this Content');
    }
    </script>


<td class="cell" style="text-align: center;">



                <?php 

                 $Yes = "Yes";
                 $id = ($row['id']);
                 $site_name = ($row['site_name']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='playlist_view_details.php?id=$id'>

                      <div class='app-card-footer mt-auto'>
                               <a href='playlist_view_details.php?id=$id'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='site_name' value='$site_name'>
 <input type='hidden' name='id' value='$id'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='playlist_view_details_no_spots.php?id=$id'>

                      <div class='app-card-footer mt-auto'>
                               <a href='playlist_view_details_no_spots.php?id=$id'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='site_name' value='$site_name'>
 <input type='hidden' name='id' value='$id'>
 
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










                <!-- TABLE START -->
                    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">
							        <table id="Site_Partner" class="table app-table-hover mb-0 text-left">
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
												<th class="cell" style="font-weight:normal; " >Details</th>
											</tr>
										</thead>
										<tbody>
<?php

    include 'database/database.php';

    $date = date('Y-m-d');
    $Deactivate = "Deactivate";
    $site = $_REQUEST['id'];  
    
    $query = "SELECT * FROM playlist_video WHERE end_start <= '$date' AND video_status = '$Deactivate' AND
    site_name = '".$_REQUEST['id']."' ORDER by id DESC ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

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
                 <i class='fa fa-eye-slash' style='margin-left: -10px; color: red'></i> <span style='margin-left: 5px'> Deactivate </span> </h3>";
                }

                ?>

                </div>
				</td>
				



<td class="cell" style="text-align: center;">



                <?php 

                 $Yes = "Yes";
                 $id = ($row['id']);
                 $site_name = ($row['site_name']);

                 if ($row['video_spots_no_yes'] == $Yes) {



echo "

<form method='POST' action='playlist_view_details.php?id=$id'>

                      <div class='app-card-footer mt-auto'>
                               <a href='playlist_view_details.php?id=$id'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='site_name' value='$site_name'>
 <input type='hidden' name='id' value='$id'>

 </form>

 </td>";
                } else {


echo " 

 <form method='POST' action='playlist_view_details_no_spots.php?id=$id'>

                      <div class='app-card-footer mt-auto'>
                               <a href='playlist_view_details_no_spots.php?id=$id'> 
                                    <button class='btn app-btn-secondary' 
                                    style='font-size: 12px; font-family: sans-serif;'> View </button>
                                </a>
                            </div>

 <input type='hidden' name='site_name' value='$site_name'>
 <input type='hidden' name='id' value='$id'>
 
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
    <script>

    // Simple Datatable
    let Site_Partner = document.querySelector('#Site_Partner');
    let B = new jojo1.DataTable(Site_Partner);

    </script>   

						

			        </div>
			        <!-- TABLE ACTIVE START -->
			        







				</div><!--//tab-content-->
				<!-- TABLE END -->
				


			    
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->    					

 


</body>
</html> 

