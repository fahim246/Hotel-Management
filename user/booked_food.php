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
    <h6 class="m-0 font-weight-bold text-primary">Ordered Food 
            <a href="food_ordering.php"><button type="button" class="btn btn-primary" href="food_ordering.php">
              Order More Food 
            </button></a>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Type </th>
            <th> Platter No </th>
            <th> Amount </th>
            <th>Bill</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
              <?php 
              $name = $_SESSION['user_name'] ;
              $sql = "select * from food_booking where name='$name' ";
              $result=mysqli_query($conn,$sql);
              while ($row = $result->fetch_assoc()) : ?>
                <tr>
                  <td><?php echo $row["type"]; ?></td>
                  <td><?php echo $row["platter_no"]; ?></td>
                  <td><?php echo $row["amount"]; ?></td>
                  <td><?php echo $row["bill"]; ?></td>
                  <td><a href="delete_food.php?id=<?php echo $row['booking_id']; ?> " class="btn btn-danger">DELETE</a></td>
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