
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
 <link rel="stylesheet" href="LPageStyle.css">
</head>
<body>

<h1 style="color:white";><center>Gettysburg College</center></h1>

<style>
body {
  background-image: url('glatfelter2.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}

</style>

<?php
include_once('db_connect.php');
session_start();
$fname	= $_POST['fname'];
$lname	= $_POST['lname'];
$email 	= $_POST['email'];
$sid 	= $_POST['sid'];
$cid 	= $_POST['cid'];
$str = "INSERT INTO student VALUE(\"$fname\", \"$lname\", \"$email\", $sid, $cid);";
$res = $db->query($str);
  if($res == FALSE) {
    print "<p>Error adding a new shift to the table </p>\n";
    print_r($db->errorInfo());
  }

?>

<div class='nav-brand'> 
 <a href='home.php'> 
   <img src='logo.png' alt='Official logo' width='100px' height='50px'> 
 </a> 
</div> 

<div class="header">
	<h2>TA Register</h2>
</div>
<form method="post">
	<div class="input-group">
		<label>First name</label>
		<input type="text" name="fname" value="">
	</div>
 <div class="input-group">
		<label>Last name</label>
		<input type="text" name="lname" value="">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div>
   <div class="input-group">
		<label>Student ID</label>
		<input type="text" name="sid" value="">
	</div>
   <div class="input-group">
		<label>Class ID</label>
		<input type="text" name="cid" value="">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already have an account? <a href="login.php">Log In</a>
	</p>
</form>
</body>
</html>
