<?php

session_start();
if ($_SESSION['user_code']) {
  include_once('connect.php');
}else{
  header('location:login.php');
}

?>
<html>
<head>
<title> Homepage </title>
<link rel="stylesheet" href="homedesign.css">
</head>
<body>
<header>
<div class="row">
<a class="logo" href="home.html"><img src="download (1).png"></a>
<ul>
     <li><a href="home.html"> HOME</a></li>
   <li><a href="#"> ROOMS</a>
    <ul>
   <li><a href="rooms.php?id=<?php echo "single"; ?>">Single</a></a></li>
   <li><a href="rooms.php?id=<?php echo "double"; ?>">Double</a></li>
   <li><a href="rooms.php?id=<?php echo "family"; ?>">Family</a></li>
  </ul>
   </li>
   <li><a href="#"> HALLS</a>
    <ul>
   <li><a href="halls.php?id1=<?php echo "wedding"; ?>">Wedding Hall</a></li>
   <li><a href="halls.php?id1=<?php echo "conference"; ?>">Conference Hall</a></li>
   <li><a href="halls.php?id1=<?php echo "party"; ?>">Party Hall</a></li>
  </ul>
   </li>
   <li><a href="#"> FOOD</a>
    <ul>
   <li><a href="foods.php?id2=<?php echo "Breakfast"; ?>">Breakfast</a></li>
   <li><a href="foods.php?id2=<?php echo "Lunch"; ?>">Lunch</a></li>
   <li><a href="foods.php?id2=<?php echo "Dinner"; ?>">Dinner</a></li>
  </ul>
   </li>
   <li><a href="#"> EVENTS</a>
    <ul>
   <li><a href="">Parites</a></li>
   <li><a href="">Meetings</a></li>
  </ul>
   </li>
   <li><a href="#"> SERVICES</a>
    <ul>
   <li><a href="">Pool</a></li>
   <li><a href="">Spa</a></li>
   <li><a href="">Taxi</a></li>
   <li><a href="">Guided Tour</a></li>
  </ul>
   </li>
   <li><a href="dashboard.php"> DASHBOARD</a>
    
   
   </li>

</div>
<div class="hero">
     
   <div class="button">
   <a href="rooms.html" class="btn btn-one"> Book a room</a>
   </div>
</div>
</header>
</body>
</html>