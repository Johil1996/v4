<?php include "controllerUserData.php";?>

<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title> A I R C A S T | Login </title>

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

<h2 class="auth-heading text-center mb-5">Code Verification</h2>



<div class="auth-form-container text-start">

<form action="user-otp.php" method="POST" autocomplete="" class="auth-form login-form">

                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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


        <div class="password mb-3">
        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
        </div>

        <div class="text-center">
        <button type="submit" name="check" value="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">submit</button>
        </div>



</form>
                    
</div><!--//auth-form-container-->  





                </div><!--//auth-body-->
            
            </div><!--//flex-column-->   

        </div><!--//auth-main-col-->
    
    </div><!--//row-->

</body>
</html> 

