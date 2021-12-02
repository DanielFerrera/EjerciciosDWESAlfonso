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
        <td>Fecha de nacimiento:</td><td> <input type='text' name='fecha' placeholder='Año/Mes/Dia'></td>
      </tr>
      <tr>
        <td>Salario:</td><td> <input type='text' name='salario' placeholder='Salario'></td>
      </tr>
      <tr>
        <td>Departamento:</td><td>
          <select name="nombredept">
            <?php
            //Fichero de funciones
            include "./funciones.php";

            //Parametros recibidos
            $servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnnprofe";

            //if
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
              $dni=$_POST['dni']; $nombre=$_POST['nombre']; $apellidos=$_POST['apellidos'];
              $fecha=$_POST['fecha'];$salario=$_POST['salario']; $nombredept=$_POST['nombredept'];

              //Comprobacion de parametros
              revisarparamentros($dni, $nombre, $apellidos, $fecha, $salario);
            }

            //Creamos la conexion
            $conexion=crearconexionpdo($servername, $username, $password, $dbname);

            //Lógica de Negocio
            $arraydepartamentos=mostrardepartamentospdo($conexion);
            // var_dump($arraydepartamentos);

            foreach ($arraydepartamentos as $key) {
              ?> <option> <?php echo $key ?> </option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
    </table></br>
    <input type="submit" value="Enviar" name="enviar">
    <input type="reset" value="Borrar">
  </form>
</body>
</html>
<?php
//Si se pulsa el boton de enviar
if (isset($_POST['enviar'])) {
  // echo "</br>Datos introducidos: </br>$dni $nombre $apellidos $fecha $salario $nombredept";

  //Metemos al usuario dentro de la tabla de Empleado
  introducirempleado($dni,$nombre,$apellidos,$fecha,$salario,$conexion);
  $fecha=date('Y-m-d');
  echo "</br>";
  //Unimos tablas, empleado y departamento en emple_depart
  introduciremple_depart($dni,$fecha,$nombredept,$conexion);

}
?>
