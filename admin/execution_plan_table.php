

<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Execution Plan Table </title>


</head> 


<body class="app">   	

<?php include'header.php' ?>

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">

			    <!-- WELCOME START -->
			    <h1 class="app-page-title" style="font-weight: normal"> Execution Plan per Site </h1>
			    

			    <!-- AIRCAST INFO START -->
			    <div class="row g-4 mb-4">

				

                <!-- TABLE START -->
				<div class="tab-content" id="orders-table-tab-content">

				        <div class="app-card app-card-stats-table h-100 shadow-sm">

                                  <!-- TITLE START -->
                            <div class="app-card-header p-3" >
                                <div class="row justify-content-between align-items-center" >

                                    <div class="col-auto">
                                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/collection.php'?></span>Playlist</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TITLE END -->      			

					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">

                                 <table id="table1" class="table app-table-hover mb-0 text-left">
										<thead >
											<tr>
												<th class="cell" colspan="2" style="text-align: center;">Site & Area</th>
												<th class="cell" style="font-weight: normal;">Content</th>
											</tr>
										</thead>
                                   <tbody>





              <?php

                include 'database/database.php';
                $query = mysqli_query($con,"SELECT site_name, active, inactive, video_status, SUM(active) AS active, SUM(inactive) AS inactive 
                	                       FROM playlist_video GROUP BY site_name");
                while($row = mysqli_fetch_array($query)) {

               ?>

                        <tr>

                        <td></td>
                        <td class="cell" style="color: black; font-size: 12px; font-weight:normal; width: 70%"><?php echo $row['site_name'];?></td>

						<td class="cell" style="color: black; font-size: 12px; font-weight:normal;">
							   <?php echo $row['active'];?> Active /  <?php echo $row['inactive'];?> Inactive
               
                               <a href="execution_plan.php?id=<?php echo $row['site_name']; ?>" style="margin-left: 20px;"> 
                                    <button class="btn app-btn-secondary" style="font-size: 12px; font-family: sans-serif;"> View All</button>
                                </a>
                           
                        </td>

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

