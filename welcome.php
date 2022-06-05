<?php
session_start();
include_once 'db/db_config.php';
if(!isset($_SESSION['user'])){
	header('location: ./user_login.php');
}
else{
  $phone=$_SESSION['user'];
  $q=mysqli_query($con,"SELECT * FROM user WHERE phone='$phone'");
  $r=mysqli_fetch_assoc($q);
    $name=$r['name'];
    $email=$r['email'];
}
?>
<html>
<title>Blood Bank System</title>

<head>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="./management/my.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
  <!--HEADER NAV BAR --->
  <div class="w3-card-4">
    <ul class="topnav">
      <li><a href="#"><i class="fas fa-vial" style='font-size:20px;'></i> BLOOD BANK</a></li>
      <li><a href="./index.php" class="w3-bar-item w3-button  w3-red"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="./availability.php" class="w3-bar-item w3-button"><i class="fas fa-tint"></i> Blood Availability</a></li>
    
      <li><a href="./User_login.php" class="w3-bar-item w3-button"><i class="fas fa-user-circle"></i> <?php echo $name; ?></a></li>
      <li><a href="./user_logout.php" class="w3-bar-item w3-button"><i class="fas fa-sign-in"></i> Logout</a></li>
    </ul>
  </div>
  <!--HEADER NAV BAR--->
      <div class='w3-container w3-center'>
      <h1>Welcome to <b style='color:red;'>Blood Bank System</b></h1>
      </div>
  <!--body-->
  <div class="w3-row">
    <div class="w3-container w3-half">
      <h2 style='color:red;'><b>WHAT IS BLOOD BANK?</b></h2>
      <p>A blood bank is a center where blood gathered as a result of blood donation is stored and preserved for later use in blood transfusion. </p>
      <h2 style='color:red;'><b>TYPES OF DONATION</b></h2>
      <p>The human body contains five liters of blood, which is made of several useful components i.e. Whole blood, Platelet, and Plasma.</p>
      <p>Each type of component has several medical uses and can be used for different medical treatments. your blood donation determines the best donation for you to make.</p>
      <p>For plasma and platelet donation you must have donated whole blood in past two years.</p>
<h2 style='color:red;'><b>WHAT IS WHOLE BLOOD?</b></h2>
<p>Blood Collected straight from the donor after its donation usually separated into red blood cells, platelets, and plasma.

<h2 style='color:red'>WHO CAN DONATE?</h2>
<p>You need to be 18-65 years old, weigh 45kg or more and be fit and healthy.</p>

<h2 style='color:red'>USED FOR?</h2>
<p>Stomach disease, kidney disease, childbirth, operations, blood loss, trauma, cancer, blood diseases, haemophilia, anemia, heart disease.</p>

<h2 style='color:red'>LASTS FOR?</h2>
<p>Red cells can be stored for 42 days.</p>

<h2 style='color:red'>HOW LONG DOES IT TAKE?</h2>
<p>15 minutes to donate.</p>

<h2 style='color:red'>HOW OFTEN I CAN DONATE?</h2>
<p>Every 12 weeks</p>
   </div>
   <div class="w3-container w3-half">
   <h1>LEARN ABOUT DONATION</h1>
    <img src='static/bk.jfif' style='width:90%;height:auto;'></img>
   </div>
  </div>


  <div class='w3-black w3-center w3-container' style='margin-top:30px;'>
    <h5>&COPY; Blood Bank System</h5>
  </div>
  </div>
  <style>
    .content {
      margin-top: 50px;
      margin-right: 50%;
      margin-left: 50px;
    }
  </style>
</body>

</html>