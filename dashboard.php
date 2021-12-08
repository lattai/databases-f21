<?php
	include_once('db_connect.php');
	session_start();
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
	}
	
?>
