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
            <a href="available_halls.php"><button type="button" class="btn btn-primary" href="available_rooms.php">
              Existing Halls  
            </button></a>
            <a href="confirmed_halls.php"><button type="button" class="btn btn-primary" href="confirmed_rooms.php">
              Confirmed Hall Bookings  
            </button></a>
            <a href="pending_halls.php"><button type="button" class="btn btn-primary" href="pending_rooms.php">
              Pending Hall Bookings  
            </button></a>
            <a href="add_halls.php"><button type="button" class="btn btn-primary" href="add_rooms.php">
              Add Halls  
            </button></a>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Hotel Name </th>
            <th> Type </th>
            <th> Catagory </th>
            <th>Price </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
              <?php 
              $owner_name = $_SESSION['owner_name'] ;
              $sql1 = "select * from hotel_data where owner_name='$owner_name' ";
              $result1=mysqli_query($conn,$sql1);
              while ( $row1 = $result1->fetch_assoc()) : ?>
                <?php

                $sql = "select * from hall_data where hotel_name='$row1[hotel_name]' ";
                $result=mysqli_query($conn,$sql);
                
                while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td><?php echo $row["hotel_name"]; ?></td>
                    <td><?php echo $row["hall_type"]; ?></td>
                    <td><?php echo $row["hall_catagory"]; ?></td>
                    <td><?php echo $row["hall_price"]; ?></td>
                    <td><a href="delete_hall_booking.php?id4=<?php echo $row['hall_id']; ?> " class="btn btn-danger">DELETE</a></td>
                  </tr>
                  <?php endwhile; ?>
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