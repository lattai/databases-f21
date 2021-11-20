<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Your Classes</TITLE>
<link rel="stylesheet" href="style.css">
<?php 
include('bootstrap.php');
include_once('db_connect.php');
session_start();
$uid = 23; //for testing purposes only
?>

<STYLE>

.flex-container {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}
</STYLE>
</HEAD>
<BODY>

<DIV class="header" id="divMain" style="border: 1px;">
	<Div><H3> Your Classes </H3></DIV>
	<DIV><H3> Setup  Dashboard  Logout</H3></DIV>

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
<DIV class="flex-container" id="divTables" style= "padding: 10px;">
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
</BODY>
</HTML>
