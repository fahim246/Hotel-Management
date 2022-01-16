<?php
	session_start();
	session_destroy();
	session_unset($_SESSION['owner_code']);
	session_unset($_SESSION['owner_name']);
	session_unset($_SESSION['hotel_name']);
	header('location: login.php');
?>