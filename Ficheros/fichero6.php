<?php

include '../funciones/seguridaddata.php';
//creamos el fichero

// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
$fichero1= $_POST['Nombre'];


echo "<h1>Operaciones ficheros</h1>";
echo "<b>Nombre del fichero: </b>".basename($fichero1)."<br>";
echo "<b>Directorio : </b>".dirname($fichero1)."<br>";
echo "<b>Tamaño del fichero: </b>".filesize($fichero1)."bytes"."<br>";
echo "<b>Fecha ultima modificacion fichero: </b>". date ("F d Y H:i:s.", filemtime($fichero1))."<br>";


?>
