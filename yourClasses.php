<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Your Classes</TITLE>
<link rel="stylesheet" href="style.css">
<?php 
include('bootstrap.php');
include_once('db_connect.php');
session_start();
$uid = $_SESSION['user'];
?>

<STYLE>

.menu a, .header h3{
	color: goldenrod;
	padding: 20px;
}
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
	<Div><H3> Your Classes </H3></DIV>
	<DIV class="menu"><H3><A href="profSetup.php" style="color: goldenrod;"> Setup</A> <A href="ProfessorDashboard.php" style="color: goldenrod;"> Dashboard </A><A href="index.php" style="color: goldenrod;"> Logout</A></H3></DIV>

</DIV>
<?php
$str = "SELECT * FROM class WHERE iid = $uid;";

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
<div class = "box">
<div class = "head"> Your Classes </div>
<DIV class="flex-container" id="divTables">
	<TABLE border="1" cellspacing="0" cellpadding="10">
	<TR>
	<TH>Name of Class</TH>
	<TH>Course Id</TH>
	</TR>

	<?php

	if ($nRows > 0) {

		$row = $res->fetch();

		while ($row != FALSE) {
			$cname   = $row['cname'];
			$course = $row['cid'];

			$tRow = "<TR><TD>$cname</TD><TD>$course</TD></TR>\n";

			print $tRow;

			$row = $res->fetch();
	}
}
?>
</TABLE>
</div>
</div>


<DIV class="box">
<DIV class="head"> Your Students </DIV>
<DIV class="flex-container" id="divTables">
<?php
$str2 = "SELECT * FROM enrollsIn JOIN student ON enrollsIn.sid = student.sid JOIN class on class.cid = enrollsIn.cid
WHERE enrollsIn.cid IN (SELECT class.cid FROM class WHERE iid = $uid);";

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
	<TH>Class</TH>
	<TH>Section</TH>
	</TR>

	<?php
	if ($nRows2 > 0) {
		$row = $res2->fetch();

		while ($row != FALSE) {
			$fname  = $row['fname'];
			$lname = $row['lname'];
			$section = $row['section'];
			$class = $row['cname'];
		
	
			$tRow = "<TR><TD>$fname $lname</TD><TD>$class</TD><TD>$section</TD></TR>\n";
	
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
