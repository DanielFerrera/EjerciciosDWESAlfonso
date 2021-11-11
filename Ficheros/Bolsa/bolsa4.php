<?php

include './funciones_bolsa.php';

$z=file('./ibex35.txt');
  $nombre=$_POST['Nombre'];
    $nombre2=$_POST['Nombre2'];
    echo valorescap($z,$nombre,$nombre2);
//0
//32
//8
//8
//8
//16
//max 8
//min 8
//16
//8
//5



?>
