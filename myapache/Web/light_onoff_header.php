<?php
$week_on1 = $_GET["weekOn1"];
$week_on2 = $_GET["weekOn2"];
$week_off1 = $_GET["weekOff1"];
$week_off2 = $_GET["weekOff2"];
$weekend_on1 = $_GET["weekEndOn1"];
$weekend_on2 = $_GET["weekEndOn2"];
$weekend_off1 = $_GET["weekEndOff1"];
$weekend_off2 = $_GET["weekEndOff2"];
$db=mysqli_connect("localhost","root","wutZ25Ba","aquarium");
if($db->connect_error)
{
        exit("Verbindungsfehler: ".mysqli_connect_error());
        echo "Fehler in der Verbindung";
}
       $insert = "insert into light_onoff(weekday_on1,weekday_on2,weekday_off1,weekday_off2,weekend_on1,weekend_on2,weekend_off1,weekend_off2) values($week_on1,$week_on2,$week_off1,$week_off2,$weekend_on1,$weekend_on2,$weekend_off1,$weekend_off2)";
	if($db->query($insert)==TRUE)
	{
		echo "new record created";
	}
	else
	{
		echo "error creating record";
	}
        $endTiming = "endTiming";
        $cSession = curl_init();
        curl_setopt($cSession,CURLOPT_URL,"http://192.168.0.22/?$week_on1&$week_on2&$week_off1&$week_off2&$weekend_on1&$weekend_on2&$weekend_off1&$weekend_off2&$endTiming");
        $result = curl_exec($cSession);
        curl_close($cSession);
        echo $result;
header("Location:index.php");
?>
	
