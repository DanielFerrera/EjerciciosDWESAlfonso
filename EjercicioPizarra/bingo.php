<HTML>
<HEAD><TITLE> Reto 1 - BINGO</TITLE></HEAD>
<BODY>
<?php

echo "<h3>Reto 1 - BINGO - Daniel Ferrera</h3>";

$carton1 = array();
$repetido=false;
while ($repetido!=true) {
  //genero todos los numeros dentro del array
  for ($i=0; $i <15 ; $i++) {
    $generadornums=rand(0,60);
    $carton1[$i]=$generadornums;
  }
  //muestro el array
  var_dump($carton1);
  //ordeno el array
  sort($carton1);
  var_dump($carton1);
  $repetido=false;
  //compruebo que los numeros no estan repetidos
  for ($i=1; $i <15 ; $i++) {
    if (($carton1[$i-1])==$carton1[$i]) {
      //si el numero es igual al de la posicion anterior
      // pues esta repetido y se ha de sacar de nuevo el carton
      $repetido=true;
    }
  }
  if ($repetido=true) {
    echo "Hay numeros repetidos";
  }else{
    echo "No hay numeros repetidos";
  }

}


?>
</BODY>
</HTML>
