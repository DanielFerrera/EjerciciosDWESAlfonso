<?php
if (isset($_POST['enviar'])) {
  //INTRODUCIMOS LAS FUNCIONES
  require "funciones.php";
  //CREAMOS CONEXION
  echo "Creamos la conexion: ";
  $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
  $conexion=crearconexion($servername, $username, $password, $dbname);

  //AÑADIMOS PARAMETROS
  $producto=$_POST['producto'];
  $prodalmacen= explode("/",$producto);
  $prod=$prodalmacen[0];
  $alma=$prodalmacen[1];
  $cantidad=$_POST['cantidad'];

  //COOKIE Y PARAMETROS COOKIE
  $cookie= "$_COOKIE[usuario]";
  $nombrecontra= explode(" ",$cookie);
  $nombre=$nombrecontra[0];
  $contra=$nombrecontra[1];

  //FUNCIONES
  revisarparametros($producto,$cantidad);
  $nif=contra($nombre,$contra,$conexion);
  compra($nif,$producto,$cantidad,$conexion);

  //EJECUCIÓN
  $arraycesta = ["$prod" => $cantidad];
  //creamos la setcookie
  $nombrecookie="cesta";
  //escribimos la cookie con el array codificado
  $contenido=json_encode($arraycesta);
  setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
  //mostramos el valor de la cookie descodificando
  $datos=json_decode($_COOKIE[$nombrecookie], true);
  var_dump($datos);
  print_r($_COOKIE);
  //array asociativo
  foreach ($datos as $key => $value) {
    if ($key==$prod) {
      $total=$value+$cantidad;
      $arraycesta[$key]=($total);
    }else {
      $arraycesta[$key]=($value);
    }
  }
  $contenido=json_encode($arraycesta);
  setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
  echo "<br /><a href='comprocli.php'>Volver a comprar</a>";
  echo "<br /><a href='fin.php'>Comprobar pedido y aceptar</a>";
  //CERRAMOS CONEXION
  $conexion=null;
}else {
  echo "<br />Acceso Restringido debes hacer Login con tu usuario.";
  echo "<br /><br /><a href='../ej11-cookies/comlogincli.php'>Volver a pagina Login</a>";
  $arraycesta = array();
}
?>
