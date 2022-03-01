<?php
//saca el formulario del login
if(isset($_COOKIE['usuario'])){
  //se llama al fichero de funciones
  require_once("../models/funciones.php");
  require_once("../db/db.php");
  $conexion=conexion();
  //sacar las peliculas alquiladas del cliente
  $cookie=$_COOKIE['usuario'];
  $todacookie=explode("#",$cookie);
  $idcliente=$todacookie[0];
  $desplegable=desplegableconsultapeliculascliente($idcliente,$conexion);
  require_once("../views/view_alqcons.phtml");

  if(isset($_POST['agregar'])){
    echo "polla</br>";

  }




}else{
    header("location: ./controller_login.php");
}

?>
