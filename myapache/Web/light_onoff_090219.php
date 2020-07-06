<?php
$getweek1=$_GET["weekOn1"];
$getweek2=$_GET["weekOn2"];
$strgetweek1 =  date(getweek1);
$week_2 = 'alles klar';
$week_off1 = '02:00:02';
$week_off2 = "03:00:03";
$weekend_on1 = "04:00:02";
$weekend_on2 = "05:00:05";
$weekend_off1 = '06:00:06';
$weekend_off2 = "07:00:07";
$db=mysqli_connect("localhost","root","wutZ25Ba","aquarium");
if($db->connect_error)
{
        exit("Verbindungsfehler: ".mysqli_connect_error());
        echo "Fehler in der Verbindung";
}
       $insert = "insert into strLightOnOff(weekday_on1,weekday_on2) values('$week_2','$week_off1')";
	if($db->query($insert)==TRUE)
	{
		echo "new record created";
                echo "\n"; 
                echo $getweek1;
                echo $getweek1;
	}
	else
	{
		echo "error creating record";
                echo "\n"; 
                echo $strgetweek1;
                echo "\n";
                echo $getweek2;
                echo "\n";
                echo $week_off1;
                echo "\n";
                echo $week_off2;
                echo "\n";
                echo $weekend_on1;
                echo "\n";
                echo $weekend_on2;
                echo "\n";
                echo $weekend_off1;
                echo "\n";
                echo $weekend_off2;
	}
?>
