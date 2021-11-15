<?php

$fechasorteo=$_POST['fechasorteo'];
$recaudacion=$_POST['recaudacion'];
echo "<h1>RESULTADOS SORTEO PRIMITIVA</h1>";
echo "La fecha del sorteo es: <b>$fechasorteo</b></br>";
echo "La recaudacion realizada es de: <b>$recaudacion</b></br>";
$usuariosreintegro=$contador5=$contador3=$contador4=$contador6=$contador2=$contador1=$contador0=$totalapuestas=0;
echo "<h1>COMBINACION GANADORA</h1>";
 $usuariosreintegro=$contador3=$totalapuestas=0;
$combinacionganador=numeroganador();
//recorremos el numero sin mas
pintar($combinacionganador);
pintarsimple($combinacionganador,$usuariosreintegro,$contador3,$totalapuestas);

//CREACION DE LA COMBINACION GANADORA DE LA PRIMITIVA
function numeroganador(){
  //hago un array para meter 7 numeros, 6 y 1- complementario
  $combinacionganador=array();
  $i=0;
  while (count($combinacionganador)<7){
    //7 numeros entre el 1 y 49 que no se puedan repetir
    $num=rand(1,49);
    if (! (in_array($num,$combinacionganador)))
    $combinacionganador[$i++]=$num;
  }
  //añadimos el reintegro
  $num=rand(0,9);
  array_push($combinacionganador,$num);
  return $combinacionganador;
}//numero ganador

function pintar($combinacionganador){
  echo "</br>";
  $tamaño=count($combinacionganador);
  for ($i=0; $i <$tamaño-1 ; $i++) {
    echo "<img src=imagesbolas/$combinacionganador[$i].png width=70px height=70px/>";
  }
  for ($i=7; $i <$tamaño ; $i++) {
    echo "<img src=imagesbolas/rbola$combinacionganador[$i].png width=70px height=70px/>";
  }
  echo "</br></br>";
}//pintar

function pintarsimple($combinacionganador,$usuariosreintegro,$contador3,$totalapuestas){
  $fichero=file("r22_primitiva.txt");
  foreach($fichero as $linea=>$texto) {
    if ($linea>1) {
      //cuidado con esto de arriba
      global $totalapuestas;
      $totalapuestas++;
      // echo "Linea: ",$linea," Texto: ",$texto,"<br>";
      $partes=explode("-",$texto);
      //borro el numero del usuario que juega
      unset($partes[0]);
       ${"array".$linea}=array();
      foreach ($partes as $valor) {
        $valor1=intval($valor);
        array_push(${"array".$linea},$valor1);
      }
       // var_dump(${"array".$linea});
       comprobaciones($combinacionganador,${"array".$linea},$usuariosreintegro,$contador3);
    }
}
}

function comprobaciones($combinacionganador,$linea1array,$usuariosreintegro,$contador3){
  $tamaño=count($combinacionganador);
  for ($i=0; $i <$tamaño ; $i++) {
      //reintegro
    if ($i==7 && ($combinacionganador[$i]==$linea1array[$i])) {
        global $usuariosreintegro;
        $usuariosreintegro++;
    }
  }
  // echo "reintegros: ".$usuariosreintegro;
  //3 y 4
  $contadorgeneral=0;
  for ($i=0; $i <$tamaño-2 ; $i++) {
    if ($combinacionganador[$i]==$linea1array[$i]) {
       $contadorgeneral++;
    }
  }

  if ($contadorgeneral==6) {
    global $contador6;
     $contador6++;
  }
  //complementario
  if ($contadorgeneral==5) {
    for ($i=0; $i <$tamaño-2 ; $i++) {
      if ($combinacionganador[$i]==$linea1array[6]) {
        global $contador5;
         $contador5++;
      }
    }
  }
  if ($contadorgeneral==3) {
    global $contador3;
     $contador3++;
  }
  if ($contadorgeneral==4) {
    global $contador4;
     $contador4++;
  }
  if ($contadorgeneral==2) {
    global $contador2;
     $contador2++;
  }
  if ($contadorgeneral==1) {
    global $contador1;
     $contador1++;
  }
  if ($contadorgeneral==0) {
    global $contador0;
     $contador0++;
  }
}

$dineroobtenido=$recaudacion*$totalapuestas;
$recaudaciontotal=$dineroobtenido*0.8;

echo "Total apuestas: <b>".$totalapuestas."</b></br>";
echo "Acertantes 6 números: <b>".$contador6."</b></br>";
echo "Acertantes 5 números + Complementario: <b>".$contador5."</b></br>";
echo "Acertantes 4 números: <b>".$contador4."</b></br>";
echo "Acertantes 3 números: <b>".$contador3."</b></br>";
echo "Acertantes Reintegros: <b>".$usuariosreintegro."</b></br>";
echo "Sin premio 2 números: <b>".$contador2."</b></br>";
echo "Sin premio 1 números: <b>".$contador1."</b></br>";
echo "Sin premio 0 números: <b>".$contador0."</b></br>";

$dentrofichero=fopen("premiosorteo$fechasorteo.txt","w");
//6 aciertos
$premio6=$recaudaciontotal*0.4*$contador6;
$premio5=$recaudaciontotal*0.3*$contador5;

fwrite($dentrofichero,"C6#$premio6");
fwrite($dentrofichero,"C6#$premio5");

fclose($dentrofichero);


?>
