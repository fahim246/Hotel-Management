<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_amount = '';


if (isset($_GET['id'])) {
  $food_id = $_GET['id'];
                      $sql2 = "select * from food_data where food_id='$food_id' ";
                      $result2=mysqli_query($conn,$sql2);
                      $row2 = mysqli_fetch_array($result2);
                      $restaurant_name = $row2['restaurant_name'];
                      $food_type = $row2['food_type'];
                      $food_no = $row2['food_no'];
                    }

if(isset($_POST['submit'])){
  $user_code = $_SESSION['user_code'];
  $user_name = $_SESSION['user_name'];
  
   if(empty($_POST['amount']))
   {
    $error_amount = "<label class='text-danger'>Enter amount</label>";
    blank();
   }
  else
   {
      $amount = trim($_POST['amount']);
      
   }
   if($error_amount == '' ){
    
    $sql = "select * from food_data where food_id='$food_id' ";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $price = $row['food_price'];
    $bill = $price * $amount;

    $booking_id = uniqid();
    $status = 'not confirmed';

    $sql2 = "insert into room_booking(booking_id,hotel_name,room_id,type,catagory,checkin_date,status,name,days,bill)values ('$booking_id','$hotel_name','$room_id','$room_type','$room_catagory','$date','$status','$user_name','$days','$bill')";
      if ($conn->query($sql2)){
        
        complete();

      }
      else{
      error_booking();
      }
    }
  }
?>




<html>
<head>
<title>room booking</title>
<link rel="stylesheet" href="booking.css">
</head>
<body>
 <div class="booking-page">
 <a href="home.php"><img src="download (1).png" class="avatar"></a>
 <div class="form">
     <form action="#" method="post" >
   <h2>Order Food Here</h2>

   <p><?php echo $restaurant_name; ?></p>
   <p>Food Type: <?php echo $food_type; ?></p>
   <p>Platter No: <?php echo $food_no; ?></p>
   
   
  
   <input type="text" name="amount" placeholder="How many platters?">
  
   <button type="submit" name="submit" class ="btn btn-primary">Confirm Booking</button>
   
   </form>
 </div>
 </div>
</body>
</html>