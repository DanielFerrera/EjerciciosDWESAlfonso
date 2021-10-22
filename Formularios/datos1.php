<?php
//creamos el fichero para escribir y leer
$f1=fopen("datos.txt","w+");
$nombre=($_POST['nombre']).",";$apellido1=($_POST['apellido1']).",";$apellido2=($_POST['apellido2']).",";
$email=($_POST['email']).",";;$campo0="Campo Vacio".",";
//............................................................................................................
echo "<HTML>
<HEAD> <TITLE> FORMULARIO BASE </TITLE>
</HEAD>
<BODY>
<h1>Datos Alumnos</h1>
<form name='mi_formulario'action='datos1.php' method='post'>
Nombre: <input type='text' name='nombre' value='' size=15 >";

if (empty($_POST['nombre'])) {
echo " *Campo Obligatorio";
  fwrite($f1,$campo0);
}else{
  fwrite($f1,$nombre);
}
echo "<br><br>
Apellido1: <input type='text' name='apellido1' value='' size=15><br><br>
Apellido2: <input type='text' name='apellido2' value='' size=15><br><br>
Email: <input type='text' name='email' value='' size=15 >";
if (empty($_POST['apellido1'])) {
echo " *Campo Obligatorio";
  fwrite($f1,$campo0);
}else{
  fwrite($f1,$apellido1);
}
if (empty($_POST['apellido2'])) {
echo " *Campo Obligatorio";
  fwrite($f1,$campo0);
}else{
  fwrite($f1,$apellido2);
}
if (empty($_POST['email'])) {
echo " *Campo Obligatorio";
  fwrite($f1,$campo0);
}else{
  fwrite($f1,$email);
}
echo "<br><br>
Sexo:
<input type='radio' name='sexo' value='M'>Mujer
  <input type='radio' name='sexo' value='H'>Hombre
";
if (empty($_POST['sexo'])) {
  echo " *Campo Obligatorio.";
  fwrite($f1,$campo0);
}else{
  fwrite($f1,$sexo);
}
echo "<br><br>
<br><br>
<input type='submit' value='Enviar'>
<input type='reset' value='Borrar'>
</FORM>

</BODY>
</HTML>";

 ?>
