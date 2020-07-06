<!DOCTYPE html>
<html lang="en">

<?php
echo "connection";
$db=new mysqli("localhost:3306","root","wutZ25Ba","aqua_val");
echo $db;
if($db = connect_errno) {
	die("Verbindungsfehler: ".$mysqli->connect_error);
	echo "verbunden";
}

?>
