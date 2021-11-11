<?php

include 'funciones_bolsa.php';
echo "<h1>Consulta Operaciones Bolsa</h1>";
$z=file('ibex35.txt');
$elegido=$_POST['elegido'];
echo "  $elegido:  <input type='text' name='valor' value=".consultaoperacionesbolsa2($z,$elegido)."> <br>";

?>
<form name='mi_formulario' action='bolsa9.html' method='post'>
  <input type="submit" value="Realizar otra consulta">

</FORM>
