<?php
//Llamamos la libreria nusoap
require_once 'lib/nusoap.php';
 
// creamos el cliente o elemento que se conecte a mi webService    
//crea cliente q puede leer el formato soap / ingresamos la direccion de nuestro webService
$cliente = new nusoap_client("http://localhost:82/WebService/webBasicoSoap/webService_soap.php");

//llamamos la funcion que se encuentra dentro del webService muestraPlanestas
//nos conectamos al cliente 
//call nos permite llamar funciones
// $planetas nos devuelve el valor que contiene la funcion
$planetas = $cliente->call("muestraPlanestas");

//creamos el servidor para llamar el nuevo metodo como tiene un parametro creamos un array() asociativo
$imagen = $cliente->call("muestraImage",array("categoria"=>"espacio"));
// imprimimos lo que tiene la variable $lanetas
echo '<h2>Los Planetas</h2>';
echo '<p>'.$planetas.'</p>';
//llamamos lo que contiene la variable $imagen
echo $imagen;

  

