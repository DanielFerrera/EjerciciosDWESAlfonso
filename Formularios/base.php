<?php

// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
// echo  "Dato 1: ".$_POST['dato1'],"<br>";
echo "<center>";
echo "<h1>Cambio de Base</h1>";
  $valor1=$_POST['dato1'];
  $valor2=$_POST['dato2'];
  $valor11 = explode("/", $valor1);
  $num=$valor11[0];
  $base=$valor11[1];
  echo "Numero $num en base $base = ".binario($num,$base);
  echo "<br>";
echo "Numero $num en base $valor2 = ".binario($num,$valor2);

function binario($num,$valor2){
  // echo "El numero a convertir es: ".$_POST['dato1'];
  //binario
    $completo="";
    while ($num >= 1) {
    $binario=$num%$valor2;
    $completo=$binario."".$completo;
    $num=$num/$valor2;
    }

    return $completo;
}

?>
