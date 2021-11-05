<?php

include '../funciones_bolsa.php';

$z=file('../ibex35.txt');
  $nombre=$_POST['Nombre'];
    $nombre2=$_POST['Nombre2'];
    echo valoresacum($z,$nombre,$nombre2);
//0
//32
//8 -40
//8 - 48
//8 -56
//16 -72
//max 8 -80
//min 8 -88
//16 -104
//8
//5



?>
