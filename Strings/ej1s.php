<HTML>
<HEAD> <TITLE>  EJ1-Conversion IP Decimal a Binario</TITLE> </HEAD>

<BODY>
<?php

echo "<h2>Daniel Ferrera</h2>";

$ip="192.18.16.204";
echo "<b>IP= 192.18.16.204 </b>y en binario es: ";

$ip1=substr($ip,0,3);
printf ("%b".".",$ip1);

$ip2=substr($ip,4,6);
printf ("%b".".",$ip2);

$ip3=substr($ip,7,8);
printf ("%b".".",$ip3);

$ip4=substr($ip,10,13);
printf ("%b",$ip4);

?>
</BODY>
</HTML>
