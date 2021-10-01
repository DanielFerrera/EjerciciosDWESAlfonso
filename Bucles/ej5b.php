<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php

echo "<table border=2>";
$num="6";
echo"Tabla de multiplicar del $num:";
for ($i=0; $i <=10 ; $i++) {
$var=0;
$var=$num*$i;
echo "<tr>";
echo "<td>$num x $i</td>";
echo"<td>$var</td>";
echo "</tr>";
}
echo "</table>";
?>
</BODY>
</HTML>
