<?php

$host = "cray.cc.gettysburg.edu";
$dbase = "f21_1";
$user = "farrro01";
$pass = "farrro01";


try {
	$db = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);
}

catch(PDOException $e){

	// . : string concatenation (Similar to java's + operator)
	// -> instead of . for remote access
	die("ERROR connectoin to mysql server" . $e->getMessage()); 
}

?>

