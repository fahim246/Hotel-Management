<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_days = '';
$error_date = '';

if (isset($_GET['id'])) {
  $hall_id = $_GET['id'];
                      $sql2 = "select * from hall_data where hall_id='$hall_id' ";
                      $result2=mysqli_query($conn,$sql2);
                      $row2 = mysqli_fetch_array($result2);
                      $hotel_name = $row2['hotel_name'];
                      $hall_type = $row2['hall_type'];
                      $hall_catagory = $row2['hall_catagory'];
                    }

if(isset($_POST['submit'])){
  $user_code = $_SESSION['user_code'];
  $user_name = $_SESSION['user_name'];
  
   if(empty($_POST['date']))
   {
    $error_date = "<label class='text-danger'>Enter date</label>";
    calender();
   }
  else
   {
      $date = trim($_POST['date']);
      if(empty($_POST['days']))
       {
        $error_days = "<label class='text-danger'>Enter Number of days</label>";
        blank();
       }
      else
       {
        $days = trim($_POST['days']);
       }
   }
   if($error_days == '' && $error_date == ''){
    
    $sql = "select * from hall_data where hall_id='$hall_id' ";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $price = $row['hall_price'];
    $bill = $price * $days;

    $booking_id = uniqid();
    $status = 'not confirmed';

    $sql2 = "insert into hall_booking(booking_id,hotel_name,hall_id,type,catagory,booking_date,status,name,days,bill)values ('$booking_id','$hotel_name','$hall_id','$hall_type','$hall_catagory','$date','$status','$user_name','$days','$bill')";
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
   <h2>Book Halls Here</h2>

   <p><?php echo $hotel_name; ?></p>
   <p>Hall Type: <?php echo $hall_type; ?></p>
   <p>Hall Catagory: <?php echo $hall_catagory; ?></p>
   
   
   <label for="date" >Booking Date</label>
   <input type="date" name="date" placeholder="Enter Date">
  
   <input type="text" name="days" placeholder="Number of days">
  
   <button type="submit" name="submit" class ="btn btn-primary">Confirm Booking</button>
   
   </form>
 </div>
 </div>
</body>
</html>