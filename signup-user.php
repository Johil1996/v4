


<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title> A I R C A S T | Sign-up </title>

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
                  </a> A I R C A S T 
              </div>

<h2 class="auth-heading text-center mb-5"> Signup</h2>



<div class="auth-form-container text-start">

<form action="signup-user.php" method="POST" autocomplete="" class="auth-form login-form">

                    <p class="text-center">It's quick and easy.</p>

                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    
        <div class="email mb-3">
        <input class="form-control" type="text" name="name" placeholder="Full Name" value="<?php echo $name ?>" required>
        </div>

        <div class="email mb-3">
        <input class="form-control" type="email" name="email" placeholder="Email Address" value="<?php echo $email ?>" required>
        </div>

        <div class="password mb-3">
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="password mb-3">
        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
        </div>

        <div class="text-center">
        <input type="hidden" name="user_type" value="client" class="btn app-btn-primary w-100 theme-btn mx-auto" readonly>
        </div>

<!-- -->

        <div class="text-center">
        <button type="submit" name="signup" value="Signup" class="btn app-btn-primary w-100 theme-btn mx-auto">Signup</button>
        </div>
  
        <div class="link login-link text-center" style="margin-top: 5%">Already a member? 
            <a href="index.php">Login here</a>
        </div>


</form>
                    
</div><!--//auth-form-container-->  



                </div><!--//auth-body-->
            
            </div><!--//flex-column-->   

        </div><!--//auth-main-col-->
    
    </div><!--//row-->

</body>
</html> 

