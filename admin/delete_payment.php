<?php
session_start();
include_once('connect.php');
include_once('functions.php');



if (isset($_GET['id3'])) {
						$id = $_GET['id3'];
                      $sql2 = "update pament set status='verified' where payment_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg1 = "updated";
                      header('location:pending_payment.php?msg1='.$msg1);
                    }



?>