<?php
//saca el formulario del login
if(isset($_COOKIE['usuario'])){
require_once("../views/view_alqwelcome.phtml");
// si se envia el formulario
if($_SERVER["REQUEST_METHOD"] == "POST") {
  //se llama al fichero de funciones
  require_once("./models/funciones.php");
  //se crea la conexion a la base de datos, dentro de funciones
  $conexion=conexion();
  
}
}else{
    header("location: ./controller_login.php");
}

?>
