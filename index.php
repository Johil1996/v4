<?php require_once "controllerUserData.php"; ?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title> A I R C A S T | Log-in </title>

    <!-- logo titi -->
    <link rel="shortcut icon" type="image/png" href="images/aircast.png">    

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


</head> 

<body class="app app-login p-0"> 

    <div class="row g-0 app-auth-wrapper">

	    <div class="col-12 col-md-12 col-lg-12 auth-main-col text-center p-5" style="margin-top: 2%">

		    <div class="d-flex flex-column align-content-end">

			    <div class="app-auth-body mx-auto">	


				   <div class="app-auth-branding mb-4">

                  <a class="app-logo" href="index.html"> 
                     <img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo">
                  </a> A I R C A S T </div>

<h2 class="auth-heading text-center mb-5">Log in</h2>

<div class="auth-form-container text-start">

<form action="index.php" method="POST" autocomplete="" class="auth-form login-form">

                    <p class="text-center">Login with your email and password</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

		<div class="email mb-3">
        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
		</div>


		<div class="password mb-3">
        <input class="form-control" type="password" name="password" placeholder="Password" required>
	    </div>

		<div class="text-center">
		<button type="submit" name="login" value="Login" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
		</div>

         <div class="link forget-pass text-left" style="margin-top:5%;">
         <a href="forgot-password.php">Forgot password?</a>
         </div>

         
</form>
					
</div><!--//auth-form-container-->	


			    </div><!--//auth-body-->
		    
		    </div><!--//flex-column-->   

	    </div><!--//auth-main-col-->
    
    </div><!--//row-->

</body>
</html> 

