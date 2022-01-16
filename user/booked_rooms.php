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

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            <a href="booked_rooms.php"><button type="button" class="btn btn-primary" href="booked_rooms.php">
              Booked rooms  
            </button></a>
            <a href="room_booking.php"><button type="button" class="btn btn-primary" href="room_booking.php">
              Book another room  
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
            <th> CheckIn Date </th>
            <th>Days </th>
            <th>Bill</th>
            <th>Status</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
              <?php 
              $name = $_SESSION['user_name'] ;
              $sql = "select * from room_booking where name='$name' ";
              $result=mysqli_query($conn,$sql);
              while ($row = $result->fetch_assoc()) : ?>
                <tr>
                  <td><?php echo $row["hotel_name"]; ?></td>
                  <td><?php echo $row["type"]; ?></td>
                  <td><?php echo $row["catagory"]; ?></td>
                  <td><?php echo $row["checkin_date"]; ?></td>
                  <td><?php echo $row["days"]; ?></td>
                  <td><?php echo $row["bill"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td>
                    <a href="delete_room.php?id=<?php echo $row['booking_id']; ?> " class="btn btn-danger">DELETE</a>
                  </td>
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