<?php

include '../funciones/seguridaddata.php';
//creamos el fichero

// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
$fichero1=$num1=$num2=$fich=$lin=$prim= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fichero1=test_input($_POST['Nombre']);
  $lin=test_input($_POST['op']=='linea');
  $prim=test_input($_POST['op']=='prim');
    $fich=test_input($_POST['op']=='fich');
  $num1=test_input($_POST['num1']);
    $num2=test_input($_POST['num2']);
}
$z=file($fichero1);

if (!empty($_POST['op'])) {
  if ($fich) {
    foreach($z as $linea=>$texto) {
    	echo $texto."<br>";
    };
  }elseif ($lin){

    foreach($z as $linea=>$texto) {
      if ($linea==$num1) {
            echo "Linea: ",$linea," Texto: ",$texto,"<br>";
      }

    };
  }elseif ($prim) {

    foreach($z as $linea=>$texto) {
if ($linea<=$num2) {



            echo "Linea: ",$linea," Texto: ",$texto,"<br>";

}
    };

}
}else{
  echo "No se ha marcado ninguna operacion";
}
// foreach($z as $linea=>$texto) {
//   echo "Linea: ",$linea," Texto: ",$texto,"<br>";
// };

// echo "Nombre: ";
//   fwrite($fichero,"Nombre: ".rellenar($nombre)." \n");
//       echo rellenar($nombre);
//   echo "<br>";


// echo str_pad($nombre, 40, " ", STR_PAD_LEFT);




?>
