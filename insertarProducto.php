<?php
include "conexion.php";
$codproducto = $_POST['codproducto'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

$consulta = "INSERT INTO productos (codProducto, nombreProducto, precioProducto,codCategoria) VALUES ('$codproducto', '$nombre','$precio','$categoria');";
// echo $consulta;
echo "<br>";
$resultado =  $conexion->query($consulta);

if($resultado){
    echo "Producto insertado";
    header("location:menuProductos.php");
}
else {
    echo "Error";
}
?>