<?php
function verfichero($fichero){
  echo "<table border=1><tr>";
  foreach($fichero as $linea=>$texto) {
    echo "<td>".$texto."</tr>";
  };

  echo "</td></table>";
}

function encontrarpalabrafichero ($fichero,$palabra){
  echo "<table border=1><tr>";
  foreach($fichero as $linea=>$texto) {

    if (substr("$texto",0,strlen($palabra))==$palabra) {

      echo "<td>".$texto."</tr>";

    }
  };

  echo "PALABRA INTRODUCIDA: $palabra";


  echo "</td></table>";
}

function valores ($fichero,$nombre,$nombre2){
  echo "<table border=1>";
  echo "<tr><td>Empresa</td><td>Ultimo</td><td>Max</td><td>Min</td>";
  foreach($fichero as $linea=>$texto) {
    $ultimo=substr("$texto",32,8);
    $max=substr("$texto",72,8);
    $min=substr("$texto",80,8);

    if (substr("$texto",0,strlen($nombre))==$nombre) {

      echo "<tr><td>$nombre</td> <td>$ultimo</td>   <td>$max</td>   <td>$min </td></tr><br>";

    }

    if (substr("$texto",0,strlen($nombre2))==$nombre2) {

      echo "<tr><td>$nombre2</td> <td>$ultimo</td>   <td>$max</td>   <td>$min </td></tr><br>";


    }


  };

  echo "</table>";
  echo "<br>PALABRA INTRODUCIDA: $nombre <br>";
  echo "<br>PALABRA INTRODUCIDA: $nombre2";
}

function valorescap ($fichero,$nombre,$nombre2){
  echo "<table border=1>";
  echo "<tr><td>Empresa</td><td>Ultimo</td><td>Max</td><td>Min</td><td>Cap</td>";
  foreach($fichero as $linea=>$texto) {
    $ultimo=substr("$texto",32,8);
    $max=substr("$texto",72,8);
    $min=substr("$texto",80,8);
    $cap=substr("$texto",104,8);

    if (substr("$texto",0,strlen($nombre))==$nombre) {

      echo "<tr><td>$nombre</td> <td>$ultimo</td>   <td>$max</td>   <td>$min </td> <td>$cap </td></tr><br>";

    }

    if (substr("$texto",0,strlen($nombre2))==$nombre2) {

      echo "<tr><td>$nombre2</td> <td>$ultimo</td>   <td>$max</td>   <td>$min </td> <td>$cap </td></tr><br>";


    }


  };

  echo "</table>";
  echo "<br>PALABRA INTRODUCIDA: $nombre <br>";
  echo "<br>PALABRA INTRODUCIDA: $nombre2";
}

function valoresacum ($fichero,$nombre,$nombre2){
  echo "<table border=1>";
  echo "<tr><td>Empresa</td><td>%Var</td><td>%Acumulado</td>";
  foreach($fichero as $linea=>$texto) {
    $varpor=substr("$texto",40,8);
    $acum=substr("$texto",56,8);


    if (substr("$texto",0,strlen($nombre))==$nombre) {

      echo "<tr><td>$nombre</td> <td>$varpor</td>   <td>$acum</td></tr><br>";

    }

    if (substr("$texto",0,strlen($nombre2))==$nombre2) {

      echo "<tr><td>$nombre2</td> <td>$varpor</td>   <td>$acum</td></tr><br>";


    }


  };

  echo "</table>";
  echo "<br>PALABRA INTRODUCIDA: $nombre <br>";
  echo "<br>PALABRA INTRODUCIDA: $nombre2";
}

function valoresminyvolumen ($fichero,$nombre,$nombre2){
  $volumenmedia=0;
  echo "<table border=1>";
  echo "<tr><td>Empresa</td><td>Minimo</td><td>Volumen</td>";
  foreach($fichero as $linea=>$texto) {
    $min=substr("$texto",80,8);
    $volumen=substr("$texto",88,8);

    if (substr("$texto",0,strlen($nombre))==$nombre) {

      echo "<tr><td>$nombre</td> <td>$min</td>   <td>$volumen</td></tr><br>";
      $volumenmedia+=intval($volumen);
    }

    if (substr("$texto",0,strlen($nombre2))==$nombre2) {

      echo "<tr><td>$nombre2</td> <td>$min</td>   <td>$volumen</td></tr><br>";
      $volumenmedia+=intval($volumen);

    }


  };
  $volumenmedia2=$volumenmedia/2;
  echo "</table>";
  echo "<br>Volumen media: $volumenmedia2<br>";
  echo "<br>PALABRA INTRODUCIDA: $nombre <br>";
  echo "<br>PALABRA INTRODUCIDA: $nombre2";
}

function consultaoperacionesbolsa ($fichero,$nombre,$valor){


foreach($fichero as $linea=>$texto) {
  if (substr("$texto",0,strlen($nombre))==$nombre) {

  $nombrevalor=substr("$texto",0,32);
  $ultimo=substr("$texto",32,8);
  $varia1=substr("$texto",40,8);
  $varia2=substr("$texto",48,8);
  $acano=substr("$texto",56,16);
  $max=substr("$texto",72,8);
  $min=substr("$texto",80,8);
  $vol=substr("$texto",88,16);
  $cap=substr("$texto",104,8);
  $hora=substr("$texto",112,5);
  if ($valor=='Ultimo') {
    return $ultimo;
  }elseif ($valor=='Variacion %') {
    return $varia1;
  }elseif ($valor=='Variacion') {
    return $varia2;
  }elseif ($valor=='AC % Anual') {
    return $acano;
  }elseif ($valor=='Maximo') {
    return $max;
  }elseif ($valor=='Minimo') {
    return $min;
  }elseif ($valor=='Volumen') {
    return $vol;
  }elseif ($valor=='Capitalizacion') {
    return $cap;
  }
};
}

}


?>
