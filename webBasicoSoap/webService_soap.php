<?php
//Llamamos la libreria nusoap
require_once 'lib/nusoap.php';

// creamos una funcion // cada vez que alguien invoque la funcion el va a mostrar la cadena texto de la variable $planetas
function muestraPlanestas()
{
    
    $planetas = "Según la definicón mencionada, el sistema solar consta de ";
    return $planetas;
}

/************ Creamos un metodo para mostrar una Imagen dinamica    *********************************/

//se crea otro metodo para mostrar una imagen dinamica incliyendo un parametro $categoria
function muestraImage($categoria)
{
    if($categoria=='espacio')
    {
        $imagen = 'imagen1.jpg';
    }else
    {
        $imagen = 'imagen2.jpg';
    }
    
    $resultado = '<img height="30" width="30" src="img/'.$imagen.'">';
    
    return $resultado;
}

/************ fin Creamos un metodo para mostrar una Imagen dinamica*********************************/



// creamos la condiccion si el servidor no tiene disponible la funcion $HTTP_RAW_POST_DATA utilizamos file_get_contents
if(!isset($HTTP_RAW_POST_DATA))
{
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}

// creamos el servicdor de este webService definimos la varible $server cuando alguien se conecte va a resibir la info en formato soap
    $server = new soap_server();
    
    /************* Documentar el webService **********/
    //Creamos una nuva instancia del servidor
    //Lallamos la instancia configureWSDL para documentar o describir el contenido del webService le agregamos 2 parametros nombre del webservive =Info Blog y creamos un name space urn:infoBlog
    
    $server ->configureWSDL("Info Blog WS", "urn:infoBlog");
     // Regitramos la funcion muestraPlanestas o  varible para que los usuarios interactuen con ella 
    //$server ->register("muestraPlanestas"); // se cambia para agregar parametos de documentacion del webservice
    $server ->register("muestraPlanestas",//llamamos el metodo a documentar
            array(),//parametro como no recibe parametros el arreglo esta vacio
            array('return' => 'xsd:string'),//respuesta nos devuelve una cadena de texto
            'urn:infoBlog', //name space el mismo que configuramos en la instancia
            'urn:infoBlog#muestraPlanestas', //Invocamos la accion del webservice
            'rpc',//estilo
            'encoded', //uso que tiene el web service
            'Muestra el contenido para el Blog');//descripcion 
   
    //$server ->register("muestraImage"); se cambia para documentar webservice
    $server->register("muestraImage",
            array('categoria'=>'xsd:string'), //recibe un parametro se crea con el mismo nombre q tiene en el metodo
            array('retur'=>'xsd:string'),//respuesta
            'urn:infoBlog', //name space
            'urn:infoBlog#muestraImage', //accion
            'rpc',//estilo
            'encode', //Uso
            'Muestra una imagen dinamica' //Descripcion
            );
    
    /************* Fin Documentar el webService **********/
    

    
    
 //definmos como vamos a interactuar para resibir los datos     
//Resibimos los datos / nos permite leer los datos q nos estan llegando
    $server ->service($HTTP_RAW_POST_DATA);
    