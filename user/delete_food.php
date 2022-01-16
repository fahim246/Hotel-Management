<?php
session_start();
include_once('connect.php');
include_once('functions.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
                      
                      $sql2 = "delete from food_booking where booking_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:booked_food.php?msg='.$msg);
                      $msg = "deleted";
                      
                    }


?>