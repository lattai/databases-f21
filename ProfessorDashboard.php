<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Professor Dashboard</TITLE>
<link rel="stylesheet" href="style.css">
<?php 
include('bootstrap.php');
include_once('db_connect.php');
session_start();
$uid = 05; //for testing purposes only
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
	<Div><H3> Professor Dashboard </H3></DIV>
	<DIV><H3> Setup  Your Classes  Logout</H3></DIV>

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
<DIV class="flex-container" id="divTables" style= "padding: 10px;">
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

			$tRow = "<TR><TD>$lname, $fname</TD><TD>$course</TD><TD>$email</TD></TR>\n";

			print $tRow;

			$row = $res->fetch();
	}
}
?>
</TABLE>

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

			$row = $res->fetch();
		}
}
?>
</TABLE>
</DIV>
</BODY>
</HTML>

