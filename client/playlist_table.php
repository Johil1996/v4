

<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Spot Per Site Table </title>


</head> 


<body class="app">   	

<?php include'header.php' ?>

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">

			    <!-- WELCOME START -->
			    <h1 class="app-page-title" style="font-weight: normal"> Playlist </h1>
			    


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
												<th class="cell">Content</th>
											</tr>
										</thead>
                                   <tbody>

     <?php
         $select = mysqli_query($con, "SELECT * FROM account WHERE id = '$user_type'");
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
      ?>



              <?php

                $Name = $fetch['name'];  

                include 'database/database.php';
                $query = mysqli_query($con,"SELECT site_name, name, active, inactive, video_status, SUM(active) AS active, SUM(inactive) AS inactive FROM playlist_video
                                           WHERE name='$Name'  GROUP BY site_name");
                while($row = mysqli_fetch_array($query)){

               ?>

                        <tr>

                        <td></td>
                        <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 70%"><?php echo $row['site_name'];?></td>

						<td class="cell" style="color: black; font-size: 12px; font-weight:normal;">
							   <?php echo $row['active'];?> Active /  <?php echo $row['inactive'];?> Inactive
               
                               <a href="playlist.php?id=<?php echo $row['site_name']; ?>" style="margin-left: 20px;"> 
                                    <button class="btn app-btn-secondary" style="font-size: 12px; font-family: sans-serif;"> View All</button>
                               </a>
                           
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
			    





	    </div><!--//app-content-->	    
    </div><!--//app-wrapper-->    					

    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>




</body>
</html> 

