<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

</head>
<body>
<?php
	
	//require_once("weather_geruest.php");
	
	//printHTMLHead();


	/*openweathermap
	Email adresse:weather.root@gmail.com
	Username: weather_fox
	PW:wheaterapi
	Key: 71a62937d670fedafa2d84d43b650e40
	*/
	
	define("lf","<br />");
		
			
	
	function PrintValues($city){
		$city= json_decode($city);
		$n= $city->name;
		$wea=$city->weather[0]->main;
		$tmp=$city->main->temp;
		$wind=$city->wind->speed;
		
		print("In der Stadt: ".$n." haben wir das Wetter ".$wea." eine Temperatur von ".$tmp." und eine Windgeschwindigkeit von ".$wind);
	}
	
?>

<form method="post">

	<label>Wählen Sie eine Stadt aus zu der Sie mehr über das Wetter wissen wollen:</label>
	<br>

	<select name="stadt" id="staedte">
		<option value="Vienna">Vienna</option>		
		<option value="SanFrancisco">San Francisco</option>
		<option value="Sydney">Sydney</option>
		<option value="Paris">Paris</option>
		<option value="Washington">Washington</option>	
	</select>
	<button type="submit" name="auswählen">Auswählen</button>
</form>
<?php
if(isset($_POST['submit'])){
	switch($_POST['stadt']){
		case "Vienna":
			$city = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=2761369&appid=71a62937d670fedafa2d84d43b650e40");
			break;
		case "SanFrancisco":
			$city= file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=1689969&appid=71a62937d670fedafa2d84d43b650e40");
			break;
		case "Sydney":
			$city= file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=2147714&appid=71a62937d670fedafa2d84d43b650e40");
			break;
		case "Paris":
			$city= file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=2988507&appid=71a62937d670fedafa2d84d43b650e40");
			break;
		case "Washington":
			$city= file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=5815135&appid=71a62937d670fedafa2d84d43b650e40");
			break;
	}
}
PrintValues($city);
?>
</body>
</html>