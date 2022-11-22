<?php include'add/account_add.php' ?>

<!DOCTYPE html>
<html>
<head>

    <title> Aircast | Add Account </title>
    

</head>
<body class="app">      

<?php include'header.php' ?>

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">

                <!-- SEARCH START -->
                <div class="row g-3 mb-4 align-items-center justify-content-between">

                    <div class="col-auto">
                        <h1 class="app-page-title"  style="font-weight: normal;">Add Account</h1>
                    </div>

                </div><!--//row-->
                <!-- SEARCH END -->

    <div class="row g-0 app-auth-wrapper" style="background: none; height:50vh">

        <div class="col-12 col-md-12 col-lg-12 auth-main-col text-center p-5">

            <div class="d-flex flex-column align-content-end">

                <div class="app-auth-body mx-auto"> 

<form action="account_add.php" method="POST" autocomplete="" class="auth-form login-form" >

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
        <input class="form-control" type="text" name="name" placeholder="Full Name" required>
        </div>

        <div class="email mb-3">
        <input class="form-control" type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="password mb-3">
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="password mb-3">
        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
        </div>

        <div class="password mb-3">
        <select name="user_type" class="form-control" required>
            <option value="" disabled selected> Select User Type </option>
            <option value="admin"> Admin </option>
            <option value="client"> Client </option>
        </select>
        </div>

<!-- -->

        <div class="text-center">
        <button type="submit" name="signup" value="Signup" class="btn app-btn-primary w-100 theme-btn mx-auto"> Save </button>
        </div>
  

</form>

</div>
</div>
</div>
</div>





        </div><!--//app-content-->      

    </div><!--//app-wrapper-->                      


</body>
</html>