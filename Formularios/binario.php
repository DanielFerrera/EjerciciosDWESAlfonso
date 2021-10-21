<?php

// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
// echo  "Dato 1: ".$_POST['dato1'],"<br>";
echo "<center>";
echo "<h1>CONVERSOR BINARIO</h1>";
echo binario();
echo "</center>";
function binario(){
  // echo "El numero a convertir es: ".$_POST['dato1'];
  $num=$_POST['dato1'];
  $valor=$_POST['dato1'];
  //binario
    $binario=0;
    $completo="";
    while ($num >= 1) {
    $binario=$num%2;
    $completo=$binario."".$completo;
    $num=$num/2;
    }
    echo "<br>";
    echo "Numero decimal: <input type='text' name='dato1' value='$valor' size=15><br><br>";
    echo "<br>";
    echo "Numero binario: <input type='text' name='dato1' value='$completo' size=15>";

}



?>
