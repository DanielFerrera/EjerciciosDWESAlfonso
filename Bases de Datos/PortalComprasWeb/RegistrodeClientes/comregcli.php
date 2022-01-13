<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body  style="background-color:#85C9DC;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>Registro de Cliente</h1>
    Se rellenará con los datos del cliente. El Apellido será la clave pero del revés<br>
    <p>NIF:
      <input type='text' name='nif' placeholder='NIF'></p>
      <p>Nombre:
        <input type='text' name='nombre' placeholder='Nombre'></p>
        <p>Apellido:
          <input type='text' name='apellido' placeholder='Apellido'></p>
          <p>Codigo Postal:
            <input type='text' name='cp' placeholder='Codigo Postal'></p>
            <p>Direccion:
              <input type='text' name='direccion' placeholder='Direccion'></p>
              <p>Ciudad:
                <input type='text' name='ciudad' placeholder='Ciudad'></p>

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
              $nif=$_POST['nif'];$nombre=$_POST['nombre'];$apellido=$_POST['apellido'];$cp=$_POST['cp'];
              $direccion=$_POST['direccion'];$ciudad=$_POST['ciudad'];
              $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
              $clave=strtolower(strrev($apellido));
              echo "$clave";
              // echo "La clave será: $clave";
              //Comprobacion de parametros
              revisarparamentros($nif,$nombre,$apellido,$cp,$direccion,$ciudad);

              //Creamos la conexion
              $conexion=crearconexionpdo($servername, $username, $password, $dbname);

              //Lógica de Negocio
              // Si se pulsa el boton de enviar
              $nifvalidado=validarnif($nif);
              if (empty($nifvalidado)) {
                echo "NIF Incorrecto";
              }else{
                altacliente($clave,$nifvalidado,$nombre,$apellido,$cp,$direccion,$ciudad,$conexion);
              }

              //Cerramos la conexion
              cerrarconexion($conexion);
            }


            ?>
