<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Account </title>
    
</head> 


<body class="app">   	

<?php include'header.php' ?>

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">

                <!-- SEARCH START -->
                <div class="row g-3 mb-4 align-items-center justify-content-between">

                    <div class="col-auto">
                        <h1 class="app-page-title"  style="font-weight: normal;">Account</h1>
                    </div>



                    <div class="col-auto">
                         <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                
                         <a href="account_add.php" style="margin-right: 10px;" >
                                    <button  type="submit" name="search"  class="btn btn-primary"  
                                    style="font-size: 13px;   background: #006600; font-weight: normal; color: white; ">
                                    <?php //include 'icon/upload.php'?> Add Account </button>
                         </a>
                               


                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->
                <!-- SEARCH END -->


                <!-- MODAL START -->
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">

                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true" style="font-weight: normal; font-family: sans-serif;">Active</a>

                    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false" style="font-weight: normal; font-family: sans-serif;">Inactive</a>

                </nav>
                <!-- MODAL END -->
                
                

                <!-- TABLE START -->
                <div class="tab-content" id="orders-table-tab-content">


                    <!-- TABLE ACTIVE START -->
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


                        <div class="app-card app-card-stats-table h-100 shadow-sm">
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">


                                   <table id="example4" class="table app-table-hover mb-0 text-left">
										<thead >
											<tr>
												<th class="cell" style="text-align: center;">Profile</th>
												<th class="cell"> Name</th>
												<th class="cell"> Email</th>
												<th class="cell"> User Type</th>
												<th class="cell"> Date </th>
												<th class="cell"></th>
											</tr>
										</thead>
                                   <tbody>


              <?php

                include 'database/database.php';

                $active = "verified";

                $query = mysqli_query($con,"SELECT * FROM account WHERE status = '$active' ORDER BY ID ASC");
                while($row = mysqli_fetch_array($query)){

               ?>


         <tr>

        <td class="cell">
        <div class="avatar avatar-xl" style="margin-left: 20px">

         <?php
         if($row['image'] == ''){
            echo '<img src="../profile/default-avatar.png">';
         }else{
            echo '<img src="../profile/'.$row['image'].'">';
         }
        ?>

        </div> 
        </td> 

		<td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['name'];?></td>
        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['email'];?></td>
        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['user_type'];?></td>
        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("M d, Y - h:i A", strtotime ($row['date_time']));?>
                <br><span style="color: gray; font-size: 11px;">Create</span>                                    
         </td>
  

        <td class="cell">

            <div class="app-card-footer mt-auto">
                <a href='active_inactive/deactivate_account.php?id=<?php echo $row['id'];?>' onclick='return Deactivate()'>
                    <button class="btn app-btn-secondary" style="font-size: 12px; font-family: sans-serif;"> Deactivate </button>
                </a>
            </div>
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
                                                <th class="cell" style="text-align: center;">Profile</th>
                                                <th class="cell"> Name</th>
                                                <th class="cell"> Email</th>
                                                <th class="cell"> User Type</th>
                                                <th class="cell"> Date </th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                   <tbody>


              <?php

                include 'database/database.php';

                $Deactivate = "notverified";

                $query = mysqli_query($con,"SELECT * FROM account WHERE status = '$Deactivate' ORDER BY ID ASC");
                while($row = mysqli_fetch_array($query)){

               ?>


         <tr>

        <td class="cell">
        <div class="avatar avatar-xl" style="margin-left: 20px">

         <?php
         if($row['image'] == ''){
            echo '<img src="../profile/default-avatar.png">';
         }else{
            echo '<img src="../profile/'.$row['image'].'">';
         }
        ?>

        </div> 
        </td> 

        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['name'];?></td>
        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['email'];?></td>
        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['user_type'];?></td>
        <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("M d, Y - h:i A", strtotime ($row['date_time']));?>
                <br><span style="color: gray; font-size: 11px;">Create</span>                                    
         </td>
  

        <td class="cell">

            <div class="app-card-footer mt-auto">
                <a href='active_inactive/activate_account.php?id=<?php echo $row['id'];?>' onclick='return Activate()'>
                    <button class="btn app-btn-secondary" style="font-size: 12px; font-family: sans-serif;"> Activate </button>
                </a>
            </div>
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




    <script>

    // Simple Datatable
    let inactive_a = document.querySelector('#inactive_a');
    let aa = new inactive.DataTable(inactive_a);

    </script>               







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
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
  togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') == 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});
</script>                   


</body>
</html> 

