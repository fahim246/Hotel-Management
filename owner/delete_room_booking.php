<?php
session_start();
include_once('connect.php');
include_once('functions.php');

if (isset($_GET['id1'])) {
						$id = $_GET['id1'];
                      $sql2 = "delete from room_booking where booking_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:confirmed_rooms.php?msg='.$msg);
                    }

if (isset($_GET['id2'])) {
						$id = $_GET['id2'];
                      $sql2 = "delete from room_booking where booking_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:pending_rooms.php?msg='.$msg);
                    }

if (isset($_GET['id3'])) {
						$id = $_GET['id3'];
                      $sql2 = "update room_booking set status='confirmed' where booking_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg1 = "deleted";
                      header('location:pending_rooms.php?msg1='.$msg1);
                    }

if (isset($_GET['id4'])) {
            $id = $_GET['id4'];
                      $sql2 = "delete from room_data where room_id='$id' ";
                      $result=mysqli_query($conn,$sql2);
                      $msg = "deleted";
                      header('location:available_rooms.php?msg='.$msg);
                    }

?>