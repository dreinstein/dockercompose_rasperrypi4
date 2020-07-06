<!DOCTYPE html>
<html>
<head>
</head>
<body>
<title> ARDUINO ETHERNET SHIELD</title>
	<h1 style="color:green;"> Aquarium Steuerung</h1>
<hr>


<?php
        $temperatur=0;
        
	$db=mysqli_connect("localhost","root","wutZ25Ba","aquarium");
	if($db->connect_error)
	{
	 	exit("Verbindungsfehler: ".mysqli_connect_error());
	}
	$val = "select * from light_onoff order by id desc limit 1";
	$v = $db->query($val);
        $row = $v->fetch_assoc();
        $weekAn1 = $row['weekday_on1'];
        $weekAn2 = $row['weekday_on2'];
        $weekOff1 = $row['weekday_off1'];
        $weekOff2 = $row['weekday_off2'];
        $weekendAn1 = $row['weekend_on1'];
        $weekendAn2 = $row['weekend_on2'];
        $weekendOff1 = $row['weekend_off1'];
        $weekendOff2 = $row['weekend_off2'];

	$db=mysqli_connect("localhost","root","wutZ25Ba","aquarium");
	if($db->connect_error)
	{
		exit("Verbindungsfehler: ".mysqli_connect_error());
        }
        $values = "select * from aqua_val order by value_id  desc limit 1";
        $v = $db->query($values); 
        if($v->num_rows > 0)
        {
        }
        else
        {
  	   echo "Error: $db->error()";
        } 
        $row=$v->fetch_assoc();

        $temperatur = $row['temperature'];
        $light = $row['light'];
        $pump =  $row['pump'];
        $heating = $row['heating'];		 
?> 
<br>
<p></p>
<p></p>
<p></p>
<p></p>

<p></p>
<p></p>
<form action="http://192.168.0.22" method="get">
<input type="submit" name="sync" value="syncronisiere Zeit">
</form>
<p></p>
<p></p>


<form action="index.php" method="get">
    Temperatur: <input type="text" name="Temperatur" value="<?echo $temperatur;?>" /><br>
    Licht:      <input type="text" name="Licht     " value="<?echo $light;?>" /><br>
    Pumpe:      <input type="text" name="Pumpe     " value="<?echo $pump;?>" /><br>
    Heizung:    <input type="text" name="Heizung   " value="<?echo $heating;?>" /><br> 
<input type="submit" name="Update" value="fetchDataValue">    
</form>
<p></p>
<p></p>

<form action = "\light_onoff.php" method="get">
Uhrzeit Woche An1:       <input type="time" name="weekOn1" value="<? echo $weekAn1;?>" /><br>
Uhrzeit Woche An2:       <input type="time" name="weekOn2" value="<? echo $weekAn2;?>"  /><br>
Uhrzeit Woche Aus1:      <input type="time" name="weekOff1" value="<? echo $weekOff1;?>" /><br>
Uhrzeit Woche Aus2:      <input type="time" name="weekOff2" value="<? echo $weekOff2;?>" /><br>
Uhrzeit Wochenende An1:  <input type="time" name="weekEndOn1" value="<? echo $weekendAn1;?>"/><br>
Uhrzeit Wochenende An2:  <input type="time" name="weekEndOn2" value="<? echo $weekendAn2;?>"/><br>
Uhrzeit Wochenende Aus1: <input type="time" name="weekEndOff1" value="<? echo $weekendOff1;?>"/><br>
Uhrzeit Wochenende Aus2: <input type="time" name="weekEndOff2" value="<? echo $weekendOff2;?>" /><br>
<input type = "submit">
</from> 
<p></p>

</hr>
</br>
</body>
<?php
	if(isset($_GET['fetchDataValue']))
	{
	   header:("Location: 192.168.0.2");	
	}
	
	function fetch()
        {
	    $db=mysqli_connect("localhost","root","wutZ25Ba","aquarium");
	    if($db->connect_error)
	    {
	     	exit("Verbindungsfehler: ".mysqli_connect_error());
	    }
	    $values = "select * from aqua_val order by value_id  desc limit 1";
	   $v = $db->query($values); 
	    if($v->num_rows > 0)
            {
	    }
	    else
	    {
		echo "Error: $db->error()";
	    } 
	    $row=$v->fetch_assoc();

	    $temperatur = $row['temperature'];
	    $light = $row['light'];
	    $pump =  $row['pump'];
            $heating = $row['heating'];		 
	}
	function fetchTimes()
	{
	    $db=mysqli_connect("localhost","root","wutZ25Ba","aquarium");
	    if($db->connect_error)
	    {
	     	exit("Verbindungsfehler: ".mysqli_connect_error());
	    }
	    $val = "select * from light_onoff";
	    $v = $db->query($val);
            $row = $v->fetch_assoc();
            $weekAn1 = $row['weekday_on1'];
            $weekAn2 = $row['weekday_on2'];
            $weekOff1 = $row['weekday_off1'];
            $weekOff2 = $row['weekday_off2'];
            $weekendAn1 = $row['weekend_on1'];
            $weekendAn2 = $row['weekend_on2'];
            $weekendOff1 = $row['weekend_off1'];
            $weekendOff2 = $row['weekend_off2'];
	}
?>
</html>

