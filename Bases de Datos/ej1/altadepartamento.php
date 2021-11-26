<?php
include "funciones.php";
// $nombre=$_POST['nombredept'];
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnn";
// crearconexion($servername, $username, $password, $dbname);
$nombredept=$_POST['nombredept'];
$conexion=crearconexion($servername, $username, $password, $dbname);
creardepartamento($nombredept,$conexion);
 mostrardepartamentos($conexion);
// mostrartablas($conexion);
// mostrarempleados($conexion);

?>
