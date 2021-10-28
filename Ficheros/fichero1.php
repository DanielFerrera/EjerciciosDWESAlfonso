<?php

include '../funciones/seguridaddata.php';
//creamos el fichero
$fichero=fopen("ficheroalumnos.txt","w");
// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
$nombre= $apellido1 = $apellido2 = $fecha = $localidad= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre=test_input($_POST['Nombre']);
  $apellido1=test_input($_POST['Apellido1']);
  $apellido2=test_input($_POST['Apellido2']);
  $fecha=test_input($_POST['fechanac']);
  $localidad=test_input($_POST['localidad']);
}
echo "Nombre: ";
  fwrite($fichero,"Nombre: ".rellenar($nombre)." \n");
      echo rellenar($nombre);
  echo "<br>";

echo "Apellido1: ";

  fwrite($fichero,"Apellido1: ".rellenar($apellido1)." \n");
      echo rellenar($apellido1);
  echo "<br>";

echo "Apellido2: ";

  fwrite($fichero,"Apellido2: ".rellenar($apellido2)." \n");
    echo rellenar($apellido2);
  echo "<br>";

echo "Fecha Nacimiento: ";
$fecha1=explode("/",$fecha);
  if (checkdate($fecha1[0],$fecha1[1],$fecha1[2])==true) {
    fwrite($fichero,"Fecha Nacimiento:". rellenar1($fecha) ."\n");
      echo rellenar1($fecha);
    echo "<br>";
  }else{
    echo "<br>";
    fwrite($fichero,"Fecha Nacimiento:  Errónea \n");
  }


echo "Localidad: ";

  fwrite($fichero,"Localidad: ".rellenar2($localidad)." \n");
  echo rellenar2($localidad);
  echo "<br>";


// while(!feof($fichero)){
// $z=fgets($fichero,40);
// echo $z,"<br>";
// }
fclose($fichero);

// echo str_pad($nombre, 40, " ", STR_PAD_LEFT);




?>
