

<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast |  Site Table </title>


</head> 


<body class="app">   	

<?php include'header.php' ?>

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

<?php


    include 'database/database.php';

    $video_name1 = $_REQUEST['id'];

    $query = "SELECT * FROM `video` WHERE video_name = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
?>

	
			    <!-- WELCOME START -->
			    <h1 class="app-page-title" style="font-weight: normal"> Add Content to Playlist  | 
			    <span style="color: black; font-size: 15px; font-weight:normal;"><?php echo $row['video_name'];?></span></h1>
			    
<?php } ?>

			    <!-- AIRCAST INFO START -->
			    <div class="row g-4 mb-4">



                <!-- TABLE START -->
				<div class="tab-content" id="orders-table-tab-content">


					<!-- TABLE ACTIVE START -->
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
				        <div class="app-card app-card-stats-table h-100 shadow-sm">
			
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">


                                   <table id="table1" class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell" colspan="2" style="text-align: center;">Site & Area</th>
												<th class="cell">Category</th>
												<th class="cell">Location</th>
												<th class="cell">Tags</th>
											</tr>
										</thead>
                                   <tbody>






    <?php

      $vid = array();

      $con = mysqli_connect("localhost", "root", "", "aircast") or die("connection failed");

      $q = mysqli_query($con,"SELECT * FROM playlist_video WHERE video_name = '$video_name1' AND video_status= 'Activate'");
      while($row = mysqli_fetch_assoc($q)) {
        
        $vid[] = $row['site_name'];
      }

      $query = mysqli_query($con, "SELECT * FROM site WHERE site_name NOT IN ( '" . implode( "', '" , $vid ) . "' ) ORDER BY id ASC");
      while($row = mysqli_fetch_array($query)){ 

     ?>


                        <tr>

                        <td></td>
                        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_name'];?></td>
                        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_category'];?></td>
                        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_location'];?></td>
                        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_tags'];?></td>

                          <td class="cell">

                            <div class="app-card-footer mt-auto">
                               <a href="playlist_add.php?id=<?php echo $row['site_name'];?>"> 
                                    <button class="btn app-btn-secondary" style="font-size: 13px; "> Add </button></a>
                            </div>

                          </td>


						</tr>

      <?php  } ?>

        </tbody>

    </table>

</form>




						        </div>
						       
						    </div>	

					    </div>

			        </div>
			        <!-- TABLE ACTIVE END -->


			    </div>
			    <!-- TABLE END -->
			    












		    </div><!--//container-fluid-->
	    </div><!--//app-content-->	    
    </div><!--//app-wrapper-->    					

    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>

</body>
</html> 

