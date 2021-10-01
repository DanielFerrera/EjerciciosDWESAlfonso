<HTML>
<HEAD><TITLE> Ejercicio Pizarra</TITLE></HEAD>
<BODY>
<?php

$desdeletra= "a";
$hastaletra="z";
$letraAleatoria = chr(rand(ord($desdeletra), ord($hastaletra)));

$ibex35 = array (
  array('Nombre', 'Precio', 'Var %', 'Var €', 'Volumen' , 'Cap' , 'Per' , 'Rent/Div' , 'Hora' ),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
  array(chr(rand(ord($desdeletra), ord($hastaletra))), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 999999), rand(0, 9999999)),
);

echo "<table border=1>";
for ($fila=0; $fila < 36 ; $fila++) {
  echo "<tr></tr>";
  for ($columna=0; $columna < 9 ; $columna++) {
    echo "<td>".$ibex35[$fila][$columna]."</td>";
  }
  echo "</tr>";
}
echo "</table>";





?>
</BODY>
</HTML>
