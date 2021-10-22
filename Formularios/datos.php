<?php
// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
echo  "<h1>Datos Alumnos </h1><br>";
$sexo=0;
if (!empty($_POST['sexo'])) {
if (!empty($_POST['nombre'])) {
  if (!empty($_POST['email'])) {
echo "<table border=2>";
echo "<tr><b><td>Nombre</td><td>Apellidos</td><td>Email</td><td>Sexo</td></b></tr>";
echo "<tr><b><td>".($_POST['nombre'])."</td><td>".($_POST['apellido1'])." ".($_POST['apellido2']).
"</td><td>".($_POST['email'])."</td><td>".($_POST['sexo'])."</td></b></tr>";
echo "</table>";
}else {
  echo "<table border=2>";
  echo "<tr><b><td>Nombre</td><td>Apellidos</td><td>Email</td><td>Sexo</td></b></tr>";
  echo "<tr><b><td>".($_POST['nombre'])."</td><td>".($_POST['apellido1'])." ".($_POST['apellido2']).
  "</td><td>"."*Campo Obligatorio"."</td><td>".($_POST['sexo'])."</td></b></tr>";
  echo "</table>";
}
}else {
  echo "<table border=2>";
  echo "<tr><b><td>Nombre</td><td>Apellidos</td><td>Email</td><td>Sexo</td></b></tr>";
  echo "<tr><b><td>"."*Campo Obligatorio"."</td><td>".($_POST['apellido1'])." ".($_POST['apellido2']).
  "</td><td>".($_POST['email'])."</td><td>".($_POST['sexo'])."</td></b></tr>";
  echo "</table>";

}
}else{
  echo "<table border=2>";
  echo "<tr><b><td>Nombre</td><td>Apellidos</td><td>Email</td><td>Sexo</td></b></tr>";
  echo "<tr><b><td>".($_POST['nombre'])."</td><td>".($_POST['apellido1'])." ".($_POST['apellido2']).
  "</td><td>".($_POST['email'])."</td><td>"."*Campo Obligatorio"."</td></b></tr>";
  echo "</table>";
}


?>
