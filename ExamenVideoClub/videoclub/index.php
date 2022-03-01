<?php
//este es el index y muestra el controlador del login
//controller_login.php
if (isset($_COOKIE['usuario'])) {
  setcookie("usuario","",-1000,"/");
}
require_once("./controllers/controller_login.php");
 ?>
