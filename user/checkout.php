<?php
session_start();
include_once('connect.php');

$amount = 0;
$paid = 0;

$name = $_SESSION['user_name'];
$sql = "select * from room_booking where name='$name' and status='confirmed' ";
$result=mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_array($result)) : ; 
    $amount = $amount+ $row['bill'];
  endwhile;

$sql2 = "select * from pament where user_name='$name' and status='verified' ";
$result2=mysqli_query($conn,$sql2);
 while ($row2 = mysqli_fetch_array($result2)) : ; 
    $paid = $paid + $row2['amount'];
  endwhile;

$bill = $amount - $paid;

if ($bill == 0) {
  header('location:confirm_checkout.php');
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>checkout</title>
</head>
<body>
 <div>
   <h1>
     Dear <?php echo  $name; ?> your remainning bill is  <?php echo  $bill; ?>.
   </h1>
   <h1>
     Our Bkash number is +88012121212 
   </h1>
   <h1>
     Please <a href="payment.php">pay bill</a> to checkout.
   </h1>
 </div>
</body>
</html>