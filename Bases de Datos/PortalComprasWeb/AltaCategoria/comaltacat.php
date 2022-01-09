<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <p>Categoría:</p>
         <input type='text' name='categoria' placeholder='Nombre de una categoria'>
       <br><br>
       <input type="submit" value="Enviar"  name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>



<?php
if (isset($_POST['enviar'])) {
//INTRODUCIMOS LAS FUNCIONES
require "funciones.php";

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);

//AÑADIMOS PARAMETROS
$categoria=$_POST['categoria'];

//FUNCIONES
revisarparametros($categoria);
altacategoria($categoria,$conexion);

//CERRAMOS CONEXION
$conexion=null;
}
?>
