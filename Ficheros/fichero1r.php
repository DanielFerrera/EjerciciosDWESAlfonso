<?php
$fichero=fopen("alumnos1.txt","r");
# Este bucle nos escribirá cada una de las lineas del fichero
echo "<table border=2>";
echo "<tr>";
while(!feof($fichero)){
$z=fgets($fichero,4000);
echo "<td>".$z."</td>";
}
echo "</tr>";
echo "</table>";

$fichero = fopen ("alumnos1.txt", "r");

$num_lineas = 0;
$caracteres = 0;

while (!feof ($fichero)) {
    if ($linea = fgets($fichero)){
       $num_lineas++;
       $caracteres += strlen($linea);
    }
}
fclose ($fichero);
echo "
Líneas: " . $num_lineas;
echo "
Caracteres: " . $caracteres;

 ?>
