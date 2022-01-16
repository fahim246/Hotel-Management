<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_restaurant_name = '';
$error_restaurant_address = '';
$error_license_no = '';
$error_contact_no = '';
$restaurant_name = '';
$restaurant_address = '';
$license_no = '';
$contact_no = '';

if(isset($_GET['msg']))
{
  success();
}
if(isset($_POST['submit']))
{
  if(empty($_POST['name']))
    {
      $error_restaurant_name = "Enter Restaurant Name";
      blank();
    }
    else
    {
      $restaurant_name = trim($_POST['name']); 
      if(empty($_POST['address']))
        {
          $error_restaurant_address = "Enter Restaurant Address";
          blank();
        }
        else
        {
          $restaurant_address = trim($_POST['address']); 
          if(empty($_POST['license_no']))
            {
              $error_license_no = "Enter license_no";
              blank();
            }
            else
            {
              $license_no = trim($_POST['license_no']); 
              if(empty($_POST['contact_no']))
                {
                  $error_contact_no = "Enter contact_no";
                  blank();
                }
                else
                {
                  $contact_no = trim($_POST['contact_no']);
                }
            }
        }
    }

  if($error_restaurant_name == '' && $error_restaurant_address == '' && $error_license_no == '' && $error_contact_no == '' )
    {
      $owner_name = $_SESSION['owner_name'];
      $restaurant_id = uniqid();
      $status = 'not verified';
      $sql = "insert into restaurant_data(owner_name,restaurant_name,restaurant_id,license_no,status,address,contact_no) values 
              ('$owner_name','$restaurant_name','$restaurant_id','$license_no','$status','$restaurant_address','$contact_no')";
      if ($conn->query($sql)){
        $msg = "restaurant added";
        header('location:add_restaurants.php?msg='.$msg);
      }
      else{
          error();
          echo $restaurant_id;
          echo $owner_name;
          echo $restaurant_name;
          echo $license_no;
          echo $status;
          echo $restaurant_address;
          echo $contact_no;
      }
    }
}
?>



<html>
<head>
<title>add restaurants</title>
<link rel="stylesheet" href="design.css">
</head>

<body>
 <div class="hotel-adding-page">
 <a href="dashboard.php"><img src="download (1).png" class="avatar"></a>
 <div class="form">
     <form action="#" method="post"  >
   <h4>Add Restaurants</h4>
   <input type="text" id="name" name="name" placeholder="Restaurant Name">

   <input type="text" id="address" name="address" placeholder="Restaurant Address">
   
   <input type="text" id="license_no" name="license_no" placeholder="License No">
  
   <input type="text" id="contact_no" name="contact_no" placeholder="Contact No">
  
   <button type="submit" id="submit" name="submit" class ="btn btn-primary">Submit</button>
   
   </form>
 </div>
 </div>
 
</body>
</html>