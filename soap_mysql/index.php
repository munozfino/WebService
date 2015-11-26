<?php

//require_once 'lib/nusoap.php';
require_once './../lib/nusoap.php';

$cliente = new nusoap_client("http://localhost:82/WebService/soap_mysql/soap_server.php");
//
$libros = $cliente -> call("muestraLibros");

echo '<h1>Mis Libros 55</h1>';
echo '<ul>';
foreach ($libros as $item)
    {
    echo '<li>';
    echo $item['id'].' - '.$item['autor'];
    echo '&nbsp;&nbsp; || &nbsp;&nbsp;';
    echo $item['titulo'];
    echo '<br></li>';
    }

echo '</ul>';

