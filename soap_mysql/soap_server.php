<?php

//require_once 'lib/nusoap.php';
require_once './../lib/nusoap.php';

$username = "root";
$password = "";
$hostname = "127.0.0.1";

$dbhandle = mysql_connect($hostname,$username,$password)
        or die ("No es posible conectarse a Mysql");

$seleccion = mysql_select_db("webservice") 
        or die("Base de datos no disponible");

function muestraLibros()
{
   $resultado = mysql_query("select * from libros");
   while ($row = mysql_fetch_array($resultado))
   {
       $all[] = $row;
   }
   
   return $all;
   //return 'pruba';
}

//Agregado por compatibilidad

if(!isset($HTTP_RAW_POST_DATA))
{
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}


$server = new soap_server();
//$server ->configureWSDL("Conectar Mysql con Soap", "urn:infoBlog");
$server ->register("muestraLibros");
//$server ->service($HTTP_RAW_POST_DATA);
$server ->service($HTTP_RAW_POST_DATA);

//exit;

