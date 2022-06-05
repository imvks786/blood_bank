<?php
session_start();
include_once '../db/db_config.php';
if(!isset($_SESSION['admin'])){
	header('location: ./admin_login.php');
}
else{
  $name=$_SESSION['admin'];
}

?>
<html>
<head>
<link rel="stylesheet" href="../w3.css">
<link rel="stylesheet" href="./my.css">
<link rel="stylesheet" href="./management/my.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="#"><i class="fas fa-vial" style='font-size:20px;'></i> BLOOD BANK</a></li>
  <li><a href="./welcome.php" class="w3-bar-item w3-button w3-red"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./user_request.php" class="w3-bar-item w3-button"><i class="fas fa-users"></i> Requests</a></li>
  <li><a href="./add_record.php" class="w3-bar-item w3-button"><i class="fas fa-plus-circle"></i> Add Record</a></li>
  <li><a href="./admin_logout.php" class="w3-bar-item w3-button"><i class="	fas fa-sign-out-alt"></i> Logout</a></li>
  
  <li class="right" ><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['admin']; ?></a></li>
</ul>
</div>
<?php 
    $q=mysqli_query($con,"SELECT * FROM admin WHERE username='$name'");
    if (mysqli_num_rows($q) > 0) {
      while ($row = mysqli_fetch_array($q)) {
          $h_name=$row['h_name'];
          $h_add=$row['h_add'];
          $h_phone=$row['h_phone'];
          $h_email=$row['h_email'];

      }
    }
    ?>
    <div class='w3-container w3-red w3-center'>
      <h2><i class="far fa-hospital"></i><b> <?php echo $h_name; ?></b></h3>
    </div>
    <div class='w3-container'>

      <h1>Welcome Back <?php echo $_SESSION['admin'];?></h1>
      <h5><b>Address: </b><?php echo $h_add; ?></h5>
      <h5><b>Phone: </b><?php echo $h_phone; ?></h5>
      <h5><b>Email: </b><?php echo $h_email; ?></h5>
  </div>



</div>

</body>
</html>