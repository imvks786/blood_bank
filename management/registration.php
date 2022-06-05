<?php
session_start();
include_once '../db/db_config.php';
if (isset($_SESSION['admin'])) {
  header('location: ./welcome.php');
}
if (isset($_POST['submit'])) {
  $usr = $_POST['id'];
  $pwd = $_POST['pwd'];
  $hname = $_POST['hname'];
  $hadd = $_POST['hadd'];
  $hphone = $_POST['hphone'];
  $hemail = $_POST['hemail'];
  $state=$_POST['state'];
  $cate=$_POST['cate'];


  $q = mysqli_query($con, "INSERT INTO admin(username,password,h_name,h_add,h_phone,h_email,category,state) 
                    VALUES('$usr','$pwd','$hname','$hadd','$hphone','$hemail','$cate','$state') ");
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
<title>Hospital Login</title>

<head>
  <link rel="stylesheet" href="../w3.css">
</head>

<body>
  <div class="w3-white w3-card-4 w3-container w3-round" style="height:650px;width:900px;margin-top: 30px;margin-left:auto;margin-right:auto;">
    <h3>Hospital Registration Portal</h3>
    <form class="w3-container" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
      <div class="w3-row">
        <div class="w3-container w3-half">
          <label>User ID:</label>
          <input class="w3-input w3-round" name="id" type="text" required><br>
          <label>Password:</label>
          <input class="w3-input w3-round" name="pwd" type="password" autocomplete="on" required><br>
          <label>Confirm Password:</label>
          <input class="w3-input w3-round" name="c_pwd" type="password" autocomplete="on" required><br>
          <label>Hospital Address:</label>
          <textarea class="w3-input w3-round" name="hadd" type="text" rows="4" cols="50" autocomplete="on" required></textarea><br>
        </div>
        <div class="w3-container w3-half">
          <!--HOSPITAL DETAILS-->
          <label>Hospital Name:</label>
          <input class="w3-input w3-round" name="hname" type="text" autocomplete="on" required><br>

          <label>Hospital Phone:</label>
          <input class="w3-input w3-round" name="hphone" type="number" maxlength='10' autocomplete="on" required><br>
          <label>Hospital Email:</label>
          <input class="w3-input w3-round" name="hemail" type="email" autocomplete="on" required><br>
          <label>Hospital Category:</label>
          <select name='cate' for='cate' class='w3-input'>
              <option value='SELECT CATEGORY'>SELECT OPTION</option>
              <option value='GOVT.'>GOVERMENT</option>
              <option value='PRIVATE'>PRIVATE</option>
          </select><br>
          <label>State:</label>
          <input type='text' name='state' class='w3-input w3-round' required></input>
        </div>
      </div>
      <hr>
      <div class='w3-container w3-center'>
        <button class="w3-button w3-red w3-round" name="submit" value="submit">REGISTER</button><br>
        <br>
        <span>By Registering you are agree the Term and Condtions of this website.</span>
      </div>
      <a href="#" onClick="forgot=window.open('./index.php','width=700,height=700');"><button class="w3-button w3-green w3-round">LOGIN</button></a><br>
    </form>
  </div>
  <br><br><br>
  <style>
    body {
      background-image: url("https://wallpaperaccess.com/full/754632.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    hr {
      color: black;
    }
  </style>
</body>

</html>