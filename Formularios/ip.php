<?php
echo "<center>";
echo "<h1>IPs</h1>";
  $valor1=$_POST['dato1'];
  $valor11 = explode(".", $valor1);
  $num1=$valor11[0];
  $num2=$valor11[1];
  $num3=$valor11[2];
  $num4=$valor11[3];
  if ($num1<255 && $num1>0 && $num2<255 && $num2>0  && $num3<255 && $num3>0 && $num4<255 && $num4>0) {
    $todo= binario($num1).".".binario($num2).".".binario($num3).".".binario($num4);
    echo "IP notación decimal: <input type='text' name='dato1' value='$valor1' size=30><br>";
    echo "IP Binario: <input type='text' name='dato1' value='$todo' size=30><br>";
  }else {
    echo "IP Binario: <input type='text' name='dato1' value='INCORRECTO' size=30><br>";
  }

function binario($num){
  //binarie
    $completo="";
    while ($num >= 1) {
    $binario=$num%2;
    $completo=$binario."".$completo;
    $num=$num/2;
    }
    $completo2=str_pad($completo,8,"0",STR_PAD_LEFT);

    return $completo2;

}

?>
