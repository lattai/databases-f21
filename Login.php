<!DOCTYPE html>
<?php
	session_start();
	$_SESSION['user'] = $_POST['login'];
	$user = $_SESSION['user'];
?>
<HTML>

<HEAD>
<TITLE>Login</TITLE>
<link rel="stylesheet" href="LPageStyle.css">
</HEAD>

<style>
body {
  background-image: url('glatfelter3.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  margin: 0px;
  position: relative;
  min-height: 100vh;
}
</style>

<BODY class="registerBody">
	<DIV class="header">
		<H2>Login</H2>
	</DIV>
	<FORM class="registerForm" method="post" action= "dashboard.php">

	<DIV class="input-group">
		<label>Email</label>
		<input type='hidden' name = 'op' value='login'>
		<input type="text" name="login" value="">
	</DIV>
	
	<DIV class="input-group">
		<label>Password</label>
		<input type='hidden' name = 'pass' value=''>
		<input type="text" name="password" value="">
	</DIV>
	
	<DIV class="input-group">
	<button type="submit" class="btn" value="login"> Login</button>
	</DIV>
	
	<p>
		Need an Account? <a href="register.php">Sign Up</a>
	</p>
</FORM>
</BODY>
</HTML>
