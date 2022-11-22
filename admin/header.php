<?php

include 'database/database.php';

session_start();
$user_type = $_SESSION['Admin'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($email != false && $password != false) {

    $sql = "SELECT * FROM account WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);

    if ($run_Sql) {

        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified") {

            if ($code != 0) {
                header('Location: ./reset-code.php');
            }

        } else {
            header('Location: ./user-otp.php');
        }
    }

} else {
    header('Location: ./index.php');
}

?>


<?php

include 'database/database.php';

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($con, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($con, $_POST['update_email']);

   mysqli_query($con, "UPDATE account SET name = '$update_name', email = '$update_email' WHERE id = '$user_type'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($con, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($con, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($con, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($con, "UPDATE account SET password = '$confirm_pass' WHERE id = '$user_type'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '../admin/profile/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($con, "UPDATE account SET image = '$update_image' WHERE id = '$user_type'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>


<!DOCTYPE html>
<html>
<head>

    <!-- logo titi -->
    <link rel="shortcut icon" type="image/png" href="image/aircast.png">

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">


    <link rel="stylesheet" href="assets/css/btn_active.css">
    <link rel="stylesheet" href="assets/css/btn_hover.css">



    <link rel="stylesheet" href="table/css/table.css">
    <link rel="stylesheet" href="table/vendors/simple-datatables/datatable.css">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>


    <!-- HEADER START -->
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        <!-- END -->

                    <!-- MENU START -->
			        <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
				    <!-- MENU END -->


		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->


		            <!-- MODAL START -->
		            <div class="app-utilities col-auto">		



						<!-- ACCOUNT START -->
			            <div class="app-utility-item app-user-dropdown dropdown" style="margin-left: -10%" >
				           

				           <a class="dropdown-toggle" id="user-dropdown-toggle" 
				           data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">

      <?php
         $select = mysqli_query($con, "SELECT * FROM account WHERE id = '$user_type'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="../profile/default-avatar.png" style="border-radius: 100px;">';
         }else{
            echo '<img src="../profile/'.$fetch['image'].'" style="border-radius: 100px;">';
         }
      ?>

								</a>

				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle" >

								<li><a class="dropdown-item" href="../index.php?logout=<?php echo $user_type; ?>">Log Out</a></li>
								
						   	</ul>

			            </div><!--//app-user-dropdown--> 
						<!-- ACCOUNT END -->


		            </div><!--//app-utilities-->
		            <!-- MODAL END -->



                      <!-- END -->
		            </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
       <!-- HEADER END -->








       <!-- MENU START -->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		    <div class="app-branding">
		        <a class="app-logo" href="index.php">
		        <span class="logo-text" style="color: #006600; margin-left: 50px;">A I R C A S T</span></a>
		   </div> 
		        

      <?php
         $select = mysqli_query($con, "SELECT * FROM account WHERE id = '$user_type'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<a href="#.php"> <img src="../profile/default-avatar.png" style="border-radius: 100px; width: 40%; margin-left: 30%"> </a>';
         }else{
            echo '<a href="#.php">  <img src="../profile/'.$fetch['image'].'" style="border-radius: 100px; width: 40%; margin-left: 30%"> </a>';
         }
      ?>



      <h5 class="nav-link-text" style="color: black; font-size: 15px; font-weight: normal;  margin-top: 10px; text-align: center; "> 
      	<?php echo $fetch['name'];?> </h5>


               <!-- NAVIGATION START -->
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1" style="margin-top: 10px">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">


				    	<!-- OVERVIEW -->
					    <li class="nav-item">
					        <a class="nav-link active" href="index.php">
						         <span class="nav-icon" style="margin-left: 10px"><?php include 'icon/external.php'?></span>
		                     <span class="nav-link-text" style="margin-left:20px; ;">Dashboard</span>
					        </a>
					    </li>

					    <!-- CONTENT -->
					    <li class="nav-item">
					        <a class="nav-link" href="content.php">
						        <span class="nav-icon" style="margin-left: 10px"><?php include 'icon/video.php'?></span>
		                    <span class="nav-link-text" style="margin-left:20px; ">Content</span>
					        </a>
					    </li>

					    <!-- PLAYLIST -->
					    <li class="nav-item">
					        <a class="nav-link" href="playlist_table.php">
						        <span class="nav-icon" style="margin-left: 10px"><?php include 'icon/collection.php'?></span>
		                    <span class="nav-link-text" style="margin-left:20px; ">Playlist</span>
					        </a>
					    </li>

			<!-- TRANSACTION -->		    
			<li class="nav-item has-submenu">
			    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
						         <span class="nav-icon" style="margin-left:10px"><?php include 'icon/transaction.php'?> </span>
		                         <span class="nav-link-text" style="margin-left:20px; ">Report</span>
		                         <span class="submenu-arrow"><?php include 'icon/dropdown_arrow.php'?></span>
			    </a>

					        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="spot_per_ad.php">Spots per Ad</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="spot_per_site_table.php">Spots per Site</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="execution_plan_table_per_ad.php">Execution Plan per Ad</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="execution_plan_table.php">Execution Plan per Site</a></li>
						        </ul>
					        </div>
			</li>


					    <!-- ACCOUNT 		-->			    
					    <li class="nav-item">
					        <a class="nav-link" href="account.php">
						        <span class="nav-icon" style="margin-left:10px"><?php include 'icon/person.php'?></span>
		                         <span class="nav-link-text" style="margin-left:20px">Account</span>
					        </a>
					    </li>



			<!-- EXTERNAL 
		    <li class="nav-item has-submenu">
			    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						         <span class="nav-icon"><?php //include 'icon/external.php'?> </span>
		                         <span class="nav-link-text">External</span>
		                         <span class="submenu-arrow"><?php //include 'icon/dropdown_arrow.php'?></span>
			    </a>

					        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="login_signup_reset/login.php">Login</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="login_signup_reset/signup.php">Signup</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="login_signup_reset/reset-password.php">Reset password</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="login_signup_reset/404.php">404 page</a></li>
						        </ul>
					        </div>
			</li>-->

				    
				    </ul>

			    </nav>
			    <!-- NAVIGATION END -->



 				<!-- FOOTER END 
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">

						    <li class="nav-item">
						        <a class="nav-link" href="">
							        <span class="nav-icon"><?php //include 'icon/setting.php'?></span>
			                        <span class="nav-link-text">Settings</span>
						        </a>
						    </li>

					    </ul>
				    </nav>
			    </div>
		         -->


	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    







    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
    <script src="assets/js/index-charts.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
    
    <!-- Table JS -->
    <script src="table/vendors/simple-datatables/table1.js"></script>
    <script src="table/vendors/simple-datatables/videofilter.js"></script>
    
    <!-- Table ACTIVE AND INACTIVE JS -->
    <script src="table/vendors/simple-datatables/active.js"></script>
    <script src="table/vendors/simple-datatables/inactive.js"></script>

    <!-- Table SITE JS -->
    <script src="table/vendors/simple-datatables/Client.js"></script>
    <script src="table/vendors/simple-datatables/Tv_Partner.js"></script>
    <script src="table/vendors/simple-datatables/Site_Partner.js"></script>

    <!-- Table HOUSR JS -->
    <script src="table/vendors/simple-datatables/time.js"></script>
        <script src="table/vendors/simple-datatables/time1.js"></script>
            <script src="table/vendors/simple-datatables/time2.js"></script>
                <script src="table/vendors/simple-datatables/time3.js"></script>
                    <script src="table/vendors/simple-datatables/time4.js"></script>
</body>
</php>