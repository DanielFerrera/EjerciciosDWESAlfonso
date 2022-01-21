<?php
// echo $_POST['$nombre'];

if (isset($_POST['agregar'])) {
echo "SE HA PULSADO AGREGAR";
$nombre=$_POST['nombre'];
array_push($arraycesta,$nombre);
var_dump($arraycesta);
//creamos la setcookie
$nombre="cookie1";
echo "ARRAYCESTA: ";
if (isset($arraycesta)) {
  echo "existe";
}else {
  echo "no existe";
}
//escribimos la cookie con el array codificado
$contenido=json_encode($arraycesta);
setcookie($nombre,$contenido, time() + (86400 * 30), "/");
//mostramos el valor de la cookie descodificando
$datos=json_decode($_COOKIE[$nombre], true);
var_dump($datos);
print_r($_COOKIE);
}else{  echo "no se ha pulsado nada";
  // $arraycesta=array();
  // var_dump($arraycesta);
  // $contenido=json_encode($arraycesta);
  // setcookie($nombre,$contenido, time() + (86400 * 30), "/");
  // //mostramos el valor de la cookie descodificando
  // $datos=json_decode($_COOKIE[$nombre], true);
  var_dump($datos);
  print_r($_COOKIE);
    }
 ?>

 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nombre: <input type="text" name="nombre" value="">
  <input type="submit" value="Agregar Producto a la Cesta"  name="agregar">
</form>
