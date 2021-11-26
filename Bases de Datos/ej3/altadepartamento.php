<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Alta Empleado</h1>
      <p>Nombre:</p>
       <input type='text' name='nombre' placeholder='Rellene con el nombre delempleado'>
       <p>Apellido:</p>
        <input type='text' name='apellido' placeholder='Rellene con el apellido del empleado'>
        <p>Fecha nacimiento:</p>
         <input type='text' name='fechnac' placeholder='Rellene con la fecha del empleado'>
       <p>DNI:</p>
        <input type='text' name='dni' placeholder='Rellene con el dni del empleado'>
        <p>Departamento:</p>

        <select name="nombredept">
        <?php
        require 'funciones.php';
        $servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleados1n";
        // crearconexion($servername, $username, $password, $dbname);
        $conexion=crearconexion($servername, $username, $password, $dbname);
         // <option value="value1">Value 1</option>
        $salida= desplegable($conexion);
        echo $salida;

         ?>
         </select>

       <br>
       <input type="submit" value="Enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>

<?php
include "funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombredept = test_input($_POST["nombredept"]);
  $nombreemp = test_input($_POST["nombre"]);
  $apellido = test_input($_POST["apellido"]);
  $fecha = test_input($_POST["fechnac"]);
  $dni = test_input($_POST["dni"]);

// $nombre=$_POST['nombredept'];
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleados1n";
// crearconexion($servername, $username, $password, $dbname);
$conexion=crearconexion($servername, $username, $password, $dbname);
 añadirempleado($dni,$nombreemp,$fecha,$nombredept,$conexion);

// creardepartamento($nombredept,$conexion);
 //mostrardepartamentos($conexion);
// mostrartablas($conexion);
 // mostrarempleados($conexion);
}
?>
