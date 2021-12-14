<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body style="background-color:#85C9DC;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table border="1" rules="none">
      <h1 style="color:black;">Lista Empleados + Salario</h1>
      Selecciona un departamento y se mostrarán sus empleados, su salario y su suma total:</br>
        <tr>
          <td>Departamento: </td>
          <td>
            <select name="nombredept">
              <?php
              //Fichero de funciones
              include "./funciones.php";
              //Parametros
              $servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnn";

              //Creamos la conexion
              $conexion=crearconexionpdo($servername, $username, $password, $dbname);

              //Revisar Parametros
              if ($_SERVER["REQUEST_METHOD"]=="POST") {
                 $nombredept=$_POST['nombredept'];
                //Comprobacion de parametros
                 revisarparamentros($nombredept);
              }
              //Lógica de Negocio
              $arraydepartamentos=mostrardepartamentospdo($conexion);
              var_dump($arraydepartamentos);

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
  // Si se pulsa el boton de enviar
  if (isset($_POST['enviar'])) {
    // echo "</br>$nombredept";
    //funcion con varios selects
    // mostrarsalarioempleadosdepartamento($nombredept,$conexion);
    //funcion que saca empleado+Salario y sum(salario)
    mostrarempleadosysumasalario($nombredept,$conexion);
  }

  $conexion=null;
  ?>
