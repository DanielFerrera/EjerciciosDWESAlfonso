<?php
include "funciones.php";
// $nombre=$_POST['nombredept'];
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnnprofe";
// crearconexion($servername, $username, $password, $dbname);
$nombredept=$_POST['nombredept'];
$conexion=crearconexionpdo($servername, $username, $password, $dbname);
echo "</br>Servidor: <b>$servername</b>, Usuario: <b>$username</b>, Base de datos en uso: <b>$dbname</b>";
creardepartamentopdo($nombredept,$conexion,$servername,$dbname,$username,$password);
// mostrardepartamentos($conexion);
// mostrartablas($conexion);
// mostrarempleados($conexion);




 ?>
