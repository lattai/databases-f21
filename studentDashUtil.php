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

    $str = "SELECT date, time FROM shift WHERE taid=$user LIMIT 15;";
    $res    = $db->query($str);
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
    $str = "SELECT sid, topic, question, date FROM hasQuestion WHERE taid=$user LIMIT 15;";

    $res    = $db->query($str);
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


			$strNames   = "SELECT fname, lname FROM student WHERE id=$sid;";
            $resName    = $db->query($strNames);
			$rowName    = $resName->fetch();
			$name       = $rowName['fname']. " ". $rowName['lname'];


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

?>