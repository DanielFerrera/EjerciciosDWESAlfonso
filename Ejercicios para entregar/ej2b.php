<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
echo "<h2>Daniel Ferrera</h2>";

$num=48;
echo "El numero a convertir es: $num";

//binario
  $binario=0;
  $completo="";
  while ($num >= 1) {
  $binario=$num%2;
  $completo=$binario."".$completo;
  $num=$num/2;
  }
  echo " </br> En binario:$completo";
  //reseteamos

  $binario=0;$completo="";

  $num=48;
  //base 3
  while ($num >= 1) {
  $binario=$num%3;
  $completo=$binario."".$completo;
  $num=$num/3;
  }
  echo " </br> En base 3: $completo";

  //base 4
  $binario=0;$completo="";
  $num=48;
  while ($num >= 1) {
  $binario=$num%4;
  $completo=$binario."".$completo;
  $num=$num/4;
  }
  echo " </br> En base 4: $completo";

  //base 5
  $binario=0;$completo="";
  $num=48;
  while ($num >= 1) {
  $binario=$num%5;
  $completo=$binario."".$completo;
  $num=$num/5;
  }
  echo " </br> En base 5: $completo";

  //base 6
  $binario=0;$completo="";
  $num=48;
  while ($num >= 1) {
  $binario=$num%6;
  $completo=$binario."".$completo;
  $num=$num/6;
  }
  echo " </br> En base 6: $completo";

  //base 7
  $binario=0;$completo="";
  $num=48;
  while ($num >= 1) {
  $binario=$num%7;
  $completo=$binario."".$completo;
  $num=$num/7;
  }
  echo " </br> En base 7: $completo";

  //base 8
  $binario=0;$completo="";
  $num=48;
  while ($num >= 1) {
  $binario=$num%8;
  $completo=$binario."".$completo;
  $num=$num/8;
  }
  echo " </br> En base 8: $completo";

  //base 9
  $binario=0;$completo="";
  $num=48;
  while ($num >= 1) {
  $binario=$num%9;
  $completo=$binario."".$completo;
  $num=$num/9;
  }
  echo " </br> En base 9: $completo";

?>
</BODY>
</HTML>
