<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body style="background-color:#85C9DC;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="1" rules="none">
      <h1 style="color:black;">Alta Empleado</h1>
      <tr>
        <td> DNI:</td> <td><input type='text' name='dni' placeholder='DNI'></td>
      </tr>
      <tr>  <td>Nombre:</td><td> <input type='text' name='nombre' placeholder='Nombre de empleado'></td>
      </tr>
      <tr>
        <td>Apellidos:</td><td> <input type='text' name='apellidos' placeholder='Apellido1 Apellido2'></td>
      </tr>
      <tr>
        <td>Fecha de nacimiento:</td><td> <input type='text' name='fecha' placeholder='Fecha de nacimiento'></td>
      </tr>
      <tr>
        <td>Salario:</td><td> <input type='text' name='salario' placeholder='Salario'></td>
      </tr>
      <tr>
        <td>Departamento:</td><td> <select name="OS">
          <option value="1">Windows Vista</option>
          <option value="2">Windows 7</option>
        </select></td>
      </tr>
    </table></br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
  </form>
</body>
</html>

<?php
//Fichero de funciones
include "./funciones.php";

//Parametros recibidos
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnnprofe";
$dni=$_POST['dni']; $nombre=$_POST['nombre']; $apellidos=$_POST['apellidos'];
$fecha=$_POST['fecha'];$salario=$_POST['salario'];
//Comprobacion de parametros
revisarparamentros($dni, $nombre, $apellidos, $fecha, $salario);

echo "a";


?>
