<HTML>
<HEAD><TITLE> Reto 1 - BINGO</TITLE></HEAD>
<BODY>
<?php

echo "<h3>Reto 1 - BINGO - Daniel Ferrera</h3>";

$carton1 = array();
$contador = 0;
while ($contador<15) {
  $generador = rand(1,60);
  if (!in_array($generador,$carton1)) {
    array_push($carton1,$generador);
    $contador++;
  }
}

var_dump($carton1);

//hago el bombo
$bombo=array();
for ($i=1; $i <61 ; $i++) {
  $bombo[$i]=$i;
}
// var_dump($bombo);

// $cantidadbolas=count($bombo);
//ahora tengo que sacar un numero aleatorio
//dentro del bombo y comprobar que ese no esta en el carton1

//generador
//lo que tengo pensado es sacar un numero aleatorio de este generador
//y meterlo en el de contrastar si ese numero es
//igual al de contrastar entonces no lo pasa y genera otro

$generador1=array();
for ($i=1; $i <61 ; $i++) {
  $generador1[$i]=$i;
}

$ganador=0;
while ($ganador<15) {
$generador=rand(1,60);
echo "El: $generador - ";
if ($bombo[$generador]=$generador) {
  $bombo[$generador]==0;
  for ($i=0; $i <15 ; $i++) {
    if ($carton1[$i]==$generador) {
      $ganador++;
      echo "Numero encontrado ";
    }
  }
}

}
echo "BINGOOOOOOOOOOOOOOOO";

?>
</BODY>
</HTML>
