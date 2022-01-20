<?php


        //creamos el array del carrito
        $arraycesta=array();
        var_dump($arraycesta);
if (isset($_POST['agregar'])) {
//INTRODUCIMOS LAS FUNCIONES

//AÑADIMOS PARAMETROS
$nif=$_POST['nif'];
$producto=$_POST['producto'];
$cantidad=$_POST['cantidad'];

array_push($arraycesta,$cantidad);
var_dump($arraycesta);
$nombre="CARRITO";
$caca=json_encode($arraycesta);
$decodificado=json_decode($caca);
for ($i=0; $i <count($decodificado) ; $i++) {
echo $decodificado[$i]." + ";
}
setcookie($nombre, $caca, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
var_dump($_COOKIE);
//FUNCIONES
/// compra($nif,$producto,$cantidad,$conexion);
echo $_COOKIE[$nombre];
array_push($arraycesta,$_COOKIE[$nombre]);

// agregarproductoacesta($arraycesta,$nif,$producto,$cantidad);
}

//cerrar conexion
$conexion=null;
echo "<a href='comprocli.php'> Volver a la anterior</a>";
?>
