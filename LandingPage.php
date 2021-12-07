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

<div class='nav-brand'> 
 <a href='home.php'> 
   <img src='logo.png' alt='Official logo' width='100px' height='50px'> 
 </a> 
</div> 

<div class="header">
	<h2>TA Register</h2>
</div>
<form method="post" action="login.php">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Sign In</button>
	</div>
	<p>
		Don't have an account? <a href="register.php">Register</a>
	</p>
</form>
</body>
</html>
