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
  delete();
}
?>
<?php
if(isset($_GET['msg1']))
{
  update();
}
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            <a href="available_rooms.php"><button type="button" class="btn btn-primary" href="confirmed_rooms.php">
              Existing Rooms  
            </button></a> 
            <a href="confirmed_rooms.php"><button type="button" class="btn btn-primary" href="confirmed_rooms.php">
              Confirmed Room Bookings  
            </button></a>
            <a href="pending_rooms.php"><button type="button" class="btn btn-primary" href="pending_rooms.php">
              Pending Room Bookings
            </button></a>
            <a href="add_rooms.php"><button type="button" class="btn btn-primary" href="room_booking.php">
              Add Rooms  
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
            <th> UserName </th>
            <th> CheckIn Date </th>
            <th> Days </th>
            <th> Bill </th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
              <?php 
              $owner_name = $_SESSION['owner_name'] ;
              $sql1 = "select * from hotel_data where owner_name='$owner_name' ";
              $result1=mysqli_query($conn,$sql1);
              while ( $row1 = $result1->fetch_assoc()) : ?>
                <?php
              $sql = "select * from room_booking where hotel_name='$row1[hotel_name]' and status='not confirmed'";
              $result=mysqli_query($conn,$sql);
              while ($row = $result->fetch_assoc()) : ?>
                <tr>
                  <td><?php echo $row["hotel_name"]; ?></td>
                  <td><?php echo $row["type"]; ?></td>
                  <td><?php echo $row["catagory"]; ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["checkin_date"]; ?></td>
                  <td><?php echo $row["days"]; ?></td>
                  <td><?php echo $row["bill"]; ?></td>
                  <td>
                    <a href="delete_room_booking.php?id2=<?php echo $row['booking_id']; ?> " class="btn btn-danger">DELETE</a>
                    <a href="delete_room_booking.php?id3=<?php echo $row['booking_id']; ?> " class="btn btn-success">Confirm</a>
                  </td>
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