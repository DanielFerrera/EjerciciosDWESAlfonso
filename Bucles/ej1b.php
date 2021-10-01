<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
echo "<h2>Daniel Ferrera</h2>";

$num=169;
$binario=0;
$completo="";
echo"$num en binario: ";
while ($num >= 1) {
$binario=$num%2;
$completo=$binario."".$completo;
$num=$num/2;
}
echo "$completo";


?>
</BODY>
</HTML>
