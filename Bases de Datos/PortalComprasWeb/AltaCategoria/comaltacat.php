<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body  style="background-color:#85C9DC;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Alta Categoria</h1>
      El id-categoria se generará automaticamente C-001,C-002,C-003...<br>
      <p>Categoria:
       <input type='text' name='nombrecategoria' placeholder='Nombre de categoria'></p>
       <input type="submit" value="Enviar" name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>
  <?php
  if (isset($_POST['enviar'])) {
    //Fichero de funciones
    include "funciones.php";

    //Parametros recibidos
    $nombrecategoria=$_POST['nombrecategoria'];
    $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

    //Comprobacion de parametros
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
      $nombrecategoria=$_POST['nombrecategoria'];
      //Comprobacion de parametros
      revisarparamentros($nombrecategoria);
    }

    //Creamos la conexion
    $conexion=crearconexionpdo($servername, $username, $password, $dbname);

    //Lógica de Negocio
    // Si se pulsa el boton de enviar
    altacategoria($nombrecategoria,$conexion);

    //Cerramos la conexion
    cerrarconexion($conexion);
  }


  ?>
