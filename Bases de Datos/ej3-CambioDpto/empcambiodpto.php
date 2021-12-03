<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body style="background-color:#85C9DC;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table border="1" rules="none">
      <h1 style="color:black;">Cambio de Departamento de un Empleado</h1>
      Selecciona el DNI del empleado y su nuevo Departamento:</br>
      <td>DNI de empleado:</td><td>
        <select name="dni">
          <?php
          //Fichero de funciones
          include "./funciones.php";

          //Parametros recibidos
          $servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnnprofe";

          //if
          if ($_SERVER["REQUEST_METHOD"]=="POST") {
             $dni=$_POST['dni'];
            //Comprobacion de parametros
             revisarparamentros($dni);
          }

          //Creamos la conexion
          $conexion=crearconexionpdo($servername, $username, $password, $dbname);

          //Lógica de Negocio
          $arraydnis=mostrarDNItablaempleado($conexion);
          foreach ($arraydnis as $key) {
            ?> <option> <?php echo $key ?> </option>
            <?php
          }
          // $conexion=null;
          ?>
        </select>

        <tr>
          <td>Departamento: </td>
          <td>
            <select name="nombredept">
              <?php
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
  // Si se pulsa el boton de enviar
  if (isset($_POST['enviar'])) {
    echo "</br>$dni y  $nombredept";
    //poner fecha de fin en la anterior registro y crear uno nuevo
     actualizartablaemple_departfechafin($dni,$nombredept,$conexion);
  }

  $conexion=null;
  ?>
