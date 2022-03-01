<?php
//saca el formulario del login
if(isset($_COOKIE['usuario'])){
  //se llama al fichero de funciones
  require_once("../models/funciones.php");
  require_once("../db/db.php");
  $conexion=conexion();
  //sacar las peliculas con stock
  $usuario=$_COOKIE['usuario'];
  $desplegable=desplegabledevpeliculascliente($usuario,$conexion);
  require_once("../views/view_alqdev.phtml");

// si se envia el formulario
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['devolver'])){
    $pelicula=$_POST['rental'];
    $usuario=$_COOKIE['usuario'];
    $total=explode("#",$usuario);
    $idcliente=$total[0];
    devolverpelicula($pelicula,$idcliente,$conexion);
  }





}
}else{
    header("location: ../../index.php");
}

?>
