<?php
//Fichero de funciones
include "funciones.php";

//Parametros recibidos
$nombredept=$_POST['nombredept'];
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnnprofe";

//Comprobacion de parametros
revisarparamentros($servername, $username, $password, $dbname);

//Lógica de Negocio
$conexion=crearconexionpdo($servername, $username, $password, $dbname);
creardepartamentopdo($nombredept,$conexion);


 ?>
