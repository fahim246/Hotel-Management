<?php
session_start();
include_once('connect.php');
?>
<?php
  $hall_type = $_GET['id1'];
  $type = strtoupper($hall_type);
  $sql1 = "select distinct hotel_name from hall_data ";
  $result1=mysqli_query($conn,$sql1);
  
?>

<!DOCTYPE html>
<htmml>
  <head>
    <meta charset="utf-8">
    <title>single room design</title>
    <link rel="stylesheet" type="text/css" href="service_section.css">
    
  </head>
  <body>
    <div class="block_1">
      <h1>
        <?php echo $type; ?> HALLS from different hotel
      </h1>
          
    </div>
    <?php while ($row1 = mysqli_fetch_array($result1)) : ; ?>
      <div class="block">
          <h1><?php echo $row1['hotel_name']; ?></h1>
      </div>
      <div>
        <main class="grid">
          <?php 
          $sql2 = "select * from hall_data where hotel_name= '$row1[hotel_name]' and  hall_type='$hall_type'";
          $result2=mysqli_query($conn,$sql2);
          while ($row2 = mysqli_fetch_array($result2)) : ; ?>
            <article>
              <?php echo '<img src="data:image;base64,'.base64_encode($row2['image']).'" >';  ?>
              <div class="text">
                <h3>
                  <?php echo "Catagory ".$row2['hall_catagory']; ?>
                </h3>
                <p><?php echo $row2['description']; ?></p>
                <p><?php echo "Price ".$row2['hall_price']; ?></p>
                <div class="button">
              <a href="hall_booking.php?id=<?php echo $row2['hall_id']; ?> "> Book a Hall</a>
             </div>
              </div>
            </article>
            <?php endwhile; ?>
        </main>
      </div>
    <?php endwhile; ?>
  </body>
</html>

