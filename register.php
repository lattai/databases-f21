

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
 <link rel="stylesheet" href="LPageStyle.css">
</head>
<body>

<h1 style="color:#ebebff";><center>Gettysburg College</center></h1>

<style>
body {
  background-image: url('glatfelter3.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}

</style>

<?php
include_once('db_connect.php');
session_start();
$_SESSION['user'] = $_POST['iid'];
$uid = $_SESSION['user'];

?>


<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="dashboard.php?op=register">
	<div class="input-group">
		<label>First name</label>
		<input type="text" name="fname" id="fname">
	</div>
	 <div class="input-group">
		<label>Last name</label>
		<input type="text" name="lname" id="lname">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" id="email">
	</div>
   	<div class="input-group">
		<label>Instructor ID</label>
		<input type="text" name="iid" id="iid">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already have an account? <a href="Login.php">Log In</a>
	</p>
</form>
</body>
</html>
