<?php
include("conexion.php");
$codigo = $_REQUEST['cod'];
// consultar la tabla categoria
$res_categoria = $conexion->query("SELECT * from categorias ORDER BY nombreCategoria");
// necesitamos el numero de registros de esta consulta

$num_reg = $res_categoria->num_rows;
if ($num_reg == 0)
  // no se encontro grupos
  echo "No se encontro categorias, creelos";
  
// consulta a la tabla productos 
$res_prod = $conexion->query("SELECT * from productos where codProducto = '$codigo'");
// creamos un arreglo para colocar el registro del producto seleccionado
$fila_prod = $res_prod->fetch_assoc();
/* echo "<br>";
echo var_dump($fila_prod);
exit(); */
?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>Modificar Producto</title>
  </head>
  <body>
    <form action="prodmodificarguardar.php?cod=<?php echo $codigo; ?> " method="post">
      <center>
        <table width="200" border="1">
          <tr>
            <td width="58">Código</td>
            <td width="126"><label for="codigo"></label>
              <input name="codigo" type="text" id="codigo" value="<?php echo $fila_prod['codProducto']?>" readonly/></td>
          </tr>
          <tr>
            <td>Nombre</td>
            <td><label for="nombre"></label>
              <input name="nombre" type="text" id="nombre" value="<?php echo $fila_prod['nombreProducto']  ?>" /></td>
          </tr>
          <tr>
            <td>Precio</td>
            <td><input name="precio" type="text" id="precio" value="<?php echo $fila_prod['precioProducto']  ?>" />&nbsp;</td>
          </tr>
          <tr>
            <td>Cod Categoria</td>
            <td><label for="categoria"></label>
              <select name="categoria" id="categoria">
                <option value="" selected="selected">[Seleccione una categoria]
                  <?php
                  // en la variable fila guarda un registro de la tabla
                  // categoria y lo recorre hasta que no haya más.
                  while ($fila = $res_categoria->fetch_assoc()) {
                    if ($fila['CodCategoria'] == $fila_prod['codCategoria'])
                      echo "<option seleted='selected' value ='" . $fila['CodCategoria'] . "'>" . $fila['nombreCategoria'] . " </option>";                    
                    else
                      echo "<option value='" . $fila['CodCategoria'] . "'>" . $fila['nombreCategoria'];
                  }
                  mysqli_close($conexion);
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td height="33">&nbsp;</td>
            <td><input name="enviar" type="submit" id="enviar" value="Modificar" /></td>
          </tr>
        </table>
      </center>
    </form>
  </body>
  </html>

