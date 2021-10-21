<?php

// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
// echo  "Dato 1: ".$_POST['dato1'],"<br>";
echo "<center>";
echo "<h1>CONVERSOR NUMERICO</h1>";
  $valor=$_POST['dato1'];
echo "Numero decimal: <input type='text' name='dato1' value='$valor' size=15><br><br>";
if (!empty($_POST['operacion'])) {
  if ($_POST['operacion']=='binario') {
      echo "<table border='2'><tr><td>binario:</td><td>".binario()."</td></tr><table>";
  }elseif ($_POST['operacion']=='octal') {
      echo "<table border='2'><tr><td>Octal:</td><td>".octal()."</td></tr><table>";
  }elseif ($_POST['operacion']=='hexa') {
      echo "<table border='2'><tr><td>hexa:</td><td>".hexa()."</td></tr><table>";
  }elseif ($_POST['operacion']=='todos') {
          echo todos();
  }
}else {
  echo "No se ha marcado operacion";
}
// echo binario();
// echo octal();
echo "</center>";
function binario(){
  // echo "El numero a convertir es: ".$_POST['dato1'];
  $num=$_POST['dato1'];
  //binario
    $binario=0;
    $completo="";
    while ($num >= 1) {
    $binario=$num%2;
    $completo=$binario."".$completo;
    $num=$num/2;
    }

    return $completo;
}

function octal(){
  // echo "El numero a convertir es: ".$_POST['dato1'];
  $num=$_POST['dato1'];
  //octal
    $binario=0;
    $completo="";
    while ($num >= 1) {
    $binario=$num%8;
    $completo=$binario."".$completo;
    $num=$num/8;
    }

    return $completo;
}

function hexa(){
  // echo "El numero a convertir es: ".$_POST['dato1'];
  $num=$_POST['dato1'];
  //hexadecimal
  $valores=array('0','1','2','3','4','5','6','7',
                 '8','9','A','B','C','D','E','F');
  $val='';
  while ($num != '0') {
    $val=$valores[bcmod($num,'16')].$val;
    $num=bcdiv($num,'16',0);
  }
    // echo " </br> En base 16 es:$val";
 return $val;
}

function todos(){
  echo "<table border=1>";
  echo "<tr><td>Binario</td><td>".binario()."</td></tr>";
  echo "<tr><td>Octal</td><td>".octal()."</td></tr>";
  echo "<tr><td>Hexadecimal</td><td>".hexa()."</td></tr>";
  echo "</table>";
}

?>
