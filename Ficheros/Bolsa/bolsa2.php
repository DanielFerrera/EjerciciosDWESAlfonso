<?php
include './funciones_bolsa.php';

$fichero=file("ibex35.txt");
$palabra=$_POST['nombre'];
encontrarpalabrafichero($fichero,$palabra);


 ?>
