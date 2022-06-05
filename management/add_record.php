<?php
session_start();
include_once '../db/db_config.php';
if (!isset($_SESSION['admin'])) {
    header('location: ./admin_login.php');
}
if (isset($_POST['add'])){
    $btype=$_POST['bloodType'];
    $bcomp=$_POST['bloodComponentType'];
    $unit=$_POST['unit'];
    $name=$_SESSION['admin'];


    $q1=mysqli_query($con,"SELECT * FROM admin WHERE username='$name'");
    if (mysqli_num_rows($q1) > 0) {
      while ($row = mysqli_fetch_array($q1)) {
          $state=$row['state'];
          $category=$row['category'];
          $h_id=$row['id'];

      }
    }

    $q=mysqli_query($con, "INSERT INTO hospitals(h_id,state,category,type,avail,unit) VALUES('$h_id','$state','$category','$btype','$bcomp','$unit') ");
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
            <li><a href="./user_request.php" class="w3-bar-item w3-button"><i class="fas fa-users"></i> Requests</a></li>
            <li><a href="./add_record.php" class="w3-bar-item w3-button w3-red"><i class="fas fa-plus-circle"></i> Add Record</a></li>
            <li><a href="./admin_logout.php" class="w3-bar-item w3-button"><i class="	fas fa-sign-out-alt"></i> Logout</a></li>

            <li class="right"><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['admin']; ?></a></li>
        </ul>
    </div>
    <br>
    <div class="w3-container">
        <h1>ADD BLOOD GROUP</h1>
        <form method='POST' action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <div class="w3-row">
                <div class="w3-container w3-half">
                    <label for='bloodType'>Blood Group:</label><br>
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
                    </select>
                    <br>
                    <label for="bloodComponentType">Blood Component Type:</label><br>
                    <select name="bloodComponentType" class="w3-input w3-round">
                        <option value="0">Select Blood Component</option>
                        <option value="Whole Blood">Whole Blood</option>
                        <option value="Single Donor Platelet">Single Donor Platelet</option>
                        <option value="Single Donor Plasma">Single Donor Plasma</option>
                        <option value="Sagm Packed Red Blood Cells">Sagm Packed Red Blood Cells</option>
                        <option value="Platelet Rich Plasma">Platelet Rich Plasma</option>
                        <option value="Platelet Poor Plasma">Platelet Poor Plasma</option>
                        <option value="Platelet Concentrate">Platelet Concentrate</option>
                        <option value="Plasma">Plasma</option>
                        <option value="Packed Red Blood Cells">Packed Red Blood Cells</option>
                        <option value="Leukoreduced Rbc">Leukoreduced Rbc</option>
                        <option value="Irradiated RBC">Irradiated RBC</option>
                        <option value="Fresh Frozen Plasma">Fresh Frozen Plasma</option>
                        <option value="Cryoprecipitate">Cryoprecipitate</option>
                        <option value="Cryo Poor Plasma">Cryo Poor Plasma</option>
                    </select>
                    <br> 
                <label for='unit'>Unit:</label><br>
                <input name='unit' type='number' placeholder="Number of Units" class="w3-input w3-round"></input>
                <br>
                <button name='add' type='submit' class="w3-button w3-red w3-round">ADD BLOOD GROUP</button>
                </div>
                
        </form>
    </div>