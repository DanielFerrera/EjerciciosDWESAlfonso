<?php
function verfichero($fichero){
  foreach($fichero as $linea=>$texto) {
	echo "Linea: ",$linea," Texto: ",$texto,"<br>";
  }
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

function consultaoperacionesbolsa2 ($fichero,$elegido){
  $totalvolumen=0;
  $totalcapital=0;
  foreach($fichero as $linea=>$texto) {
    $vol=intval(str_replace(".","",substr("$texto",88,16)));
    $cap=intval(str_replace(".","",substr("$texto",104,8)));
    if ($linea>=1) {
      $totalvolumen+=$vol;
    }
    if ($linea>=1) {
      $totalcapital+=$cap;
    }
  }
  $totalvolumen1=number_format($totalvolumen,3,",",".");
  $totalcapital1=number_format($totalcapital,3,",",".");
  if ($elegido=="Volumen") {
    return $totalvolumen1;
  }
  if ($elegido=="Capital") {
    return $totalcapital1;
  }
}

function valoresextremos($fichero){
  $mayorvol=0;
  $menorvol=999999999;
  $maxcap=0;
  $mincap=999999999;
  foreach($fichero as $linea=>$texto) {
    $nombrevalor=substr("$texto",0,32);
    $vol=intval(str_replace(".","",substr("$texto",88,16)));
    $cap=intval(str_replace(".","",substr("$texto",104,8)));
    if ($linea>=1) {
      //max vol
      if ($vol>$mayorvol) {
        $mayorvol=$vol;
      }
      //min vol
      if ($vol<$menorvol) {
        $menorvol=$vol;
      }
      //max cap
      if ($cap>$maxcap) {
        $maxcap=$cap;
      }
      //min cap
      if ($cap<$mincap) {
        $mincap=$cap;
      }
    }
}
$mayorvol1=number_format($mayorvol,3,",",".");
$menorvol1=number_format($menorvol,3,",",".");
$maxcap1=number_format($maxcap,3,",",".");
$mincap1=number_format($mincap,3,",",".");

$mayorvol2=str_replace(",000","",$mayorvol1);
$menorvol2=str_replace(",000","",$menorvol1);
$maxcap2=str_replace(",000","",$maxcap1);
$mincap2=str_replace(",000","",$mincap1);

foreach($fichero as $linea=>$texto) {
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
  if (substr("$texto",88,strlen($mayorvol2))==$mayorvol2) {
    echo "<B>MAYOR VOLUMEN</B></BR>";
    echo "<table border=1><tr><td>Empresa</td><td>Ultimo</td><td>Var %</td><td>Var.</td><td>Ac. Año </td><td>Max</td><td>Min</td><td>Vol</td><td>Cap</td><td>Fecha</td></tr>";
    echo "<tr><td>$nombrevalor</td><td>$ultimo</td><td>$varia1</td><td>$varia2</td><td>$acano</td><td>$max</td><td>$min</td><td><b>$vol</b></td><td>$cap</td><td>$hora</td></tr></br>";
    echo "</table></br>";
}
if (substr("$texto",88,strlen($menorvol2))==$menorvol2) {
  echo "<B>MENOR VOLUMEN</B></BR>";
  echo "<table border=1><tr><td>Empresa</td><td>Ultimo</td><td>Var %</td><td>Var.</td><td>Ac. Año </td><td>Max</td><td>Min</td><td>Vol</td><td>Cap</td><td>Fecha</td></tr>";
  echo "<tr><td>$nombrevalor</td><td>$ultimo</td><td>$varia1</td><td>$varia2</td><td>$acano</td><td>$max</td><td>$min</td><td><b>$vol</b></td><td>$cap</td><td>$hora</td></tr></br>";
  echo "</table></br>";
}
if (substr("$texto",104,strlen($maxcap2))==$maxcap2) {
  echo "<B>MAXIMA CAPITALIZACION</B></BR>";
  echo "<table border=1><tr><td>Empresa</td><td>Ultimo</td><td>Var %</td><td>Var.</td><td>Ac. Año </td><td>Max</td><td>Min</td><td>Vol</td><td>Cap</td><td>Fecha</td></tr>";
  echo "<tr><td>$nombrevalor</td><td>$ultimo</td><td>$varia1</td><td>$varia2</td><td>$acano</td><td>$max</td><td>$min</td><td>$vol</td><td><b>$cap</b></td><td>$hora</td></tr></br>";
  echo "</table></br>";
}
if (substr("$texto",104,strlen($mincap2))==$mincap2) {
  echo "<B>MINIMA CAPITALIZACION</B></BR>";
  echo "<table border=1><tr><td>Empresa</td><td>Ultimo</td><td>Var %</td><td>Var.</td><td>Ac. Año </td><td>Max</td><td>Min</td><td>Vol</td><td>Cap</td><td>Fecha</td></tr>";
  echo "<tr><td>$nombrevalor</td><td>$ultimo</td><td>$varia1</td><td>$varia2</td><td>$acano</td><td>$max</td><td>$min</td><td>$vol</td><td><b>$cap</b></td><td>$hora</td></tr></br>";
  echo "</table></br>";
}

}
}

?>
