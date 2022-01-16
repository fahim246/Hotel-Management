<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$user_name = '';
$user_email = '';
$user_password = '';

if(isset($_POST['submit']))
{
  if(empty($_POST['user_name']))
    {
      $error_user_name = "Enter Name";
      blank();
    }
    else
    {
      $user_name = trim($_POST['user_name']);
        if(empty($_POST['user_password']))
          {
          $error_user_password = "Enter Password";
          blank();
          }
        else
        {
          $user_password = trim($_POST['user_password']);
          $user_password = password_hash($user_password, PASSWORD_DEFAULT);
          if(empty($_POST['user_email']))
            {
              $error_user_email = "Enter Email";
              blank();
            }
          else
            {
              $user_email = trim($_POST['user_email']);
              if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
              {
               $error_user_email = "Enter Valid Email";
               valid_email();
              }
            }
          }
    }
   $sql1 = "select * from verfied_user where email='$user_email' ";
            $result1=mysqli_query($conn,$sql1);
            $num1 =mysqli_num_rows($result1);
            if ($num1 >0 ){
               mail_reg();
               $error_user_email = "Email Exists";
             }
    $sql2 = "select * from verfied_user where name='$user_name' ";
            $result2=mysqli_query($conn,$sql2);
            $num2 =mysqli_num_rows($result2);
            if ($num2 >0 ){
               name_reg();
               $error_user_name = "Username Exists";
             }
    
  if($error_user_name == '' && $error_user_email == '' && $error_user_password == '' )
  {
    $user_activation_code = md5(rand());
    $_SESSION['code'] = $user_activation_code;
    $_SESSION['name'] = $user_name;
    $_SESSION['password'] = $user_password;
    $_SESSION['email'] = $user_email;

    $user_otp = rand(100000, 999999);

    $sql = "insert into register_user(user_name,user_email,user_password,user_activation_code,user_otp) values 
                                ('$user_name','$user_email','$user_password','$user_activation_code','$user_otp')";
    if ($conn->query($sql)){
      $msg = "check mail";
      header('location:check_otp.php?msg='.$msg);
    }
    else{
        error_reg();
    }
    $conn->close();
    
    $html="Your otp verification code is ".$user_otp;

    require_once("smtp/class.phpmailer.php");
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPDebug = 1; 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "fahim8293@gmail.com";
    $mail->Password = "amanhasnopassword";
    $mail->SetFrom("fahim8293@gmail.com");
    
    $mail->Subject = 'Verification code to Verify Your Email Address';;
    $mail->Body =$html;
    $mail->AddAddress($user_email);
    if(!$mail->Send()){
      return 0;
    }else{
      return 1;
    }
  }
}
?>



<html>
<head>
<title>registration</title>
<link rel="stylesheet" href="design.css">
</head>

<body>
 <div class="registration-page">
 <img src="download (1).png" class="avatar">
 <div class="form">
     <form action="#" method="post" >
   <h2>Register Here</h2>
   <input type="text" id="name" name="user_name" placeholder="User Name">
   
   <input type="password" id="password" name="user_password" placeholder="Password">
  
   <input type="email" id="email" name="user_email" placeholder="User Email">
  
   <button type="submit" id="submit" name="submit" class ="btn btn-primary">Register</button>
   <p class="message">Already Registered?<a href="login.php"> Login</a>
   </p>
   </form>
 </div>
 </div>
 
</body>
</html>