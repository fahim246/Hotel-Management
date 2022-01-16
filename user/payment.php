<?php
session_start();
include_once('connect.php');
include_once('functions.php');


if(isset($_POST['submit']))
{
  if(empty($_POST['number']))
    {
      $error_number = "Enter number";
      blank();
    }
    else
    {
      $number = trim($_POST['number']);
        if(empty($_POST['amount']))
          {
          $error_amount = "Enter amount";
          blank();
          }
        else
        {
          $amount = trim($_POST['amount']);
          if(empty($_POST['transaction']))
            {
              $error_transaction = "Enter transaction";
              blank();
            }
          else
            {
              $transaction = trim($_POST['transaction']);
            }
          }
    }
   
    
  if($error_number == '' && $error_amount == '' && $error_transaction == '' )
  {
    
    
    $user_name = $_SESSION['user_name'];
    $status = 'not verified';
    $payment_id = uniqid();

    $sql = "insert into pament(user_name,sender_phone_no,transaction_id, amount,status,payment_id ) values 
                                ('$user_name','$number','$transaction','$amount','$status','$payment_id')";
    if ($conn->query($sql)){
      header('location:dashboard.php');
    }
    else{
        error_pay();
    }
    
  }
}
?>



<html>
<head>
<title>payment</title>
<link rel="stylesheet" href="design.css">
</head>

<body>
 <div class="payment-page">
  <a href="home.php"><img src="download (1).png" class="avatar"></a>
 <div class="form">
     <form action="#" method="post" >
   <h2>Payment</h2>
   <input type="text" id="number" name="number" placeholder="Enter Sender Bkash No">

   <input type="text" id="amount" name="amount" placeholder="Enter Amount">
   
   <input type="text" id="transaction" name="transaction" placeholder="Enter Transaction ID">
  
   <button type="submit" id="submit" name="submit" class ="btn btn-primary">Submit</button>
   
   </form>
 </div>
 </div>
 
</body>
</html>