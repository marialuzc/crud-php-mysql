<?php
include "conexion.php";
$codproducto = $_REQUEST['cod'];

$consulta = "DELETE FROM productos WHERE codProducto = '$codproducto'";
// echo $consulta;
echo "<br>";
$resultado =  $conexion->query($consulta);

if($resultado){
    echo "Producto eliminado";
    header("location:menuProductos.php");
}
else {
    echo "Error";
}
?>