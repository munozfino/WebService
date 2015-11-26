<?php
//Curl Leer un archivo externo
//curl_init revizar archivos y obtener la meta data

$curl = curl_init("http://localhost:82/WebService/webBasico/base.txt");

// Definir propiedades espeficas para Curl
// curl_setopt definir cual va hacer la salida de texto, nos ayuda a leer el archivo que esta invocando
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);

// En la variable $respuesta se almacena la informacion que esta llegando de $curl
// curl_exec ejecuta el archivo y lee la informacion y la almacena en la variable $respuesta
$respuesta = curl_exec($curl);

// $info almacena la meta data los encabezados, con esta funcion se puede saber si el archivo se cargo correctamente, si tiene informacion relacionada etc .... 

$info = curl_getinfo($curl);

// se crea una condiccion para saber si el archivo se cargo correctamente
//La variable $info se convierte en un arreglo asociativo
// http_code de vuelve la invocacion del archivo, ejemplo cuando cargamos un archivo q no se encuentra en el servicdor arroja un error 404 y cuando es correcto arroja 200 
if($info['http_code']==200)
    {
        // $datos toma la informacion del archivo curl y la vamos a procesar
        // separamos o rompemos la info con la funcion explode, q esta en la variable $respuesta y la convertimos en un arreglo en la variable $datos
        $datos = explode(",", $respuesta);
        
        echo '<h1>Frutas en la tiemda</h1>';
        
        foreach ($datos as $fruta)
        {
            echo '-> '.$fruta.'<br>';
        }
    }
    else 
        {
            // mostramos el error si es que lo hay con la funcion curl_error
            echo "Erro 404" . curl_error($curl);
        }

