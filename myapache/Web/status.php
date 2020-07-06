<?php
$temper = $_GET["Temperature"];
$light_value = $_GET["Light"];
$pump = $_GET["Pump"];
$heating = $_GET["Heating"];
$db=mysqli_connect("localhost","root","wutZ25Ba","aquarium");
if($db->connect_error)
{
	exit("Verbindungsfehler: ".mysqli_connect_error());
	echo "Fehler in der Verbindung";
}
	$insert = "insert into aqua_val(dateandtime,temperature,light,pump,heating) values(CURRENT_TIMESTAMP(),$temper,$light_value,$pump,$heating)";
	if($db->query($insert)==TRUE)
	{
		echo "New record created";
	}
	else
	{
	echo "Error: $db->error(),$temper $light_value $pump $heating" ;
	}
?>
