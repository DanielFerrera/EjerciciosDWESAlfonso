<?php
$fichero=fopen("alumnos2.txt","r");

echo "<table border=2>";
echo "<tr>";
echo "<td> Nombre </td>";
echo "<td> Apellido 1 </td>";
echo "<td> Apellido 2 </td>";
echo "<td> Fecha Nacimiento </td>";
echo "<td> Localidad </td>";
echo "</tr>";
$cont=0;
while(!feof($fichero)){
$z=fgets($fichero);
dividir($z);
$cont++;
}

function dividir($z){
  $partes=explode("##",$z);
  echo "<tr>";
  echo "<td>".$partes[0]."</td>";
  echo "<td>".$partes[1]."</td>";
  echo "<td>".$partes[2]."</td>";
  echo "<td>".$partes[3]."</td>";
  echo "<td>".$partes[4]."</td>";
  echo "</tr>";
}

 ?>
