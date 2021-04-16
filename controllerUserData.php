<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();


//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $waddress = mysqli_real_escape_string($con, $_POST['waddress']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $withdrawalAmount= "0";
        $iamount = "0";
        $cprice = "0";
        $rbonus = "0";
        $tbalance = "0";
        $insert_data = "INSERT INTO usertable (name, email, waddress, country,
        phoneNumber, withdrawalAmount,  password, cpassword, code, status, investmentamount, currentprice, referralbonus, totalbalance)
                        values('$name', '$email', '$waddress', '$country',
'$phoneNumber', '$withdrawalAmount', '$encpass', '$cpassword', '$code', '$status', '$iamount', '$cprice', '$rbonus', '$tbalance')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            
            $to = $email;
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: kelechioleh@gmail.com";

            // $mail = new PHPMailer(true);

            // $mail->isSMTP();
            // $mail->Host = 'smtp.gmail.com';
            // $mail->SMTPAuth = true;

            // $mail->Usernamae = 'kelechioleh@gmail.com';
            // $mail->Password = 'umunneochi';
            // $mail->SMTPSecure = 'tls';
            // $mail->Port = 587;

            // $mail->setForm('kelechioleh@gmail.com', 'kelechi oleh');
            // $mail->addAddress($email);
            // $mail->Subject = $subject;
            // $mail->Body = $message;

            if(mail($to, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: login-user.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: user-dashboard.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: shahiprem7890@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

// click withdrawal button
// $withdraw = $_SESSION['withdrwalamount'];
// if($email != false && $password != false){
//     $sql = "SELECT * FROM usertable WHERE email = '$email'";
//     $run_Sql = mysqli_query($con, $sql);
//     if($run_Sql){
//       $insert_withdrawalamount = "UPDATE usertable SET withdrwalamount = $withdraw WHERE email = '$email'";
//       $run_query =  mysqli_query($con, $insert_withdrawalamount);
//         }else{
//             // header('Location: user-otp.php');
//         }};


    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    // Update user
    if(isset($_POST['updatebtn']))
{
    $id = $_POST['id'];
    $iamount = $_POST['investmentamount'];
    $cprice = $_POST['currentprice'];
    $rbonus = $_POST['referralbonus'];
    $tbalance = $_POST['totalbalance'];

    $query = "UPDATE usertable SET investmentamount='$iamount', currentprice='$cprice', referralbonus='$rbonus', totalbalance='$tbalance' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: registeredusers.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: registeredusers.php'); 
    }
}


// withdrawal request
  // Update user
  if(isset($_POST['withdrawclick']))
  {
    $id = $_POST['id'];
      $withdrawalAmount = $_POST['withdrawalAmount'];
  
      $query = "UPDATE usertable SET withdrawalAmount='$withdrawalAmount', WHERE id='$id' ";
      $query_run = mysqli_query($con, $query);
  
      if($query_run)
      {
          $_SESSION['status'] = "Your Data is Updated";
          $_SESSION['status_code'] = "success";
          header('Location: withdrawrequest.php'); 
      }
      else
      {
          $_SESSION['status'] = "Your Data is NOT Updated";
          $_SESSION['status_code'] = "error";
          header('Location: withdrawrequest.php'); 
      }
  }





   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>