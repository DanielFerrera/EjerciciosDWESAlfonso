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
$impares=array();
for ($i=0; $i < 20 ; $i++) {
  $indice[$i]=$i;
}
$e=1;
$cont=0;
while ($cont <20) {
  $impares[$cont]=$e;
  $e+=2;
  $cont++;
}
$length=sizeof($indice);
$suma=0;
$sumapares=0;
$contpares=0;
$sumaimpares=0;
$contimpares=0;
for ($u=0; $u < $length ; $u++) {
  echo "<td>$indice[$u]</td>";
  echo "<td>$impares[$u]</td>";
  $suma=$suma+$impares[$u];
  echo "<td>$suma</td></tr>";
  if ($u%2==0) {
    $sumapares=$sumapares+$impares[$u];
    $contpares++;
  }else{
    $sumaimpares=$sumaimpares+$impares[$u];
    $contimpares++;
  }
}
echo "</table></br>";
echo "Media de las posiciones pares:".$sumapares/$contpares;echo "</br>";
echo "Media de las posiciones impares:".$sumaimpares/$contimpares;

?>
</BODY>
</HTML>
