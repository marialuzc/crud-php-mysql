<?php
include "conexion.php";

// consultar tabla categoria

$consulta = "SELECT * FROM categorias ORDER BY nombreCategoria";
$resultado = $conexion->query($consulta);

$numregCategoria = $resultado->num_rows;
if($numregCategoria == 0)
 echo "No hay categorias";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
    <center>
    <h2>Formulario de ingreso de productos</h2>    
    <form action="insertarProducto.php" method="post">
        <input type="number" name="codproducto" id="" placeholder = "Digite codigo producto">
        <br>
        <input type="text" name="nombre" id="" placeholder = "Digite nombre producto">
        <br>
        <input type="number" name="precio" id="" placeholder = "Digite precio producto">
        <br>
        <select name="categoria" id="">
            <option value="" selected="selected">[Seleccione una categoria]
            <?php
            while($fila = $resultado->fetch_array()){
                echo "<option value='" .$fila["codCategoria"]. "'>". $fila["nombreCategoria"];
            }
            mysqli_close($conexion);
            ?>
            
        </select>
        <br>
        <input type="submit" value="Ingresar">
    </form>
    </center>
</body>
</html>