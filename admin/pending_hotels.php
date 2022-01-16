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
            <a href="available_hotels.php"><button type="button" class="btn btn-primary" href="available_hotels.php">
              All Hotels  
            </button></a>
            <a href="verified_hotels.php"><button type="button" class="btn btn-primary" href="verified_hotels.php">
              Verified Hotels  
            </button></a>
            <a href="pending_hotels.php"><button type="button" class="btn btn-primary" href="pending_hotels.php">
              Pending Hotels  
            </button></a>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Hotel Name </th>
            <th> Owner Name </th>
            <th> License Number </th>
            <th> Address </th>
            <th> Contact No </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
              <?php

                $sql = "select * from hotel_data where status = 'not verified' ";
                $result=mysqli_query($conn,$sql);
                
                while ($row = $result->fetch_assoc()) : ?>
                <tr>
                  <td><?php echo $row["hotel_name"]; ?></td>
                    <td><?php echo $row["owner_name"]; ?></td>
                    <td><?php echo $row["license_no"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["contact_no"]; ?></td>
                  <td>
                    <a href="delete_hotels.php?id2=<?php echo $row['hotel_id']; ?> " class="btn btn-danger">DELETE</a>
                    <a href="delete_hotels.php?id3=<?php echo $row['hotel_id']; ?> " class="btn btn-success">VERIFY</a>
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