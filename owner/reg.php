<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_owner_name = '';
$error_owner_password = '';
$error_owner_email = '';
$error_address = '';
$error_mobile_no = '';
$owner_name = '';
$owner_password = '';
$owner_email = '';
$address = '';
$mobile_no = '';

if(isset($_POST['submit']))
{
  if(empty($_POST['owner_name']))
    {
      $error_owner_name = "Enter Name";
      blank();
    }
    else
    {
      $owner_name = trim($_POST['owner_name']);
        if(empty($_POST['owner_password']))
          {
          $error_owner_password = "Enter Password";
          blank();
          }
        else
        {
          $owner_password = trim($_POST['owner_password']);
          $owner_password = password_hash($owner_password, PASSWORD_DEFAULT);
          if(empty($_POST['owner_email']))
            {
              $error_owner_email = "Enter Email";
              blank();
            }
          else
            {
              $owner_email = trim($_POST['owner_email']);
              if(!filter_var($owner_email, FILTER_VALIDATE_EMAIL))
              {
               $error_owner_email = "Enter Valid Email";
               valid_email();
              }
              if(empty($_POST['address']))
                {
                $error_address = "Enter address";
                blank();
                }
              else
              {
                $address = trim($_POST['address']);
                if(empty($_POST['mobile_no']))
                {
                $error_mobile_no = "Enter mobile_no";
                blank();
                }
                else
                {
                  $mobile_no = trim($_POST['mobile_no']);
                }
              }
            }
          }
    }
   $sql1 = "select * from verified_owner where email='$owner_email' ";
            $result1=mysqli_query($conn,$sql1);
            $num1 =mysqli_num_rows($result1);
            if ($num1 >0 ){
               mail_reg();
               $error_owner_email = "Email Exists";
             }
    $sql2 = "select * from verified_owner where name='$owner_name' ";
            $result2=mysqli_query($conn,$sql2);
            $num2 =mysqli_num_rows($result2);
            if ($num2 >0 ){
               name_reg();
               $error_owner_name = "Username Exists";
             }
    
  if($error_owner_name == '' && $error_owner_email == '' && $error_owner_password == '' && $error_address == '' &&             $error_mobile_no == '' )
  {
    $owner_activation_code = md5(rand());
    $_SESSION['code'] = $owner_activation_code;
    $_SESSION['name'] = $owner_name;
    $_SESSION['password'] = $owner_password;
    $_SESSION['email'] = $owner_email;
    $_SESSION['address'] = $address;
    $_SESSION['mobile_no'] = $mobile_no;

    $owner_otp = rand(100000, 999999);

    $sql = "insert into register_owner(owner_name,owner_email,owner_password,owner_address,owner_mobile,owner_otp,owner_activation_code) values 
                ('$owner_name','$owner_email','$owner_password','$address','$mobile_no','$owner_otp','$owner_activation_code')";
    if ($conn->query($sql)){
      $msg = "check mail";
      header('location:check_otp.php?msg='.$msg);
    }
    else{
        error_reg();
    }
    $conn->close();
    
    $html="Your otp verification code is ".$owner_otp;

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
   <input type="text" id="name" name="owner_name" placeholder="Name">
   
   <input type="password" id="password" name="owner_password" placeholder="Password">
  
   <input type="email" id="email" name="owner_email" placeholder="Email">

   <input type="text" id="address" name="address" placeholder="Address">

   <input type="text" id="mobile_no" name="mobile_no" placeholder="Mobile No">
  
   <button type="submit" id="submit" name="submit" class ="btn btn-primary">Register</button>
   <p class="message">Already Registered?<a href="login.php"> Login</a>
   </p>
   </form>
 </div>
 </div>
 
</body>
</html>