<?php
include "conexion.php";

// consultar tabla productos

$consulta = "SELECT * FROM productos ORDER BY nombreProducto";
$resultado = $conexion->query($consulta);

$numregProductos = $resultado->num_rows;
if($numregProductos == 0)
 echo "No hay productos para mostrar";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Productos</title>
</head>
<body>
    <center>
    <h1>Listado de productos</h1>
    <br>
    <a href="CrearProducto.php">Nuevo Producto</a>
    <br>
    <table>
  <tr>
    <th>Codigo</th>
    <th>Nombre Producto</th>
    <th>Precio</th>
    <th>Eliminar</th>
    <th>Modificar</th>
  </tr>
  <?php
    while($fila = $resultado->fetch_assoc()) {
  ?>   
    <tr>
        <td> <?php echo $fila['codProducto']; ?></td>
        <td><?php echo $fila['nombreProducto']; ?></td>
        <td><?php echo $fila['precioProducto']; ?></td>
        <td><a href="EliminarProducto.php?cod=<?php echo $fila['codProducto']; ?>">Eliminar</a></td>
        <td><a href="ModificarProducto.php?cod=<?php echo $fila['codProducto']; ?>">Modificar</a></td>
    </tr>
  <?php
    }  
  ?>
</table>
    </center>

</body>
</html>