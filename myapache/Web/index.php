<!DOCTYPE html>
<html lang="en">

<?php
if(isset($_GET['fetchDataValue']))
{
   header("Location: /index.php ");
}
?>


<?php
        $temperatur=0;
	$db=mysqli_connect("sql_web","root","wutZ25Ba","aquarium");
	if(!$db)
	{
		echo "Fehler";
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
	$db=mysqli_connect("sql_web","root","wutZ25Ba","aquarium");
	if(!$db)
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

<head>
    <link href="stylesheet.css" type="text/css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <title>Aquarium</title>
</head>

<body onload="myFunc()">
    <div class="head">
        <h1>Aquarium</h1>
    </div>
    <div class="main">   
      <div class="temp">
            <h2>Messdaten: </h2>
            <form action="index.php" method="get">
                <span>
		    <p>Aktueller Stand</p>
		    <label>Temperatur: </label>     <input type="text" id="Temp" name="Temperatur" value="<?php echo $temperatur;?>" /> <br/>
                    <label>Licht:       </label>    <input type="text" id="Licht" name="Licht"     value="<?php echo $light;?>" />    <br/>
                    <label>Pumpe:       </label>    <input type="text" id="Pumpe" name="Pumpe     "value="<?php echo $pump;?>" />    <br/>
                    <label>Heizung:     </label>    <input type="text" id="Heizung" name="Heizung "value="<?php echo $heating;?>" />    <br/>
                </span> 
                <br>
                <input type="submit" name="fetchDataValue" value="Update"> 
            </form>
        </div>

        <div class="clock">
            <h2>Uhrzeiten: </h2>
            <form action = "\light_onoff.php" method="get">
                <span>
                   <p> Unter der Woche <br/></p>
                    <label>An1:       </label>    <input type="time" name="weekOn1" id="weekOn1"    value="<?php echo $weekAn1;?>" /></br>
                    <label>Aus1:      </label>    <input type="time" name="weekOff1" id="weekOff1"  value="<?php echo $weekOff1;?>" /></br>
                    <br>
                    <label>An2:       </label>    <input type="time" name="weekOn2" id="weekOn2"    value="<?php echo $weekAn2;?>"  /></br>
                    <label>Aus2:      </label>    <input type="time" name="weekOff2" id="weekOff2"  value="<?php   echo $weekOff2;?>" /></br>
                </span>
                <span>
                    <p>Wochenende</p>
                    <label>An1:          </label>    <input type="time" name="weekEndOn1" id="weekEndOn1" value="<?php echo $weekendAn1;?>" /><br>
                    <label>Aus1:         </label>    <input type="time" name="weekEndOff1" id="weekEndOff1" value="<?php echo $weekendOff1;?>" /><br>
                    <br>
                    <label>An2:          </label>    <input type="time" name="weekEndOn2" id="weekEndOn2" value="<?php echo $weekendAn2;?>"/><br>
                    <label>Aus2:         </label>    <input type="time" name="weekEndOff2" id="weekEndOff2"value="<?php echo $weekendOff2;?>" /><br>
                </span>
                </br>
                <input type = "submit">
            </from>
            
            <br/>

            <form action="http://192.168.0.22" method="get">
                <input type="submit" name="sync" value="syncronisiere Zeit">
            </from>
        </div>

    </div>

    <script>
        var anfangs_Wert={};

        function actualisieren(){
            var el=[];
            el[0]= document.getElementById("weekOn1");
            el[1]= document.getElementById("weekOff1");
            el[2]= document.getElementById("weekOn2");
            el[3]= document.getElementById("weekOff2");
            el[4]= document.getElementById("weekEndOn1");
            el[5]= document.getElementById("weekEndOff1");
            el[6]= document.getElementById("weekEndOn2");
            el[7]= document.getElementById("weekEndOff2");

            el.forEach(initial);
            
            function initial(x){
                anfangs_Wert[x.id]=Number.parseInt(x.value);
                x.addEventListener("change", function event(){
                    if(anfangs_Wert[x.id]!=Number.parseInt(x.value)){
                        x.style.color="red";
                    }else{
                        x.style.color="black";
                    }
                });
            }
        }


        function myFunc(){
            el= document.getElementById("Temp");
            if( (el.value<29) && (el.value>25)) {
                el.style.background="green";
            }else{
                el.style.background="red";
            }

            var els=[];
            els[0]= document.getElementById("Licht");
            els[1]= document.getElementById("Pumpe");
            els[2]= document.getElementById("Heizung");
            els.forEach(proof);
            
            function proof(x){
                if(x.value=="on"){
                    x.style.background="green";
                }else{
                    x.style.background="red";
                }
            }
        
            actualisieren();
        }
    </script>
</body>
</html>
