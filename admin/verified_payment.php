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
            <a href="available_payment.php"><button type="button" class="btn btn-primary" href="available_payment.php">
              All Payment  
            </button></a>
            <a href="verified_payment.php"><button type="button" class="btn btn-primary" href="verified_payment.php">
              Verified Payment  
            </button></a>
            <a href="pending_payment.php"><button type="button" class="btn btn-primary" href="pending_payment.php">
              Pending Payment  
            </button></a>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> User Name </th>
            <th> Sender Phone Number </th>
            <th> Transaction ID </th>
            <th> Amount </th>
            <th> Status </th>
          </tr>
        </thead>
        <tbody>
              <?php

                $sql = "select * from pament where status = 'verified' ";
                $result=mysqli_query($conn,$sql);
                
                while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td><?php echo $row["user_name"]; ?></td>
                    <td><?php echo $row["sender_phone_no"]; ?></td>
                    <td><?php echo $row["transaction_id"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
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