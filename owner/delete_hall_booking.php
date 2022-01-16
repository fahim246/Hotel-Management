<?php
session_start();
include_once('connect.php');
include_once('functions.php');

if (isset($_GET['id1'])) {
						$id = $_GET['id1'];
                      $sql2 = "delete from hall_booking where booking_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:confirmed_halls.php?msg='.$msg);
                    }

if (isset($_GET['id2'])) {
						$id = $_GET['id2'];
                      $sql2 = "delete from hall_booking where booking_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:pending_halls.php?msg='.$msg);
                    }

if (isset($_GET['id3'])) {
						$id = $_GET['id3'];
                      $sql2 = "update hall_booking set status='confirmed' where booking_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg1 = "deleted";
                      header('location:pending_halls.php?msg1='.$msg1);
                    }

if (isset($_GET['id4'])) {
            $id = $_GET['id4'];
                      $sql2 = "delete from hall_data where hall_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:available_halls.php?msg='.$msg);
                    }

?>