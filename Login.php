<!DOCTYPE html>
<HTML>

<HEAD>
<TITLE>Login</TITLE>
<link rel="stylesheet" href="style.css">
</HEAD>

<BODY class="registerBody">
	<DIV class="registerHeader">
		<H2>Login</H2>
	</DIV>
	<FORM class="registerForm" method="post" action="login.php">

	<DIV class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="">
	</DIV>
	
	<DIV class="input-group">
		<label>Password</label>
		<input type="password" name="password">
	</DIV>
	
	<DIV class="input-group">
		<button type="submit" class="btn" name="login_btn">Login</button>
	</DIV>
	
	<p>
		Need an Account? <a href="register.php">Sign Up</a>
	</p>
</FORM>
</BODY>
</HTML>
