<?php

include './funciones_bolsa.php';

$z=file('./ibex35.txt');
  $nombre=$_POST['Nombre'];
    $nombre2=$_POST['Nombre2'];
    echo valoresminyvolumen($z,$nombre,$nombre2);
?>
