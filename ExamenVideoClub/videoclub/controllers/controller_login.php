<?php
//este es el controller_login.php
//muestro el formulario del login view_login.phtml
require_once("./views/view_login.phtml");
require_once("./db/db.php");
require_once("./models/funciones.php");
$conexion=conexion();
if(isset($_POST['submit'])){//Si no se ha pulsado el boton de login cierra sesión
  $usuario=$_POST['usuario'];
  $clave=$_POST['clave'];
          if(isset($usuario) && isset($clave))
    {//Si se han rellenado los campos del login
        $respuesta = obteneridusuario($conexion,$usuario,$clave);
              if($respuesta->rowCount() > 0)
      {
        $email=$_POST['usuario'];
        $clave=$_POST['clave'];
        //proceso para hacer la cookie, valores que iran en la cookie
        $nombrecliente=hacercookie2($conexion,$email,$clave)[0];
        $apellidocliente=hacercookie2($conexion,$email,$clave)[1];
        $emailcliente=hacercookie2($conexion,$email,$clave)[2];
        $idcliente=hacercookie2($conexion,$email,$clave)[3];
        //valor completo de la cookie
        $cookie=$idcliente."#".$nombrecliente."#".$apellidocliente."#".$emailcliente;
        setcookie("usuario",$cookie,time()+(86400*30),"/");
        // header("location: ./views/view_alqwelcome.phtml");
        header("location: ./controllers/controller_aqlwelcome.php");
              }
      else{
                  echo "No existe ningun email con esa contrase&ntilde;a.";
        }
          }
    else
    {
              if(!isset($_POST['usuario']))
      {
                  echo "No se ha proporcionado un usuario!";
              }
              if(!isset($_POST['clave']))
      {
                  echo "No se ha proporcionado una contrase&ntilde;a!";
              }
    }
        }

 ?>
