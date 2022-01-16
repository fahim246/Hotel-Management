<?php
session_start();
include_once('connect.php');
include_once('functions.php');
include('includes/header.php'); 
include('includes/navbar.php'); 





?>
<?php
if(isset($_GET['msg']))
{
  delete1();
}
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <a href="available_restaurants.php"><button type="button" class="btn btn-primary" href="available_restaurants.php">
              Existing Restaurants 
            </button></a>
            <?php

                $sql2 = "select restaurant_name from restaurant_data ";
                $result2 =mysqli_query($conn,$sql2);
                
                while ($row2 = $result2->fetch_assoc()) : ?>
                  <a href="restaurant_info.php?id4=<?php echo $row2['restaurant_name']; ?> "><button type="button" class="btn btn-primary" href="restaurant_info.php?id4=<?php echo $row2['restaurant_name']; ?> ">
                        <?php echo $row2["restaurant_name"]; ?> </button></a>
                  <?php endwhile; ?>
            
            <a href="add_restaurants.php"><button type="button" class="btn btn-primary" href="add_restaurants.php">
              Add Restaurants  
            </button></a>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Restaurants Name </th>
            <th> License No </th>
            <th> Address </th>
            <th>Contact No </th>
            <th> Status </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
              <?php 
              $owner_name = $_SESSION['owner_name'] ;
              

                $sql = "select * from restaurant_data where owner_name='$owner_name' ";
                $result=mysqli_query($conn,$sql);
                
                while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td><?php echo $row["restaurant_name"]; ?></td>
                    <td><?php echo $row["license_no"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["contact_no"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><a href="delete_room_booking.php?id4=<?php echo $row['room_id']; ?> " class="btn btn-danger">DELETE</a></td>
                  </tr>
                  <?php endwhile; ?>
                 
              
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>