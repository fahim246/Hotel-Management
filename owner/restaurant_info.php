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
  $hotel_name = $msg;
}
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <a href="available_hotels.php"><button type="button" class="btn btn-primary" href="available_hotels.php">
              Existing Hotels 
            </button></a>
            <?php

                $sql2 = "select hotel_name from hotel_data ";
                $result2 =mysqli_query($conn,$sql2);
                
                while ($row2 = $result2->fetch_assoc()) : ?>
                  <a href="hotel_info.php?id4=<?php echo $row2['hotel_name']; ?> "><button type="button" class="btn btn-primary" href="hotel_info.php?id4=<?php echo $row2['hotel_name']; ?> ">
                        <?php echo $row2["hotel_name"]; ?> </button></a>
                  <?php endwhile; ?>
            
            <a href="add_hotels.php"><button type="button" class="btn btn-primary" href="room_booking.php">
              Add Hotels  
            </button></a>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Hotel Name </th>
            <th> Booked Rooms </th>
            <th> Booked Halls </th>
            <th> Booked Events </th>
          </tr>
        </thead>
        <tbody>
                  <tr>
                    <td><?php $hotel_name = $_GET['id4']; echo $hotel_name; ?></td>
                    <td><?php 
                          $sql3 = "select * from room_booking where hotel_name='$hotel_name' ";
                          $result3 =mysqli_query($conn,$sql3);
                          $num =mysqli_num_rows($result3);
                          echo $num;
                        ?>
                     </td>
                    <td>0</td>
                    <td>0</td>
                    
                  </tr>
              
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