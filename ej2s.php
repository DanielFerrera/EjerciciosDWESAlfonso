<HTML>
<HEAD> <TITLE>  EJ1-Conversion IP Decimal a Binario</TITLE> </HEAD>

<BODY>
<?php

echo "<h2>Daniel Ferrera</h2>";

$ip="192.18.16.204";
echo "<b>IP= 192.18.16.204 </b>y en binario es: ";

$ip1=substr($ip,0,3);
echo decbin($ip1);
echo ".";

$ip2=substr($ip,4,6);
echo decbin($ip2);
echo ".";

$ip3=substr($ip,7,8);
echo decbin($ip3);
echo ".";

$ip4=substr($ip,10,13);
echo decbin($ip4);

?>
</BODY>
</HTML>
