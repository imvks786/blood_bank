<?php
session_start();
include_once 'db/db_config.php';
if(isset($_SESSION['user'])){
	header('location: ./welcome.php');
}

if (isset($_POST['login'])) {
  $phone = $_POST['phone'];
  $pwd=$_POST['pwd'];
  
  
  $q = mysqli_query($con, "SELECT * FROM user WHERE phone='$phone' AND password='$pwd'");   
  $row = mysqli_fetch_assoc($q);
  if(!$row) { 
		?>
			<script>
			alert("Username or Password Invaild !");
			window.open("./User_login.php","_self")
			</script>
		<?php
			}
		else {
      
			$_SESSION['user']=$phone;
			?>
			<script>
			alert("Login Successful!");
			window.open("./welcome.php","_self")
			</script>
		<?php
			} 
    }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS only -->
  <link rel="stylesheet" href="./w3.css">
  <link rel="stylesheet" href="./management/my.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <!--HEADER NAV BAR --->
    <div class="w3-card-4">
    <ul class="topnav">
    <li><a href="#"><i class="fas fa-vial" style='font-size:20px;'></i> BLOOD BANK</a></li>
      <li><a href="./index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="./availability.php" class="w3-bar-item w3-button"><i class="fas fa-tint"></i> Blood Availability</a></li>
      
      <li><a href="./User_register.php" class="w3-bar-item w3-button"><i class="	fas fa-user-edit"></i> Register</a></li>
      <li><a href="./User_login.php" class="w3-bar-item w3-button w3-red"><i class="fas fa-user-circle"></i> Login</a></li>
    </ul>
  </div>
  <!--HEADER NAV BAR ENDS --->
  <br>
  <div class='content'>
    <div class='w3-container w3-center w3-round w3-red'>
      <br>
    <i style='font-size:100px;' class="fas fa-user-circle"></i>
      <h1>Login to Continue</h1>
    </div>

    <div class='w3-card-4 w3-white w3-round w3-container'>
    <br>
      <form method='POST' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>'>

        <label for='bookname'><b>Registered Phone Number:</b></label><br>
        <input class='w3-input' required name='phone' type='number' placeholder="ENTER PHONE NUMBER"></input><br>
        <label for='bookname'><b>Your Password:</b></label><br>
        <input class='w3-input' required name='pwd' type='password' placeholder="ENTER PASSWORD"></input><br>

        <button class='w3-button w3-round w3-red' name='login' type='submit'><i class="fas fa-lock"></i>	Login</button><br><br>

      </form>
    </div>
  </div>

  <div class='w3-black w3-center w3-container' style='margin-top:100px;'>
    <h5>&COPY; Vivek Singh</h5>
  </div>

  <style>
    label{
      font-family: Arial, Helvetica, sans-serif;
      font-size: medium;

    }
    b{
      font-size:20px;
    }
    body {
      background-image: url("https://i.pinimg.com/736x/82/15/9d/82159d2d81ff1b5cc7e826238e47c709.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }
    .content {
      margin-top: 50px;
      margin-right: 50%;
      margin-left: 100px;
    }
  </style>
</body>

</html>