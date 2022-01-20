<?php
session_start();
?>
<html>
<head>
<title>Pagina 2</title>
</head>
<body  style="background-color:#85C9DC;">
<?php
//Fichero de funciones
include 'funciones.php';

if(isset($_POST['nombre']) && isset($_POST['contraseña'])){
//Parametros
//Sesiones
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['contraseña'] = $_POST['contraseña'];
$nombre=$_SESSION['nombre']; $contraseña=$_SESSION['contraseña'];

//Parametros a pasar
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";

//Creamos la conexion
$conexion=crearconexionpdo($servername, $username, $password, $dbname);

//Funcion para comprobar los datos introducidos
comprobarusuarioycontra($conexion,$nombre,$contraseña);
}else{
if(isset($nombre)){
  echo "Has iniciado sesion como: <b>".$nombre ."</b> con contraseña: <b>".$contraseña."</b>";
  echo "<p><a href='comlogincli.php'>Cerrar Sesion</a></p>";
}else{
echo "Acceso Restringido debes hacer Login con tu usuario";
echo "<br><a href='comlogincli.php'>Volver a pagina Login</a>";
}
}
?>
</body>
</html>
