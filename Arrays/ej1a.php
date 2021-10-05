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
$indice=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
$impares=array(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41);
$suma=0;
$length=sizeof($indice);
for ($i=0; $i < $length ; $i++) {
  echo "<td>$indice[$i]</td>";
  echo "<td>$impares[$i]</td>";
  $suma=$suma+$impares[$i];
  echo "<td>$suma</td>
   </tr>";
}
echo "</table>";


?>
</BODY>
</HTML>
