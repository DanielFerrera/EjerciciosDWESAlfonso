<HTML>
<HEAD><TITLE> Reto 1 - BINGO</TITLE></HEAD>
<BODY>
<?php

echo "<h3>Reto 1 - BINGO - Daniel Ferrera</h3>";
$fila=0;
echo "<h1>Bolas </h1>";
echo "</br>";
echo "<table><tr>";
for ($i=1; $i <= 60 ; $i++) {
    if ($fila%10==0) {
      echo "<tr><td><img src=bolas/$i.png /></td></tr><tr>";
    }else{
      echo "<td><img src=bolas/$i.png /></td>";


    }
      $fila++;
}
echo "</table>";

$carton1 = array();
$contador = 0;
while ($contador<15) {
  $generador = rand(1,60);
  if (!in_array($generador,$carton1)) {
    array_push($carton1,$generador);
    $contador++;
  }
}

$carton2 = array();
$contador = 0;
while ($contador<15) {
  $generador = rand(1,60);
  if (!in_array($generador,$carton2)) {
    array_push($carton2,$generador);
    $contador++;
  }
}

$carton3 = array();
$contador = 0;
while ($contador<15) {
  $generador = rand(1,60);
  if (!in_array($generador,$carton3)) {
    array_push($carton3,$generador);
    $contador++;
  }
}

var_dump($carton1);
var_dump($carton2);
var_dump($carton3);

// var_dump($bombo);

// $cantidadbolas=count($bombo);
//ahora tengo que sacar un numero aleatorio
//dentro del bombo y comprobar que ese no esta en el carton1

//generador
//lo que tengo pensado es sacar un numero aleatorio de este generador
//y meterlo en el de contrastar si ese numero es
//igual al de contrastar entonces no lo pasa y genera otro

$comprobar=array();
$contador1=0;

while ($contador1<15) {
  $num=rand(1,60);
  if (!(in_array($num,$comprobar))) {
    array_push($comprobar,$num);
    echo "El: $num - ";
  for ($i=0; $i <15 ; $i++) {
    if ($carton1[$i]==$num) {
      $contador1++;
      echo " Numero encontrado ";
    }
  }
}
}
echo "BINGOOOOOOOOOOOOOOOO";

?>
</BODY>
</HTML>
