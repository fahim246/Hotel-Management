<?php
session_start();
include_once('connect.php');
include_once('functions.php');

if(isset($_GET['msg']))
{
  success();
}
if(isset($_POST['submit']))
{
  if(empty($_POST['type']))
    {
      $error_type = "Enter type";
      blank();
    }
    else
    {
      $type = trim($_POST['type']); 
      if(empty($_POST['catagory']))
        {
          $error_catagory = "Enter catagory";
          blank();
        }
        else
        {
          $catagory = trim($_POST['catagory']); 
          
              if(empty($_POST['description']))
                {
                  $error_description = "Enter description";
                  blank();
                }
                else
                {
                  $description = trim($_POST['description']);
                  if(empty($_POST['price']))
                    {
                      $error_price = "Enter price";
                      blank();
                    }
                    else
                    {
                      $price = trim($_POST['price']); 
                      if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                        {
                          $error_image = "Enter image";
                          blank();
                        }
                        else
                        {
                          $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                        }
                    }
                }
            }
        }

  if($error_type == '' && $error_catagory == '' && $error_description == '' && $error_price == '' && $error_image == '' )
    {
      $hotel_name = $_POST['hotel'];
      $room_id = uniqid();
      $sql = "insert into room_data(hotel_name,room_id,room_type,room_catagory,description,room_price,image) values 
              ('$hotel_name','$room_id','$type','$catagory','$description','$price','$image')";
      if ($conn->query($sql)){
        $msg = "room added";
        header('location:add_rooms.php?msg='.$msg);
      }
      else{
          error();
      }
    }
}
?>

<?php
$sql5 = "select *  from hotel_data ";
    $result5=mysqli_query($conn,$sql5);
?>

<html>
<head>
<title>add foods</title>
<link rel="stylesheet" href="design.css">
</head>

<body>
 <div class="room-adding-page">
 <a href="dashboard.php"><img src="download (1).png" class="avatar"></a>
 <div class="form">
     <form action="#" method="post" enctype="multipart/form-data" >
   <h4>Add Foods</h4>

   <label for="hotel" >Hotel Name</label>
   <select id="hotel" name="hotel">
     <?php while ($row5 = mysqli_fetch_array($result5)) : ; ?>
      <option value="<?php echo $row5['hotel_name']; ?>"> <?php echo $row5['hotel_name']; ?> </option>
    <?php endwhile; ?>
   </select>

   <input type="text" id="type" name="type" placeholder="Food Type">
   
   <input type="text" id="catagory" name="catagory" placeholder="Food No">

   <input type="text" id="description" name="description" placeholder="Food Description">

   <input type="text" id="price" name="price" placeholder="Food Price">
   <h6>Upload Image</h6>
   <input type="file" id="image" name="image" >
  
   <button type="submit" id="submit" name="submit" class ="btn btn-primary">Submit</button>
   
   </form>
 </div>
 </div>
 
</body>
</html>