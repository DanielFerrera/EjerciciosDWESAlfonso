<HTML>
<HEAD> <TITLE> Ficheros </TITLE>
</HEAD>
<BODY>
<h1>Ficha de alumnos</h1>
<form name='mi_formulario' action='fichero2.php' method='post'>
Nombre: <input type='text' name='Nombre' value='' size=40><br><br>
Apellido1: <input type='text' name='Apellido1' value='' size=40><br><br>
Apellido2: <input type='text' name='Apellido2' value='' size=40><br><br>
Fecha Nacimiento: <input type='text' name='fechanac' value='' size=9><br><br>
Localidad: <input type='text' name='localidad' value='' size=26><br><br>
<input type="submit" value="Enviar">
<input type="reset" value="Borrar">
</FORM>
</BODY>
</HTML>
<?php
include '../funciones/seguridaddata.php';
$nombre= $apellido1 = $apellido2 = $fecha = $localidad= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nombre=test_input($_POST['Nombre']);
$apellido1=test_input($_POST['Apellido1']);
$apellido2=test_input($_POST['Apellido2']);
$fecha=test_input($_POST['fechanac']);
$localidad=test_input($_POST['localidad']);
}
  //creamos el fichero
  // echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
if (file_exists("alumnos2.txt")) {
  $fichero=fopen("alumnos2.txt","a");
  fwrite($fichero, $nombre."##");
  fwrite($fichero,$apellido1."##");
  fwrite($fichero,$apellido2."##");
$fecha1=explode("/",$fecha);
  if (checkdate($fecha1[0],$fecha1[1],$fecha1[2])==true) {
    fwrite($fichero,$fecha."##");
  }else{
    fwrite($fichero,"Fecha Errónea ##");
  }
  fwrite($fichero,$localidad."## \n");
 fclose($fichero);
}
if (!file_exists("alumnos2.txt")) {
  $fichero=fopen("alumnos2.txt","w");
  fwrite($fichero, $nombre."##");
  fwrite($fichero,$apellido1."##");
  fwrite($fichero,$apellido2."##");
$fecha1=explode("/",$fecha);
  if (checkdate($fecha1[0],$fecha1[1],$fecha1[2])==true) {
    fwrite($fichero,$fecha."##");
  }else{
    fwrite($fichero,"Fecha Errónea ##");
  }
  fwrite($fichero,$localidad."## \n");
 fclose($fichero);
}
