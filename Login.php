<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE> Login </TITLE>
<link rel="stylesheet" href="style.css">

<?php 
include('bootstrap.php');
include_once('db_connect.php');
session_start();
$uid = 05; //for testing purposes only
?>

<STYLE>	
.title{
  text-align:"center"
}
</STYLE>
</HEAD>
<BODY>
<DIV class="header" id="divMain" style="text-align=:right">
	<DIV><H3> Sign Up </H3></DIV>
</DIV>
<DIV class = "title">
	<H1>Timesheet System</H1>
</DIV>
<DIV class="blueRect">
	<form>
		<label for="username">Username:</label>
        	<input type="text" id="username" name="username"> <br>
        	<label for="passwird">Password:</label>
        	<input type="text" id="password" name="password"> <br>
        	<input type="submit" value="Login">
        </form>
</DIV>

</BODY>
</HTML>
