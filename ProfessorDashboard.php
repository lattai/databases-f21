<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Professor Dashboard</TITLE>
<link rel="stylesheet" href="style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&display=swap" rel="stylesheet"> 


<?php 
include('bootstrap.php');
include_once('db_connect.php');
session_start();
$uid = $_SESSION['user'];
?>

<STYLE>

.head {
	width: 100%;
	margin:  0px;
	color: #ebebff;
	background: #00008B;
	text-align: center;
	border: 1px solid #00008B;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
	
	font-family: 'Lora', serif;
	font-weight : 600;
	font-size: 25px;
	}
 .header {
    background-color: #00008B;
    color: goldenrod;
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    padding-left: 50px;
    padding-right: 50px;
    font-family: 'Lora', serif;
    font-weight : 600;
    font-size: 25px;
    }
.box{
	width: 40%;
	margin: 0px;
	color: #00008B;
	background: #ebebff;
	text-align: center;

	border-radius: 10px 10px 0px 0px;
}
.boxes{
	display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  align-content: flex-start;
  padding: 50px;
}
#divTables{
	padding-top: 0px;
}	
table{
	width: 100%;
}

.menu a, .header h3{
	color: goldenrod;
	padding: 20px;
}
body {
    margin: 0px;
    position: relative;
    min-height: 100vh;
    background-image: url('glatfelter3.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

</STYLE>
</HEAD>
<BODY>

<DIV class="header" id="divMain">
	<Div><H3> Professor Dashboard </H3></DIV>
	<DIV class = "menu"><H3><A href="profSetup.php" style="color: goldenrod;"> Setup <A href="yourClasses.php" style="color: goldenrod;">Your Classes </a> <A href="index.php" style="color: goldenrod;">Logout</a></H3></DIV>

</DIV>
<?php
$str = "SELECT * FROM student NATURAL JOIN class WHERE iid = $uid;";

$res = $db->query($str);

if ($res != FALSE) {
	$nRows = $res->rowCount();
}
else {
    printf("Error with query: %s\n", $str);
	print_r($db->errorInfo());
}
?>
<DIV class="boxes">
<DIV class="box">
<DIV class="head"> Your PLAs </DIV>
<DIV class="flex-container" id="divTables">

	<TABLE border="1" cellspacing="0" cellpadding="10">
	<TR>
	<TH>Name of PLA</TH>
	<TH>Course</TH>
	<TH> Email </TH>
	</TR>

	<?php

	if ($nRows > 0) {

		$row = $res->fetch();

		while ($row != FALSE) {
			$fname   = $row['fname'];
			$lname = $row['lname'];
			$course = $row['cid'];
			$email = $row['email'];

			$tRow = "<TR><TD>$lname, $fname</TD><TD>$course</TD><TD><a href=\"$email\" >$email<a></TD></TR>\n";

			print $tRow;

			$row = $res->fetch();
	}
}
?>
</TABLE>
	</DIV>
	</DIV>
	
<DIV class="box">
<DIV class="head"> Student Questions </DIV>
<DIV class="flex-container" id="divTables">


<?php
$str2 = "SELECT * FROM student NATURAL JOIN class JOIN hasQuestion ON class.taid = hasQuestion.taid WHERE iid = $uid;";
$res2 = $db->query($str2);

if ($res2 != FALSE) {
	$nRows2 = $res2->rowCount();
}
else {
    printf("Error with query: %s\n", $str2);
	print_r($db->errorInfo());
}
?>

<TABLE border="1" cellspacing="0" cellpadding="10">
	<TR>
	<TH>Student</TH>
	<TH>Section</TH>
	<TH>Question Topic</TH>
	<TH>Question</TH>
	</TR>

	<?php

	if ($nRows2 > 0) {
		$row = $res2->fetch();

		while ($row != FALSE) {
			$fname   = $row['fname'];
			$lname = $row['lname'];
			$section = $row['section'];
			$topic = $row['topic'];
			$question =$row['question'];
		
	
			$tRow = "<TR><TD>$fname $lname</TD><TD>$section</TD><TD>$topic</TD><TD>$question</TD></TR>\n";
	
			print $tRow;

			$row = $res2->fetch();
		}
}
?>
</TABLE>
</DIV>
</DIV>
</DIV>
</BODY>
</HTML>

