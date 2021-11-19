<?php
//copy db_connect and bootstrap into the curr folder
include_once('db_connect.php');
include_once('bootstrap.php');

function welcome($uid, $db) {
    $str = "SELECT fname FROM student WHERE sid=$uid";
    $res    = $db->query($str);
    $row    = $res->fetch();
    $name   = $row['fname'];
    return ("Hello $name");
}

function getPastShifts($uid, $db){

    print ("<div class=\"table\">");
	print ("<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" >");

    $str = "SELECT date, time FROM shift WHERE taid=$uid ORDER BY date LIMIT 15 ;";
    $res    = $db->query($str);

	if ($res == false) {
		print $str;
		print_r($db->errorInfo());
	}
    if ($res != FALSE) {
		$nRows = $res->rowCount(); 
		$nCols = $res->columnCount();
	}
    if ($nRows > 0) {
		$row = $res->fetch(0); //first row 
		while ($row != FALSE) {
			$date = $row['date'];
			$time = $row['time'];
			$tRow = "<tr>
				<td>$date</td>
				<td>$time</td>
				</tr>\n";
			print $tRow;
			$row = $res->fetch();
		}
	}
	print ("</table>");
    print ("</div>");
} 


function getAskedQuestions($uid, $db){

    print ("<div class=\"table\">");
	print ("<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" >");

    $str = "SELECT sid, topic, question, date FROM hasQuestion WHERE taid=$uid ORDER BY date LIMIT 15;";

    $res    = $db->query($str);

	if ($res == false) {
		print $str;
		print_r($db->errorInfo());
	}
    if ($res != FALSE) {
		$nRows = $res->rowCount(); 
		$nCols = $res->columnCount();
	}
    if ($nRows > 0) {
		$row = $res->fetch(0); //first row 
		while ($row != FALSE) {
			$sid        = $row['sid'];
			$date       = $row['date'];
			$topic      = $row['topic'];
			$question   = $row['question'];


			$strNames   = "SELECT fname, lname FROM student WHERE sid=$sid;";
            $resName    = $db->query($strNames);
			$rowName    = $resName->fetch();
			$name       = $rowName['fname']." ".$rowName['lname'];
			if ($resName == false) {
				print $strNames;
				print_r($db->errorInfo());
			}


				// <td>$name</td>
			$tRow = "<tr>
				<td>$name</td>
				<td>$date</td>
				<td>$topic</td>
				<td>$question</td>
				</tr>\n";
			print $tRow;
			$row = $res->fetch();
		}
	}
	print ("</table>");
    print ("</div>");
}

function getSignInForm($uid, $db) {
	print  "<form name=\"fmSignIn\" method=\"POST\" action=\"dashboard.php?op=submitSignIn&user=$uid&date=$date&start=$start&end=$end\">
			<h2>PLA Hours Sign In</h2>
			<label for=\"start\">Start:</label>
			<input type=\"text\" id=\"start\" name=\"start\"> <br>
			<label for=\"end\">End:</label>
			<input type=\"text\" id=\"end\" name=\"end\"> <br>
			<label for=\"date\">Date:</label>
			<input type=\"text\" id=\"date\" name=\"date\"> <br>
			<input type=\"submit\" value=\"Submit\">
			</form>";
}

function submitSignIn($uid, $db) {
	$start	= $_POST['start'];
	$end 	= $_POST['end'];
	$date 	= $_POST['date'];

	$str = "INSERT INTO shift(taid, date, start, end)"
	."VALUE($uid, $location, $start, $end;";

	$res = $db->query($str);
	if($res == FALSE) {
		print "<p>Error adding a new message to the table </p>\n";
		print_r($db->errorInfo());
	}
	print "Shift submitted";
} 

?>
