<?php
session_start();
include_once 'db/db_config.php';
if (isset($_POST['request'])){
    $hid=$_POST['id'];
    #CHECK USER LOGGED OR NOT
    if(!isset($_SESSION['user'])){
	header('location: User_login.php');
    }
    #IF USER ALREADY LOGIN THEN PROCEED TO REQUEST
    else{
        $btype=$_POST['btype'];
        $bcomp=$_POST['bcomp'];

        $phone=$_SESSION['user'];
        $q=mysqli_query($con,"SELECT * FROM user WHERE phone='$phone'");
        $r=mysqli_fetch_assoc($q);
        $id=$r['id'];
          $name=$r['name'];

        $q2=mysqli_query($con,"INSERT INTO status(uid,hid,btype,bcomp) VALUES('$id','$hid','$btype','$bcomp') ");
        
        
        header('location: success.php');

    }
    
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Blood Availability</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="./management/my.css">
</head>

<body>
<div class="w3-card-4">
    <ul class="topnav">
    <li><a href="#"><i class="fas fa-vial" style='font-size:20px;'></i> BLOOD BANK</a></li>
      <li><a href="./index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="./availability.php" class="w3-bar-item w3-button w3-red"><i class="fas fa-tint"></i> Blood Availability</a></li>
      
      <?php 
        if(!isset($_SESSION['user'])){
           echo   "<li><a href='./User_register.php' class='w3-bar-item w3-button'><i class='fas fa-user-edit'></i> Register</a></li>
            <li><a href='./User_login.php' class='w3-bar-item w3-button'><i class='fas fa-user-circle'></i> Login</a></li>";
        }
        else{
            echo "
            <li><a href='./success.php' class='w3-bar-item w3-button'><i class='fas fa-users'></i> Your Requests</a></li>
            <li><a href='./user_logout.php' class='w3-bar-item w3-button'><i class='fas fa-sign-in'></i> Logout</a></li>";
        }
      ?>
    </ul>
  </div>
    <!--HEADING--->

    <!-- AVAILABILITY DATA TABLE-->
    <div class="container">
        <h1 style='color:red;'>Blood Bank Availability</h1>

        <form method='POST' action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <div class="row">
            <div class="col-sm-4 form-group">
                <select name="state" id="state" class="form-control">
                    <option value="SELECT STATE">SELECT STATE</option>
                    <option value="DELHI">DELHI</option>
                    <option value="HARYANA">HARYANA</option>
                    <option value="PUNJAB">PUNJAB</option>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <select name="bloodType" class="form-control">
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
                    <option value="ALL">All Blood Groups</option>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                    <select name="bloodComponentType" class="form-control">
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
            </div>
            <div class="col-sm-4 form-group">
                <button class="btn btn-primary" name='submit' value='submit' type='submit'>SEARCH</button>
                </form>
            </div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Bank Address</th>
                        <th scope="col">Category</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Component</th>
                        <th scope="col">Request</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])){
                        $state=$_POST['state'];
                        $type=$_POST['bloodType'];
                        $bcomp=$_POST['bloodComponentType'];
                        
                        $no = mysqli_query($con, "SELECT * FROM admin WHERE id in (SELECT h_id FROM hospitals WHERE state='$state'AND type='$type' AND avail='$bcomp') ");
                        if (mysqli_num_rows($no) > 0) {
                            while ($row = mysqli_fetch_array($no)) {
                                echo "
                            <tr>
                            <th>" . $row["id"] . "</th>
                            <td>" . $row["h_name"] . "</td>
                            <td>" . $row["h_add"] . "</td>
                            <td>" . $row["category"] . "</td>
                            <td>" . $type. "</td>
                            <td>" . $bcomp. "</td>
                            <td>";
                            
                            echo "
                            <form method='POST' action='availability.php'>
                            <input type='hidden' name='id' value=".$row["id"]."></input>
                            <input type='hidden' name='bcomp' value='"; 
                            
                            echo $bcomp; 
                            
                            echo "'></input>
                            <input type='hidden' name='btype' value=".$type."></input><button class='btn btn-success' name='request'>REQUEST NOW</button></form>
                            
                            </td>
                            </tr>";
                            }
                            echo "</tbody>
                                    </table>";
                        }
                        else{
                            echo "</tbody>
                            </table>
                            <h1>NO DATA AVAILABLE</h1>";
                        }
                    }
                    ?>
        </div>

</body>

</html>