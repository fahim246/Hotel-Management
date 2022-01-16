<?php
session_start();
include_once('connect.php');
include_once('functions.php');

if (isset($_GET['id1'])) {
						$id = $_GET['id1'];
                      $sql2 = "delete from hotel_data where hotel_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:verified_hotels.php?msg='.$msg);
                    }

if (isset($_GET['id2'])) {
						$id = $_GET['id2'];
                      $sql2 = "delete from hotel_data where hotel_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:pending_hotels.php?msg='.$msg);
                    }

if (isset($_GET['id3'])) {
						$id = $_GET['id3'];
                      $sql2 = "update hotel_data set status='verified' where hotel_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg1 = "updated";
                      header('location:pending_hotels.php?msg1='.$msg1);
                    }

if (isset($_GET['id4'])) {
            $id = $_GET['id4'];
                      $sql2 = "delete from hotel_data where hotel_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:available_hotels.php?msg='.$msg);
                    }

?>