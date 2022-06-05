<?php
session_start();
include_once 'db/db_config.php';
if (isset($_POST['reg'])) {
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $btype= $_POST['bloodType'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $addr=$_POST['address'];
  $state=$_POST['state'];
  $dis=$_POST['district'];
  $pwd=$_POST['password'];
  
  
  $q = mysqli_query($con, "INSERT INTO user(name,dob,gender,email,phone,state,district,password,blood_grp,addr)  
                    VALUES('$name','$dob','$gender','$email','$phone','$state','$dis','$pwd','$btype','$addr') ");
  if (!$q) {
    echo mysqli_error($con);
    die();
  } else {
    echo "
              <div class='w3-container w3-green w3-center' id='box'>
                <span style='font-size:20px;'>User Added succesfully!</span>
              </div>
              ";
  }
}
?>
<html>
<title>USER REGISTRATION </title>

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
      <li><a href="./index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="./availability.php" class="w3-bar-item w3-button"><i class="fas fa-tint"></i> Blood Availability</a></li>
      
      <li><a href="./User_register.php" class="w3-bar-item w3-button w3-red"><i class="	fas fa-user-edit"></i> Register</a></li>
      <li><a href="./User_login.php" class="w3-bar-item w3-button"><i class="fas fa-user-circle"></i> Login</a></li>
    </ul>
  </div>
  <!--HEADER NAV BAR--->

<!--body-->
  <!---USER REGISTRATION FORM STARTS HERE--->
  <div class="w3-white w3-card-4 w3-container w3-round" style="height:700px;width:900px;margin-top: 30px;margin-left:auto;margin-right:auto;">
  <div class="w3-center w3-container">
    <h1>USER REGISTRATION FOR BLOOD REQUEST</h1>
  </div>
    <form method='POST' action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
      <!--PERSONAL INFO--->
      <div class="w3-row">
        <div class="w3-container w3-half">
          <label for='name'>Full Name: </label>
          <input name="name" type="text" required class="w3-input w3-round-extra" placeholder="Full Name"></input><br>
          <label for='dob'>Date Of Birth: </label>
          <input name="dob" type="date" required class="w3-input w3-round-extra" placeholder="Date of Birth"></input><br>
          <label for='gender'>Gender: </label>
          <select name='gender' class='w3-input w3-round'>
            <option value='M'>Male</option>
            <option value='F'>Female</option>
            <option value='O'>Other</option>
          </select><br>
          <label for='bloodtype'>Blood Group: </label>
          <select name="bloodType" class="w3-input w3-round">
            <option value="0">Select Blood Group</option>
            <option value="AB-VE">AB-Ve</option>
            <option value="AB+VE">AB+Ve</option>
            <option value="A-VE">A-Ve</option>
            <option value="A+VE">A+Ve</option>
            <option value="B-VE">B-Ve</option>
            <option value="B+VE">B+Ve</option>
            <option value="OH-VE">Oh-VE</option>
            <option value="OH+VE">Oh+VE</option>
            <option value="O-VE">O-Ve</option>
            <option value="O+VE">O+Ve</option>
          </select><br>
          <label for='phone'>Phone: </label>
          <input name="phone" type="number" maxlength='10' required class="w3-input w3-round-extra" placeholder="Phone"></input><br>
          <label for='email'>Email: </label>
          <input name="email" type="email" required class="w3-input w3-round-extra" placeholder="abc@gmail.com"></input><br>

        </div>
        <!--contact information-->
        <div class="w3-container w3-half">
          <label for='Address'>Address: </label>
          <textarea name="address" type="text" required class="w3-input w3-round-extra" rows="5" cols="50" placeholder="Complete Address"></textarea><br>
          <label for='state'>State: </label>
          <input name="state" type="text" required class="w3-input w3-round-extra" placeholder="STATE"></input><br>
          <label for='district'>District: </label>
          <input name="district" type="text" required class="w3-input w3-round-extra" placeholder="District"></input><br>
          <label for='password'>Password: </label>
          <input name="password" type="password" required class="w3-input w3-round-extra" placeholder="Abc@123"></input><br>
          <label for='cpwd'>Confirm Password: </label>
          <input name="cpwd" type="password" required class="w3-input w3-round-extra" placeholder="Abc@123"></input><br>
        </div>
        <span><input type='checkbox' name='tc' required></input> By Registering you are agree the Term and Condtions of this website.</span>
      </div>
      <br>
      
      <button class='w3-button w3-round w3-red' style='float:right;' name='reg' type='submit'>REGISTER</button><br>
     </form>
    </div>
    <!----USER REGISTRATION FORM ENDS HERE---->
  
  </div>

  <div class='w3-black w3-center w3-container' style='margin-top:30px;'>
    <h5>&COPY; Vivek Singh</h5>
  </div>
  </div>
  <style>
    label {
      font-family: Arial, Helvetica, sans-serif;
      font-size: medium;
      font-weight: 100;
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