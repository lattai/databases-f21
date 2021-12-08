<?php
//copy db_connect and bootstrap into the curr folder
include_once('db_connect.php');
include_once('bootstrap.php');

function welcome($uid, $db) {
    $str = "SELECT fname FROM instructor WHERE iid=$uid";
    $res    = $db->query($str);
    $row    = $res->fetch();
    $name   = $row['fname'];
    return ("Hello $name");
}


function addPlaForm($uid, $db) {
		$a  = "
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
	// check for duplicates before inserting.
	if ($fname != null && $lname != null && $email != null && $sid != null && $cid != null) {
		$str = "SELECT * FROM student WHERE sid = $sid;";
		$res = $db->query($str);
		if ($res != FALSE) {
			$nRows = $res->rowCount(); 

			if ($nRows == 0) {
				$str = "INSERT INTO student VALUE(\"$fname\", \"$lname\", \"$email\", $sid, $cid);";
				$res = $db->query($str);
				if($res == FALSE) {
					print "<p>Error adding a new shift to the table </p>\n";
					print_r($db->errorInfo());
				}
			}
			else if ($nRows == 1) {
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
		$a  = "
		<form name=\"shiftForm\" method=\"POST\" action=\"profSetup.php?op=sendClassForm&user=$uid\">
		<label for=\"cname\">Name:</label>
		<input type=\"text\" id=\"cname\" name=\"cname\"> <br>
		<label for=\"section\">Section:</label>
		<input type=\"text\" id=\"section\" name=\"section\"> <br>
		<label for=\"cid\">Course ID:</label>
		<input type=\"text\" id=\"cid\" name=\"cid\"> <br>
		<label for=\"iid\">Instructor:</label>
		<select id=\"iid\" name=\"iid\">";
		//Instructor
		$str = "SELECT fname, lname, iid FROM instructor;";
		$res = $db->query($str);
		while ($row = $res->fetch()) {
			$fname	= $row['fname'];
			$lname	= $row['lname'];
			$iid	= $row['iid'];
			$tRow	= "<option value=$iid name='$iid'>$fname $lname</option>\n";
			$a = $a . $tRow;
		}
		$a = $a . "</select><br>
			<input type=\"submit\" value=\"Submit\"  onClick=\"location.reload();\">
			</form>";
		print $a;
}

function submitClassForm($uid, $db) {
	$cname	= $_POST['cname'];
	$section	= $_POST['section'];
	$cid 	= $_POST['cid'];
	$iid 	= $_POST['iid'];
	// check for duplicates before inserting.
	if ($cname != null && $section != null && $cid != null && $iid != null) {
		$str = "SELECT * FROM class WHERE cid = $cid;";
		$res = $db->query($str);
		if ($res != FALSE) {
			$nRows = $res->rowCount(); 

			if ($nRows == 0) {
				$str = "INSERT INTO class (cname, section, cid, iid) VALUE(\"$cname\", \"$section\", \"$cid\", $iid);";
				$res = $db->query($str);
				if($res == FALSE) {
					print "<p>Error adding a new shift to the table </p>\n $str \n";
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


function addRosterForm($uid, $db) {
		$a  = "
		<form name=\"shiftForm\" method=\"POST\" action=\"profSetup.php?op=sendRosterForm&user=$uid\">
		<label for=\"cid\">Course:</label>
		<select id=\"cid\" name=\"cid\">";
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
		$a = $a . 
		"<label for=\"students\">Students:</label>
		<textarea id=\"students\" name=\"students\"rows=\"4\" cols=\"50\">student name studentID,</textarea> <br>
		<input type=\"submit\" value=\"Submit\" onClick=\"location.reload();\">";
		print $a;
}

function submitRosterForm($uid, $db) {
	$cid	= $_POST['cid'];
	$studentsString	= $_POST['students'];
	// check for duplicates before inserting.
	if ($cid != null && $studentsString != null) {
		$studentsArray = explode(",", $studentsString);
		foreach ($studentsArray as $student) {
			$student = trim($student);
			$studentValues = explode(" ", $student);
			$fname = trim($studentValues[0]);
			$lname = trim($studentValues[1]);
			$sid = trim($studentValues[2]);

			$str = "INSERT INTO student (fname, lname, sid) VALUE(\"$fname\", \"$lname\", $sid);";
			$res = $db->query($str);
			if($res == FALSE) {
				print "<p>Error adding a new shift to the table </p>\n $str \n";
				print_r($db->errorInfo());
			}
			$str = "INSERT INTO enrollsIn (cid, sid) VALUE($cid, $sid);";
			$res = $db->query($str);
			if($res == FALSE) {
				print "<p>Error adding a new shift to the table </p>\n $str \n";
				print_r($db->errorInfo());
			}
		}
	}
}
?>
