<?php
session_start();
include_once '../db/db_config.php';
if(!isset($_SESSION['admin'])){
	header('location: ./admin_login.php');
}
?>
<html>
<head>
<link rel="stylesheet" href="../w3.css">
<link rel="stylesheet" href="./my.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="#"><i class="fas fa-vial" style='font-size:20px;'></i> BLOOD BANK</a></li>
  <li><a href="./welcome.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./user_request.php" class="w3-bar-item w3-button w3-red"><i class="fas fa-users"></i> Requests</a></li>
  <li><a href="./add_record.php" class="w3-bar-item w3-button"><i class="fas fa-plus-circle"></i> Add Record</a></li>
  <li><a href="./admin_logout.php" class="w3-bar-item w3-button"><i class="	fas fa-sign-out-alt"></i> Logout</a></li>
  
  <li class="right" ><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['admin']; ?></a></li>
</ul>
</div>
<div class="w3-container">
    <h1>Blood Bank User Request are:</h1>



</div>