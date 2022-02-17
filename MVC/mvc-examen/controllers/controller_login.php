<?php
require_once ("./views/view_formulario.php");

include_once "./models/funciones.php";

if(isset($_POST['email']) && isset($_POST['password'])){

  $servername="localhost"; $username="root"; $password="rootroot"; $dbname="movilmad";
  $conexion=crearconexion($servername, $username, $password, $dbname);
  //AÑADIMOS PARAMETROS
  $email=$_POST['email'];
  $password=$_POST['password'];

  //validamos los parametros introducidos para comprobar si son correctos
  $nombrecliente=validar($email,$password,$conexion)[1];

  $idcliente=validar($email,$password,$conexion)[0];
  //apellido
  $apellidocliente=validar($email,$password,$conexion)[2];

  if ($idcliente!="0"){
    echo "$idcliente";
  $cookie_name = "usuario";
  //creamos la cookie: nombrecliente+idcliente
  $cookie_value = "$idcliente "."$apellidocliente "."$nombrecliente";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
    header("Location:./views/view_movwelcome.php");
 }else {//si es incorrecto
   header("Location:index.php");
    }
}

// else {// si no se pone nada, se accede directamente
//     echo "<br />Acceso Restringido debes hacer Login con tu usuario.";
//   }

?>
