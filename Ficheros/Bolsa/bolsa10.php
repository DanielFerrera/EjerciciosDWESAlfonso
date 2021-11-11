<?php

include 'funciones_bolsa.php';
echo "<h1>Consulta Operaciones Bolsa</h1>";
$z=file('ibex35.txt');
valoresextremos($z);

?>
