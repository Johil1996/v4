<?php 

require "../database/database.php";

$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $user_type = mysqli_real_escape_string($con, $_POST['user_type']);

    if($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }

    $email_check = "SELECT * FROM account WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);

    if (mysqli_num_rows($res) > 0) {

        $errors['email'] = "Email that you have entered is already exist!";
    }

    if (count($errors) === 0) {

        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";

        $insert_data = "INSERT INTO account (name, email, password, code, status, user_type)
                        values('$name', '$email', '$encpass', '$code', '$status', '$user_type')";

        $data_check = mysqli_query($con, $insert_data);

        if ($data_check) {

            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: justmhil10281996@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location:./account.php');
                exit();

            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }

         } else {

            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}


?>



