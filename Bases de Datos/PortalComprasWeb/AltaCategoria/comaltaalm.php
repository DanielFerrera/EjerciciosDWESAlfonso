<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body  style="background-color:#85C9DC;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Alta Almacen</h1>
      El num-almacen se generará automaticamente 10,20,30...<br>
      <p>Localidad:
       <input type='text' name='localidad' placeholder='Nombre de localidad'></p>
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
    $localidad=$_POST['localidad'];
    $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

    //Comprobacion de parametros
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
      $localidad=$_POST['localidad'];
      //Comprobacion de parametros
      revisarparamentros($localidad);
    }

    //Creamos la conexion
    $conexion=crearconexionpdo($servername, $username, $password, $dbname);

    //Lógica de Negocio
    // Si se pulsa el boton de enviar
    altaalmacen($localidad,$conexion);

    //Cerramos la conexion
    cerrarconexion($conexion);
  }


  ?>
