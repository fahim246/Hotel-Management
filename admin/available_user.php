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
            <a href="available_user.php"><button type="button" class="btn btn-primary" href="available_user.php">
              All User  
            </button></a>
            <a href="verified_user.php"><button type="button" class="btn btn-primary" href="verified_user.php">
              Verified User  
            </button></a>
            <a href="pending_user.php"><button type="button" class="btn btn-primary" href="pending_user.php">
              Pending User  
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
            <th> Status </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
                <?php

                $sql = "select * from verfied_user ";
                $result=mysqli_query($conn,$sql);
                
                while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><a href="delete_user.php?id4=<?php echo $row['user_id']; ?> " class="btn btn-danger">DELETE</a></td>
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