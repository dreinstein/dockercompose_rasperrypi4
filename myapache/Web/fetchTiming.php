<?php
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
 $endTiming = "endTiming";
 $cSession = curl_init();
 curl_setopt($cSession,CURLOPT_URL,"http://192.168.0.22/?$weekAn1&$weekAn2&$weekOff1&$weekOff2&$weekendAn1&$weekendAn2&$weekendOff1&$weekendOff2&$endTiming");
 $result = curl_exec($cSession);
 curl_close($cSession);
 echo $result;
?>
