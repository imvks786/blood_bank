<?php
session_start();
include_once '../db/db_config.php';
if (isset($_SESSION['admin'])) {
	header('location: ./welcome.php');
}
if (isset($_POST['submit'])) {
	$a_usr = $_POST['a_usr'];
	$a_pwd = $_POST['a_pwd'];
	$ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$a_usr' AND password='$a_pwd' ");
	$row = mysqli_fetch_assoc($ret);
	if (!$row) {
?>
		<script>
			alert("Username or Password Invaild !");
			window.open("./admin_login.php", "_self")
		</script>
	<?php
	} else {
		$_SESSION['admin'] = $a_usr;
	?>
		<script>
			alert("Login Successful!");
			window.open("./welcome.php", "_self")
		</script>
<?php
	}
}
?>
<html>
<title>Hospital Admin Login</title>

<head>
	<link rel="stylesheet" href="../w3.css">

</head>

<body>
	<div class="w3-white w3-card-4 w3-container w3-round w3-center" style="height:400px;width: 320px;margin-top: 82px;margin-left:auto;margin-right:auto;">
		<h3>Hospital Login</h3>
		<form class="w3-container" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
			<label>User ID:</label>
			<input class="w3-input w3-round" name="a_usr" type="text" required><br>
			<label>Password:</label>
			<input class="w3-input w3-round" name="a_pwd" type="password" autocomplete="on" required><br>
			<button class="w3-button w3-green w3-round" name="submit" value="submit">Login</button><br>
			<br>
			<a href="#" onClick="forgot=window.open('./reset/forgot.php','forgot','width=700,height=700'); return false;"><button class='w3-red w3-round w3-button'>Forgotten Password</button></a><br><br>
			<a href="#" onClick="forgot=window.open('./registration.php','width=700,height=700');"><button class='w3-blue w3-round w3-button'>New Registration</button></a>
			<br></br>
		</form>
	</div>

	<style>
		body {
			background-image: url("https://wallpaperaccess.com/full/754632.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</body>

</html>