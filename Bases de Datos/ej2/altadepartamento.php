<?php
include "funciones.php";
// $nombre=$_POST['nombredept'];
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleados1n";
// crearconexion($servername, $username, $password, $dbname);
$nombredept=$_POST['nombredept'];
$nombreemp=$_POST['nombre'];
$apellido=$_POST['apellido'];
$fecha=$_POST['fechnac'];
$dni=$_POST['dni'];
$conexion=crearconexion($servername, $username, $password, $dbname);
añadirempleado($dni,$nombreemp,$fecha,$nombredept,$conexion);
// creardepartamento($nombredept,$conexion);
 //mostrardepartamentos($conexion);
mostrartablas($conexion);
mostrarempleados($conexion);

?>
