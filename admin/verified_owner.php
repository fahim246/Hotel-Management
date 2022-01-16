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
            <a href="available_owner.php"><button type="button" class="btn btn-primary" href="available_owner.php">
              All Owners
            </button></a>
            <a href="verified_owner.php"><button type="button" class="btn btn-primary" href="verified_owner.php">
              Verified Owners 
            </button></a>
            <a href="pending_owner.php"><button type="button" class="btn btn-primary" href="pending_owner.php">
              Pending Owners  
            </button></a>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Name </th>
            <th> Email </th>
            <th> Address </th>
            <th>Mobile No </th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
              <?php

                $sql = "select * from verified_owner where status = 'verified' ";
                $result=mysqli_query($conn,$sql);
                
                while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["mobile_no"]; ?></td>
                    <td><a href="delete_owner.php?id1=<?php echo $row['owner_id']; ?> " class="btn btn-danger">DELETE</a></td>
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