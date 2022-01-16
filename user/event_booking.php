<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_amount = '';

if(isset($_POST['submit'])){
  $user_code = $_SESSION['user_code'];
  $user_name = $_SESSION['user_name'];
  
   if(empty($_POST['amount']))
   {
    $error_amount = "<label class='text-danger'>Enter Amount</label>";
    blank();
   }
  else
   {
      $amount = trim($_POST['amount']);
   }
   if($error_amount == ''){
    $food_type = $_POST['type'];
    $food_catagory = $_POST['Platter'];
    $sql = "select * from food_data where food_type='$food_type' and platter_no='$food_catagory'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $food_id = $row['food_id'];
    $price = $row['platter_price'];
    $bill = $price * $amount;

    $booking_id = uniqid();
    $sql2 = "insert into food_booking(booking_id,food_id,type,platter_no,name,amount,bill) values 
                              ('$booking_id','$food_id','$food_type','$food_catagory','$user_name','$amount','$bill')";
    if ($conn->query($sql2)){
      
      complete();

    }
    
   }
}
?>

<?php
  $sql3 = "select distinct food_type from food_data ";
    $result3=mysqli_query($conn,$sql3);
?>

<?php
  $sql4 = "select distinct platter_no from food_data ";
    $result4=mysqli_query($conn,$sql4);
?>


<html>
<head>
<title>hall booking</title>
<link rel="stylesheet" href="booking.css">
</head>
<body>
 <div class="food-booking-page">
 <a href="home.html"><img src="download (1).png" class="avatar"></a>
 <div class="form">
     <form action="#" method="post" >
   <h2>Order Food Here</h2>

   <label for="type" >Food Type</label>
   <select id="type" name="type">
     <?php while ($row3 = mysqli_fetch_array($result3)) : ; ?>
      <option value="<?php echo $row3['food_type']; ?>"> <?php echo $row3['food_type']; ?> </option>
    <?php endwhile; ?>
   </select>

   <label for="Catagory" >Platter No</label>
     <select id="Platter" name="Platter">
     <?php while ($row4 = mysqli_fetch_array($result4)) : ; ?>
      <option value="<?php echo $row4['platter_no']; ?>"> <?php echo $row4['platter_no']; ?> </option>
    <?php endwhile; ?>
   </select>
   
   <input type="text" name="amount" placeholder="Amount of platters">
  
   <button type="submit" name="submit" class ="btn btn-primary">Confirm Order</button>
   
   </form>
 </div>
 </div>
</body>
</html>