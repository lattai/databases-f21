<?php
	include_once('db_connect.php');
	session_start();
	if($_GET['op']="register") {
		$fname	= $_POST['fname'];
		$lname	= $_POST['lname'];
		$email  = $_POST['email'];
		$iid 	= $_POST['iid'];
		$str = "INSERT INTO instructor VALUE(\"$fname\", \"$lname\", \"$email\", $iid);";
		$res = $db->query($str);
		if($res == FALSE) {
		    print "<p>Error adding a new shift to the table </p>\n";
		    print_r($db->errorInfo());
	  	}
	  	$_SESSION['user'] = $_POST['iid'];
		header("Location: ProfessorDashboard.php");
	}
	else {
		$_SESSION['user'] = $_POST['login'];
		$uid = $_SESSION['user'];
		
		$str = "SELECT iid FROM instructor WHERE iid = $uid;";
		$res = $db->query($str);
		$nRows = $res->rowCount();
		
		if ($nRows == 1) {
			header("Location: ProfessorDashboard.php");
		}
		else{
			$str2 = "SELECT sid, cid FROM student WHERE sid = $uid;";
			$res2 = $db->query($str2);
			$row = $res2->fetch();
		
			if ($res2 != FALSE && $row['cid'] != NULL) {
				header("Location: studentDash.php");
			}
			else{
				header("Location: Login.php");
			}
		}
	}
	
?>
