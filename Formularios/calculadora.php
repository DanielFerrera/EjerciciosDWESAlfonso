<?php

echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
echo  "Dato 1: ".$_POST['dato1'],"<br>";
echo  "Dato 2: ".$_POST['dato2'],"<br>";
$operacion=0;
if (!empty($_POST['operacion'])) {
  if ($_POST['operacion']=='suma') {
    $operacion=$_POST['dato1']+$_POST['dato2'];
    echo "Resultado=$operacion";
  }elseif ($_POST['operacion']=='resta') {
    $operacion=$_POST['dato1']-$_POST['dato2'];
    echo "Resultado=$operacion";
  }elseif ($_POST['operacion']=='division') {
    $operacion=$_POST['dato1']/$_POST['dato2'];
    echo "Resultado=$operacion";
  }elseif ($_POST['operacion']=='producto') {
    $operacion=$_POST['dato1']*$_POST['dato2'];
    echo "Resultado=$operacion";
  }
}else{
  echo "No se ha marcado ninguna operacion";
}


?>
