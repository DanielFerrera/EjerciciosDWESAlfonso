<?php
echo "<HTML>";
echo "<HEAD> <TITLE> FORMULARIO BASE </TITLE>";
echo "</HEAD>";
echo "<BODY><center>";
echo "<h1>CALCULADORA</h1>";
echo "<form name='mi_formulario' action='calculadora1.php' method='post'>";
echo "Dato 1: <input type='text' name='dato1' value='' size=15><br>";
echo "Dato 2: <input type='text' name='dato2' value='' size=15><br>";
echo "Operacion:<br>";
echo "<input type='radio' name='operacion' value='suma'>Suma<br>";
echo "<input type='radio' name='operacion' value='resta'>Resta<br>";
echo "<input type='radio' name='operacion' value='producto'>Producto<br>";
echo "<input type='radio' name='operacion' value='division'>Division<br>";
echo "<input type='submit' value='Enviar'>";
echo "<input type='reset' value='Borrar'>";
echo "</FORM>";
echo "</center>";

// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
// echo  "Dato 1: ".$_POST['dato1'],"<br>";
// echo  "Dato 2: ".$_POST['dato2'],"<br>";
$operacion=0;
if (!empty($_POST['operacion'])) {
  if ($_POST['operacion']=='suma') {
    $operacion=$_POST['dato1']+$_POST['dato2'];
    echo "Resultado=$operacion";
  }elseif ($_POST['operacion']=='resta') {
    $operacion=$_POST['dato1']-$_POST['dato2'];
    echo "Resultado=$operacion";
  }elseif ($_POST['operacion']=='division') {
    $operacion=$_POST['dato1']/$_POST['dato2'];
    echo "Resultado=$operacion";
  }elseif ($_POST['operacion']=='producto') {
    $operacion=$_POST['dato1']*$_POST['dato2'];
    echo "Resultado=$operacion";
  }
}else{
  echo "No se ha marcado ninguna operacion";
}


echo "</BODY>";
echo "</HTML>";
?>
