<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
echo "<h2>Daniel Ferrera</h2>";

$num=48;
echo "El numero a convertir es: $num";

//hexadecimal
$valores=array('0','1','2','3','4','5','6','7',
               '8','9','A','B','C','D','E','F');
$val='';
while ($num != '0') {
  $val=$valores[bcmod($num,'16')].$val;
  $num=bcdiv($num,'16',0);
}
  echo " </br> En base 16 es:$val";


?>
</BODY>
</HTML>
