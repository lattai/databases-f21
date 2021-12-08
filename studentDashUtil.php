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

    $str = "SELECT date, start, end FROM shift WHERE taid=$uid ORDER BY date DESC LIMIT 15 ;";
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
			$start = $row['start'];
			$end = $row['end'];
			$tRow = "<tr>
				<td>$date</td>
				<td>$start-$end</td>
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

    $str = "SELECT sid, topic, question, date FROM hasQuestion WHERE taid=$uid ORDER BY date DESC LIMIT 15;";

    $res    = $db->query($str);

	if ($res == false) {
		print $str;
		print_r($db->errorInfo());
	}
    if ($res != FALSE) {
		$nRows = $res->rowCount(); 
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
	print  "<form name=\"fmSignIn\" method=\"POST\" action=\"studentDash.php?
			user=$uid&start=$start&end=$end&date=$date\">
			<h2>PLA Hours Sign In</h2>
			<label for=\"start\">Start:</label>
			<input type=\"text\" id=\"start\" name=\"start\"> <br>
			<label for=\"end\">End:</label>
			<input type=\"text\" id=\"end\" name=\"end\"> <br>
			<label for=\"date\">Date:</label>
			<input type=\"text\" id=\"date\" name=\"date\"> <br>
			<input type=\"submit\" value=\"Submit\"  onClick=\"location.reload();\">
			</form>";
}

function submitSignIn($uid, $db) {
	$start	= $_POST['start'];
	$end 	= $_POST['end'];
	$date 	= $_POST['date'];

	// check for duplicates before inserting.
	if ($start != null && $end != null && $date != null) {
		$str = "SELECT * FROM shift where taid=$uid AND date = \"$date\" AND start=\"$start\" AND end=\"$end\";";
		$res = $db->query($str);
		if ($res != FALSE) {
			$nRows = $res->rowCount(); 

			if ($nRows == 0) {
				$str = "INSERT INTO shift(taid, date, start, end) VALUE($uid, \"$date\", \"$start\", \"$end\");";
				$res = $db->query($str);
				if($res == FALSE) {
					print "<p>Error adding a new shift to the table </p>\n";
					print_r($db->errorInfo());
				}
			}
		}
		else {
			print "<p>Error adding a new shift to the table </p>\n";
				print_r($db->errorInfo());
		}
	}
} 



function getQuestionForm($uid, $db) {

	// Get course id PLA helps
	$str = "SELECT cid FROM student WHERE sid=$uid";
    $res    = $db->query($str);
    $row    = $res->fetch();
    $plaCourseID   = $row['cid'];
	
	$a =   "<form name=\"fmQuestions\" method=\"POST\" action=\"studentDash.php?
	user=$uid&start=$start&end=$end&date=$date\">
			<h2>Help Sign In</h2>

			<label for=\"students\">Student:</label>
			<select name=\"students\" id=\"students\">";
			//students
			$str = "SELECT fname, lname, student.sid FROM student JOIN enrollsIn ON student.sid=enrollsIn.sid WHERE enrollsIn.cid = $plaCourseID; ";
			$res = $db->query($str);
			while ($row = $res->fetch()) {
				$fname	= $row['fname'];
				$lname	= $row['lname'];
				$sid	= $row['sid'];
				$tRow	= "<option value=\"$sid\" name=\"$sid\">$fname $lname </option>\n";
				$a = $a . $tRow;
			}
			$a = $a . "</select>\n
			</select>
			<br>
			<label for=\"topic\">Topic:</label>
			<input type=\"text\" id=\"topic\" name=\"topic\"> <br>
			<label for=\"question\">Question:</label>
			<input type=\"text\" id=\"question\" name=\"question\"> <br>
			<input type=\"submit\" value=\"Submit\" onClick=\"location.reload();\">
		</form>";
		print $a;
}

function submitQuestion($uid, $db) {
	$sid	= $_POST['students'];
	$topic 	= $_POST['topic'];
	$question 	= $_POST['question'];
	$date = date("m/d/Y");
	// check for duplicates before inserting.
	if ($sid != null && $topic != null && $question != null) {
		$str = "SELECT * FROM hasQuestion WHERE taid=$uid AND sid=$sid AND topic = \"$topic\" AND question=\"$question\";";
		$res = $db->query($str);
		if ($res != FALSE) {
			$nRows = $res->rowCount(); 

			if ($nRows == 0) {
				$str = "INSERT INTO hasQuestion(taid, sid, topic, question, date) VALUE($uid, $sid, \"$topic\", \"$question\", \"$date\");";
				$res = $db->query($str);
				if($res == FALSE) {
					print "<p>Error adding a new shift to the table1 </p>\n";
					print_r($db->errorInfo());
				}
			}
		}
		else {
			print "<p>Error adding a new shift to the table2 </p>\n";
				print_r($db->errorInfo());
		}
	}
} 
?>
