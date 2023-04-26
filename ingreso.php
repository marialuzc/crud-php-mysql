<?php
include "conexion.php";
$codusuario = $_GET['codusuario'];
$clave = $_GET['pass'];

$consulta = "SELECT * FROM usuarios where codUsuario = '$codusuario' and clave = '$clave'";
// echo $consulta;
echo "<br>";
$resultado =  $conexion->query($consulta);
//var_dump($resultado);
$numreg =$resultado->num_rows;
//echo "<br>";
//echo $numreg;
if($numreg == 1){
    header("location:menuProductos.php");
}
else {
    header("location:error.php");
}

?>