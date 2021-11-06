<?php
$city_name = 'Texas';
$api_key ='8d09be7ae7813eda927a3eb49cd5eac3';
$api_url ='http://api.openweathermap.org/data/2.5/weather?q=' .$city_name. '&appid=' .$api_key;
$weather_data = json_decode( file_get_contents($api_url), true);
$temperature= $weather_data['main']['temp'];
$temperature_in_celcius = round($temperature - 273.15);
$temperature_current_weather = $weather_data['weather'][0]['main'];
$temperature_current_weather_description = $weather_data['weather'][0]['description'];
$temperature_current_weather_icon = $weather_data['weather'][0]['icon'];
# echo "Texas Temperature " .$temperature_in_celcius ." Celcius.";
#echo "<img src='http://openweathermap.org/img/wn/" .$temperature_current_weather_icon. "@2x.png'/>";

?>