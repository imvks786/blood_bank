<?php
session_start();
include_once 'db/db_config.php';
if (!isset($_SESSION['user'])) {
    header('location: User_login.php');
} else {
    $phone = $_SESSION['user'];
    $q = mysqli_query($con, "SELECT * FROM user WHERE phone='$phone'");
    $r = mysqli_fetch_assoc($q);
    $id = $r['id'];
    $name = $r['name'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Success!</title>
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
            if (!isset($_SESSION['user'])) {
                echo   "<li><a href='./User_register.php' class='w3-bar-item w3-button'><i class='fas fa-user-edit'></i> Register</a></li>
            <li><a href='./User_login.php' class='w3-bar-item w3-button'><i class='fas fa-user-circle'></i> Login</a></li>";
            } else {
                echo "
            <li><a href='./success.php' class='w3-bar-item w3-button'><i class='fas fa-users'></i> Your Requests</a></li>
            <li><a href='./user_logout.php' class='w3-bar-item w3-button'><i class='fas fa-sign-in'></i> Logout</a></li>";
            }
            ?>
        </ul>
    </div>
    <div class='w3-container w3-center' id='mydiv'>
        <h1><b style='color:red;'>YOUR BLOOD REQUESTS</b></h1>
        <h3>Your Current Status is shown below.</h3>
    </div>
    <div class='w3-container'>
        <table class='w3-table w3-table-all w3-bordered w3-hoverable'>
            <thead>
                <tr class="w3-red">
                    <th>Your ID</th>
                    <th>Bank Name</th>
                    <th>Blood Group</th>
                    <th>Component</th>
                    <th>Current Status</th>
                    <th>Date Time</th>
                </tr>
            </thead>
            <?php
            $no = mysqli_query($con, "SELECT * FROM status WHERE uid='$id' ");
            if (mysqli_num_rows($no) > 0) {
                while ($row = mysqli_fetch_array($no)) {
                    echo "<tr>
                            <td>" . $row["uid"] . "</td>";
                    $hid = $row['hid'];
                    $q3 = mysqli_query($con, "SELECT * FROM admin WHERE id='$hid'");
                    $r = mysqli_fetch_assoc($q3);
                    echo "<td>" . $r['h_name'] . "<br><b>Address: </b>" . $r['h_add'] . "<br><b>Phone: </b>" . $r['h_phone'] . "</td>
                            <td>" . $row["btype"] . "</td>
                            <td>" . $row["bcomp"] . "</td>";
                    if ($row['status'] == 0) {
                        echo "<td><b style='color:red;background-color:#c3f7f2;'>WAITING FOR APPROVAL</b></td>";
                    } else {
                        echo  "<td style='color:green;background-color:##b1faa7;'><b>APPROVED</b></td>";
                    }
                    echo "
                            <td>" . $row['dt'] . "</td>
                            ";
                }
            } else {
                echo "
                            <div class='w3-container w3-center'>
                                 <h1>CURRENTLY NO REQUESTS FOUND</h1>
                                 </div>";
            }
            ?>
        </table>
    </div>
</body>

</html>