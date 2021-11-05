<?php

$host="cray.cc.gettysburg.edu"; // vars start w $
$dbase="f21_1"; //database name
$user="attale01";
$pass="attale01";

try {
	
	$db=new PDO("mysql:host=$host;dbname=$dbase",$user,$pass); // NO SPACES, ~all variables are global
}
catch(PDOException $e) {
 	// . : string concatenation
 	// -> insead of . for remote access
 	// ' ' + e.getMessage   -- JAVA
 	// ' ' . e-> getMessge  -- PHP
 	die("ERROR connecting to MySQL server" . $e->getMessage());
}

?>
