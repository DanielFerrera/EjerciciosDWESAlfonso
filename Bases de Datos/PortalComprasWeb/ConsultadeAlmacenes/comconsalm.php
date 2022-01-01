<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body  style="background-color:#85C9DC;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Consulta de Almacenes:</h1>
      Introduzca el almacen deseado y se mostrarán los prodcutos del mismo
       <p>Informacion del almacen:
         <select name="nombrealmacen">
           <?php
           //Fichero de funciones
           include "./funciones.php";
           //Parametros
           $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

           //Creamos la conexion
           $conexion=crearconexionpdo($servername, $username, $password, $dbname);

           //Revisar Parametros
           if ($_SERVER["REQUEST_METHOD"]=="POST") {
              $nombrealmacen=$_POST['nombrealmacen'];
              revisarparamentros($nombrealmacen);
           }
           //Lógica de Negocio
           $arrayalmacenes=mostraralmacenes($conexion);

           foreach ($arrayalmacenes as $key) {
             ?> <option> <?php echo $key ?> </option>
             <?php
           }
           ?>
         </select>
         <br><br>
       <input type="submit" value="Enviar" name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>
  <?php
  if (isset($_POST['enviar'])) {
    //Parámetros
    $nombrealmacen=$_POST['nombrealmacen'];
    $posicionantesdeguion=strrpos($nombrealmacen,"-");
    $digito=substr($nombrealmacen,0,$posicionantesdeguion);
    //Lógica de Negocio
    // Si se pulsa el boton de enviar
     mirarproductoenalmacen($digito,$conexion);
    //Cerramos la conexion
    cerrarconexion($conexion);
  }


  ?>
