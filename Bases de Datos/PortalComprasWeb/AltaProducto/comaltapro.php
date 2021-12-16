<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body  style="background-color:#85C9DC;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <table border="1" rules="none">
        <h1 style="color:black;">Alta Producto</h1>
          <tr>
            <td>Categorias: </td>
            <td>
              <select name="nombrecategoria">
                <?php
                //Fichero de funciones
                include "./funciones.php";
                //Parametros
                $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

                //Creamos la conexion
                $conexion=crearconexionpdo($servername, $username, $password, $dbname);

                //Revisar Parametros
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                   $nombrecategoria=$_POST['nombrecategoria'];
                   revisarparamentros($nombrecategoria);
                }
                //Lógica de Negocio
                $arraycategorias=mostrarcategorias($conexion);

                foreach ($arraycategorias as $key) {
                  ?> <option> <?php echo $key ?> </option>
                  <?php
                }
                ?>
              </select>
            </td>
          </tr>
        </table>
      <p>Producto: <input type='text' name='nombreproducto' placeholder='Nombre de producto'></p>
      El id-producto se generará automaticamente P0001,P0002,P0003...<br>
      <p>Precio: <input type='text' name='precio' placeholder='Precio del producto'></p>
       <input type="submit" value="Enviar" name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>
  <?php
  if (isset($_POST['enviar'])) {

    //Parametros recibidos
    $nombrecategoria=$_POST['nombrecategoria'];
    $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

    //Comprobacion de parametros
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
      $nombreproducto=$_POST['nombreproducto'];
      $precio=$_POST['precio'];
      //Comprobacion de parametros
      revisarparamentros($nombrecategoria,$precio);
    }

    //Creamos la conexion
    $conexion=crearconexionpdo($servername, $username, $password, $dbname);

    //Lógica de Negocio
    // Si se pulsa el boton de enviar
    altaproducto($nombrecategoria,$nombreproducto,$precio,$conexion);

    //Cerramos la conexion
    cerrarconexion($conexion);
  }

  ?>
