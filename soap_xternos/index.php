<?php

require_once './../lib/nusoap.php';

$cliente = new nusoap_client("http://wsf.cdyne.com/WeatherWS/Weather.asmx?wsdl", 'wsdl');

$resultado = $cliente->call("GetCityForecastByZIP", array("ZIP" => "12345"));

//print_r($resultado);

$ciudad = $resultado["GetCityForecastByZIPResult"]['City'];
$estado = $resultado["GetCityForecastByZIPResult"]['State'];

echo "<h1>Pronostico del tiempo ($ciudad, $estado)</h1>";



