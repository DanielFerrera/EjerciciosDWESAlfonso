<?php
//saca el formulario del login
if(isset($_COOKIE['usuario'])){
  //se llama al fichero de funciones
  require_once("../models/funciones.php");
  require_once("../db/db.php");
  $conexion=conexion();
  //sacar las peliculas con stock
  $desplegable=desplegablepeliculas($conexion);
  require_once("../views/view_alqpel.phtml");

  // si se envia el formulario
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['agregar'])){
    $pelicula=$_POST['pelicula'];
    if(!isset($_COOKIE['carrito'])){
      // $cookie=$_COOKIE['carrito'];
      $arraypelis=array();
      array_push($arraypelis,$pelicula);
      setcookie("carrito",json_encode($arraypelis),time()+(86400*30),"/");
      echo "Se ha añadido <b>$pelicula</b> a la cesta.";
    }
    else{
      $cookie=json_decode($_COOKIE['carrito'],true);
      array_push($cookie,$pelicula);
      setcookie("carrito",json_encode($cookie),time()+(86400*30),"/");
      echo "Se ha añadido <b>$pelicula</b> a la cesta.";
      mostrarcesta();
    }
  }

  if(isset($_POST['alquilar'])){
    $cookie=$_COOKIE['carrito'];
    $usuario=$_COOKIE['usuario'];
    $total=explode("#",$usuario);
    $idcliente=$total[0];
      mostrarcesta();
      agregarpeliculasacliente($idcliente,$cookie,$usuario,$conexion);
      setcookie("carrito","",time() - 3600,"/");
  }

  if(isset($_POST['vaciar'])){
    setcookie("carrito","",time() - 3600,"/");
    echo "La cesta ha sido vaciada correctamente";
  }

}
}else{
  header("location: ../../index.php");
}

?>
