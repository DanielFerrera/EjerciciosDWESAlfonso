<?php

include '../funciones_bolsa.php';

$z=file('../ibex35.txt');
  $nombre=$_POST['Nombre'];

echo encontrarpalabrafichero ($z,$nombre);
?>
