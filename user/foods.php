<?php
session_start();
include_once('connect.php');
?>
<?php
  $food_type = $_GET['id2'];
  $type = strtoupper($food_type);
  $sql1 = "select distinct restaurant_name from food_data ";
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
        <?php echo $type; ?> FOODS from different hotel
      </h1>
          
    </div>
    <?php while ($row1 = mysqli_fetch_array($result1)) : ; ?>
      <div class="block">
          <h1><?php echo $row1['restaurant_name']; ?></h1>
      </div>
      <div>
        <main class="grid">
          <?php 
          $sql2 = "select * from food_data where restaurant_name= '$row1[restaurant_name]' and  food_type='$food_type'";
          $result2=mysqli_query($conn,$sql2);
          while ($row2 = mysqli_fetch_array($result2)) : ; ?>
            <article>
              <?php echo '<img src="data:image;base64,'.base64_encode($row2['image']).'" >';  ?>
              <div class="text">
                <h3>
                  <?php echo "Platter No ".$row2['food_no']; ?>
                </h3>
                <p><?php echo $row2['description']; ?></p>
                <p><?php echo "Price ".$row2['food_price']; ?></p>
                <div class="button">
              <a href="food_ordering.php?id=<?php echo $row2['food_id']; ?> "> Order Food</a>
             </div>
              </div>
            </article>
            <?php endwhile; ?>
        </main>
      </div>
    <?php endwhile; ?>
  </body>
</html>

