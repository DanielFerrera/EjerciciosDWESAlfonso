<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body  style="background-color:#85C9DC;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Aprovisionar Productos</h1>
      Datos del Producto:<br>
      <p>Cantidad de producto:
       <input type='text' name='cantidad' placeholder='Cantidad del producto'></p>
       <p>Nombre del producto:
         <select name="nombreproducto">
           <?php
           //Fichero de funciones
           include "./funciones.php";
           //Parametros
           $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

           //Creamos la conexion
           $conexion=crearconexionpdo($servername, $username, $password, $dbname);

           //Revisar Parametros
           if ($_SERVER["REQUEST_METHOD"]=="POST") {
              $nombreproducto=$_POST['nombreproducto'];
              revisarparamentros($nombreproducto);
           }
           //Lógica de Negocio
           $arrayproductos=mostrarproductos($conexion);

           foreach ($arrayproductos as $key) {
             ?> <option> <?php echo $key ?> </option>
             <?php
           }
           ?>
         </select>
         <p>Número de almacen:
         <select name="numalmacen">
           <?php
           //Parametros
           $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

           //Creamos la conexion
           $conexion=crearconexionpdo($servername, $username, $password, $dbname);

           //Revisar Parametros
           if ($_SERVER["REQUEST_METHOD"]=="POST") {
              $numalmacen=$_POST['numalmacen'];
              revisarparamentros($numalmacen);
           }
           //Lógica de Negocio
           $arrayalmacen=mostraralmacenes($conexion);
           foreach ($arrayalmacen as $key) {
             ?> <option> <?php echo $key ?> </option>
             <?php
           }
           ?>
         </select></p>
       <input type="submit" value="Enviar" name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>
  <?php
  if (isset($_POST['enviar'])) {
    $cantidad=$_POST['cantidad'];
    //Lógica de Negocio
    // Si se pulsa el boton de enviar
     insertarproductoenalmacen($nombreproducto,$numalmacen,$cantidad,$conexion);

    //Cerramos la conexion
    cerrarconexion($conexion);
  }


  ?>
