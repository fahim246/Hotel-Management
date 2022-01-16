<?php
session_start();
include_once('connect.php');

$name = $_SESSION['user_name'];

if(isset($_POST['submit']))
{
  
  $sql = "delete * from room_booking where name='$name' and status='confirmed' ";
  $result=mysqli_query($conn,$sql);
  if ($conn->query($sql)){
      echo "lol";
    }

  $sql2 = "delete * from pament where user_name='$name' and status='verified' ";
  $result2=mysqli_query($conn,$sql2);
  if ($conn->query($sql2)){
      header('location:home.php');
    }
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
     Dear <?php echo  $name; ?> you have paid all bills.
   </h1>
   <h1>
     THANKS
   </h1>
   <h1>
     Please <button type="submit" name="submit">Click here </button> to confirm checkout.
   </h1>
 </div>
</body>
</html>