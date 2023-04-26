<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$db = "dbalmacen";

$conexion = new mysqli($servidor,$usuario, $clave, $db);

if($conexion){
    echo "conexion establecida";
}
else {
    echo "Error: No se puede conectar a la base de datos";
}

?>