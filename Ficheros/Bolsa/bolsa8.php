<?php

include 'funciones_bolsa.php';
  echo "<h1>Consulta Operaciones Bolsa</h1>";
$z=file('ibex35.txt');
  $valor=$_POST['valor'];
    $elegido=$_POST['elegido'];
    echo "  Valor:  <input type='text' name='valor' value='$valor'> <br>";
    echo "  $elegido:  <input type='text' name='valor' value=".consultaoperacionesbolsa($z,$valor,$elegido)."> <br>";
  ?>
    <form name='mi_formulario' action='bolsa8.html' method='post'>
      <input type="submit" value="Realizar otra consulta">

      </FORM>
