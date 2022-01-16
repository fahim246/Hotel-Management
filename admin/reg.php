<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_admin_name = '';
$error_admin_email = '';
$error_admin_password = '';
$admin_name = '';
$admin_email = '';
$admin_password = '';

if(isset($_POST['submit']))
{
  if(empty($_POST['admin_name']))
    {
      $error_admin_name = "Enter Name";
      blank();
    }
    else
    {
      $admin_name = trim($_POST['admin_name']);
        if(empty($_POST['admin_password']))
          {
          $error_admin_password = "Enter Password";
          blank();
          }
        else
        {
          $admin_password = trim($_POST['admin_password']);
          $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
          if(empty($_POST['admin_email']))
            {
              $error_admin_email = "Enter Email";
              blank();
            }
          else
            {
              $admin_email = trim($_POST['admin_email']);
              if(!filter_var($admin_email, FILTER_VALIDATE_EMAIL))
              {
               $error_admin_email = "Enter Valid Email";
               valid_email();
              }
          }
    }
   $sql1 = "select * from verfied_admin where email='$admin_email' ";
            $result1=mysqli_query($conn,$sql1);
            $num1 =mysqli_num_rows($result1);
            if ($num1 >0 ){
               mail_reg();
               $error_admin_email = "Email Exists";
             }
    $sql2 = "select * from verfied_admin where name='$admin_name' ";
            $result2=mysqli_query($conn,$sql2);
            $num2 =mysqli_num_rows($result2);
            if ($num2 >0 ){
               name_reg();
               $error_admin_name = "Username Exists";
             }
    
  if($error_admin_name == '' && $error_admin_email == '' && $error_admin_password == '' )
  {
    $admin_activation_code = md5(rand());
    $_SESSION['code'] = $admin_activation_code;
    $_SESSION['name'] = $admin_name;
    $_SESSION['password'] = $admin_password;
    $_SESSION['email'] = $admin_email;

    $admin_otp = rand(100000, 999999);

    $sql = "insert into register_admin(admin_name,admin_email,admin_password,admin_otp,admin_activation_code) values 
              ('$admin_name','$admin_email','$admin_password','$admin_otp','$admin_activation_code')";
    if ($conn->query($sql)){
      $msg = "check mail";
      header('location:check_otp.php?msg='.$msg);
    }
    else{
        error_reg();
    }
    $conn->close();
    
    $html="Your otp verification code is ".$admin_otp;

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
    $mail->AddAddress($owner_email);
    if(!$mail->Send()){
      return 0;
    }else{
      return 1;
    }
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
   <h4>Register Here</h4>
   <input type="text" id="name" name="admin_name" placeholder="Name">
   
   <input type="password" id="password" name="admin_password" placeholder="Password">
  
   <input type="email" id="email" name="admin_email" placeholder="Email">

   <button type="submit" id="submit" name="submit" class ="btn btn-primary">Register</button>
   <p class="message">Already Registered?<a href="login.php"> Login</a>
   </p>
   </form>
 </div>
 </div>
 
</body>
</html>