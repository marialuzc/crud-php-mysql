<?php
include("conexion.php");
// $conexion->query("UPDATE producto set nombre_producto = '" . $_POST["nombre"]. "' , precio = ". $_POST["existencias"]. ", 
//cod_grupo = " . $_POST["grupo"]." WHERE cod_producto = ". $_REQUEST['cod1'].";");
$codigo = $_REQUEST['cod'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

$consulta = "UPDATE productos SET nombreProducto = '$nombre', precioProducto = '$precio', codCategoria = '$categoria' WHERE codProducto = '$codigo'";
echo $consulta;

$conexion->query($consulta);

if (mysqli_connect_errno() != 0)
{           	
	echo "Error al modificar el producto" . mysqli_connect_errno() . " - " . mysqli_connect_error();
	 mysqli_close($conexion);
 } else  {
	 mysqli_close($conexion);
	 header("location:menuProductos.php");
	 }
?>