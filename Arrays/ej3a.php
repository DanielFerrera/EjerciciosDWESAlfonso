<HTML>
<HEAD><TITLE> Ejercicios Arrays Unidimensionales</TITLE></HEAD>
<BODY>
<?php

echo "<h3>Daniel Ferrera</h3>";
echo "<table border=2>";
echo "<tr>";
echo "<td><b>Indice</b></td><td><b>Valor</b></td><td><b>Suma</b></td>";
echo "</tr>";
echo "<tr>";

$indice=array();
$arraybinario=array();
for ($i=0; $i < 20 ; $i++) {
  $indice[$i]=$i;
}
$binario=0;
$completo="";
$length=sizeof($indice);
for ($i=0; $i < $length; $i++) {
  $binario=$indice[$i]%2;
  $completo=$binario."".$completo;
  $arraybinario[$i]=$indice[$i]/2;
}

var_dump($indice);
var_dump($binario);

?>
</BODY>
</HTML>
