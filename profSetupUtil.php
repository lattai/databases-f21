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


function addPlaForm($uid, $db) {
		$a  = "<h2>Add PLA</h2>
		<form name=\"addPLAForm\" method=\"POST\" action=\"profSetup.php?op=addPLAForm&user=$uid\">
		<label for=\"fname\">First Name:</label>
		<input type=\"text\" id=\"fname\" name=\"fname\"> <br>
		<label for=\"lname\">Last Name:</label>
		<input type=\"text\" id=\"lname\" name=\"lname\"> <br>
		<label for=\"email\">Email:</label>
		<input type=\"text\" id=\"email\" name=\"email\"> <br>
		<label for=\"sid\">Student ID:</label>
		<input type=\"text\" id=\"sid\" name=\"sid\"> <br>
		<select id=\"cid\" name=\"cid\">";
		//Course
		$str = "SELECT cname, cid, section FROM class;";
		$res = $db->query($str);
		while ($row = $res->fetch()) {
			$cname   = $row['cname'];
			$cid   = $row['cid'];
			$section   = $row['section'];
			$tRow = "<option value='$cid' name='$cid'>$cname $section</option>\n";
			$a = $a . $tRow;
		}
		$a = $a . "</select><br>";

		$a = $a. "<input type=\"submit\" value=\"Submit\"  onClick=\"location.reload();\">
					</form>";
		print $a;
}

function submitPlaForm($uid, $db) {
	$fname	= $_POST['fname'];
	$lname	= $_POST['lname'];
	$email 	= $_POST['email'];
	$sid 	= $_POST['sid'];
	$cid	= $_POST['cid'];
	$section 	= $_POST['section'];
	print("entered func\n");
	// check for duplicates before inserting.
	if ($fname != null && $lname != null && $email != null && $sid != null && $cid != null) {
		print("nothings null\n");
		$str = "SELECT * FROM student WHERE sid = $sid;";
		$res = $db->query($str);
		if ($res != FALSE) {
			print("result true\n");
			$nRows = $res->rowCount(); 

			if ($nRows == 0) {
				print("nRows = 0\n");
				$str = "INSERT INTO student VALUE(\"$fname\", \"$lname\", \"$email\", $sid, $cid);";
				$res = $db->query($str);
				if($res == FALSE) {
					print "<p>Error adding a new shift to the table </p>\n";
					print_r($db->errorInfo());
				}
			}
			else if ($nRows == 1) {
				print("nrows = 1\n");
				$str = "UPDATE student SET cid=$cid WHERE sid=$sid;";
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


function addClassForm($uid, $db) {
		$a  = "<h2>PLA Hours Sign In</h2>
		<form name=\"shiftForm\" method=\"POST\" action=\"profSetup.php?op=sendShiftForm&user=$uid\">
		<label for=\"start\">Start:</label>
		<input type=\"text\" id=\"start\" name=\"start\"> <br>
		<label for=\"end\">End:</label>
		<input type=\"text\" id=\"end\" name=\"end\"> <br>
		<label for=\"date\">Date:</label>
		<input type=\"text\" id=\"date\" name=\"date\"> <br>
		<input type=\"submit\" value=\"Submit\">";
		print $a;
}

function sendClassForm($uid, $db, $shiftData) {
	$start = $_POST['start'];
	$end  = $_POST['end'];
	$date  = $_POST['date'];

	$str = "INSERT INTO message(sender, receiver, subject, message, sent)"
	."VALUE($senderID, $receiver, '$subject', '$message', '$sent');";
	$res = $db->query($str);

	if($res ==FALSE) {
		print "<p>Error adding a new message to the table </p>\n";
		print_r($db->errorInfo());
	  }
	$str4    = "SELECT name FROM titan1 WHERE id=$receiver;";
	$res4    = $db->query($str4);
	$row4    = $res4->fetch();
	$receiver   = $row4['name'];
	print"Message sent to $receiver!";
}


function addRosterForm($uid, $db) {
		$a  = "<h2>PLA Hours Sign In</h2>
		<form name=\"shiftForm\" method=\"POST\" action=\"studentDash.php?op=sendShiftForm&user=$uid\">
		<label for=\"start\">Start:</label>
		<input type=\"text\" id=\"start\" name=\"start\"> <br>
		<label for=\"end\">End:</label>
		<input type=\"text\" id=\"end\" name=\"end\"> <br>
		<label for=\"date\">Date:</label>
		<input type=\"text\" id=\"date\" name=\"date\"> <br>
		<input type=\"submit\" value=\"Submit\">";
		print $a;
}

function sendRosterForm($uid, $db, $shiftData) {
	$start = $_POST['start'];
	$end  = $_POST['end'];
	$date  = $_POST['date'];

	$str = "INSERT INTO message(sender, receiver, subject, message, sent)"
	."VALUE($senderID, $receiver, '$subject', '$message', '$sent');";
	$res = $db->query($str);

	if($res ==FALSE) {
		print "<p>Error adding a new message to the table </p>\n";
		print_r($db->errorInfo());
	  }
	$str4    = "SELECT name FROM titan1 WHERE id=$receiver;";
	$res4    = $db->query($str4);
	$row4    = $res4->fetch();
	$receiver   = $row4['name'];
	print"Message sent to $receiver!";
}

?>
