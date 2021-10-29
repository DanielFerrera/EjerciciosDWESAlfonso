<?php

echo "<h1>Operaciones Sistemas Ficheros</h1>";
$origen=$_POST['origen'];$destino=$_POST['destino'];
$eleccion=$_POST['op'];


if (empty($origen)) {
  echo "No se ha introducido ruta origen </br>";
}//del if

if (empty($destino)) {
  echo "No se ha introducido ruta destino</br>";
}//del if

if (!empty($eleccion)) {
  if ($eleccion=='copiar') {
    echo copiar($origen,$destino);
  }elseif ($eleccion=='renombrar') {
    echo copiar($origen,$destino);
  }elseif ($eleccion=='borrar') {
    echo borrar($origen,$destino);
  }else {
    echo "No se ha marcado ninguna opcion";
  }
}

function copiar($origen,$destino){
  echo "Se va a proceder a COPIAR</br>";
  echo "Ruta Origen: $origen </br> Ruta Destino: $destino";
  if (!file_exists($destino))
  {
	  $dir=substr($destino,0,strpos($destino,"\\"));
    echo $dir;
	  mkdir($dir,0777,true);
  }
	  if (!copy($origen, $destino)) {
			print("Error en el proceso de copia<br>\n");
		  }else{
			print "<br>Fichero copiado con exito
			Copiado: $origen -> $destino<br>
			";

  }
}

function renombrar($origen,$destino){
  echo "Se va a proceder a RENOMBRAR</br>";
  echo "Ruta Origen: $origen </br> Ruta Destino: $destino";

  if (!rename($origen, $destino)) {
    print("Error en el proceso de renombrado<br>");
  }else{
    print "<br>Fichero renombrado con exito <br>
    Conversión: $origen -> $destino<br>";
  }
}

function borrar($origen,$destino){
  echo "Se va a proceder a BORRAR</br>";
  echo "Ruta Origen: $origen </br>";
  if (file_exists($origen)) {
    echo "SE VA A BORRAR: $origen </br>";
    unlink($origen);
    echo "BORRADO CON EXITO -> $origen </br>";
  }else{
    echo "No existe ese fichero";
  }

}



?>
