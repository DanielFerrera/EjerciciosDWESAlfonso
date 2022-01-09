<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body  style="background-color:#85C9DC;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Consulta de Compras:</h1>
      Seleccione el NIF del cliente, una fecha desde y una fecha hasta.
       <p>NIF:
         <select name="nif">
           <?php
           //Fichero de funciones
           include "./funciones.php";
           //Parametros
           $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

           //Creamos la conexion
           $conexion=crearconexionpdo($servername, $username, $password, $dbname);

           //Revisar Parametros
           if ($_SERVER["REQUEST_METHOD"]=="POST") {
              $nif=$_POST['nif'];
              revisarparamentros($nif);
           }
           //Lógica de Negocio
           $arraynifs=mostrarnifclientes($conexion);

           foreach ($arraynifs as $key) {
             ?> <option> <?php echo $key ?> </option>
             <?php
           }
           ?>
         </select>
         <p>Fecha desde:</p>
         <input type="date" name="fechainicio">
         <p>Fecha hasta:</p>
         <input type="date" name="fechafin">
         <date>
         <br><br>
       <input type="submit" value="Enviar" name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>
  <?php
  if (isset($_POST['enviar'])) {
    //Parámetros
    $fechainicio=$_POST['fechainicio'];
    $fechafin=$_POST['fechafin'];

    //Revisar parámetros
    revisarparamentros($fechainicio);
    revisarparamentros($fechafin);

    //Lógica de Negocio
    // Si se pulsa el boton de enviar
    mostrarcompras($nif,$fechainicio,$fechafin,$conexion);
    //Cerramos la conexion
    cerrarconexion($conexion);
  }


  ?>
