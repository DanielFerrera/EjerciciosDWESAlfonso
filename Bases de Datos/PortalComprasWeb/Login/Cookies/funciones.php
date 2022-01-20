<?php
//Crear conexion
function crearconexionpdo($servername, $username, $password, $dbname){
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $conn;
  }
  catch(PDOException $e)
  {
    echo "Conexion fallida: " . $e->getMessage();
  }
}

function comprobarusuarioycontra($conexion,$nombre,$contraseña){
  try {
    $nif="";
   $stmt1 = $conexion->prepare("SELECT NOMBRE,CLAVE, NIF FROM cliente WHERE NOMBRE='$nombre' and CLAVE='$contraseña'");
   $stmt1->execute();
   $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
   foreach($stmt1->fetchAll() as $row) {
     $nombrecorrecto=$row["NOMBRE"];
     $clavecorrecta=$row["CLAVE"];
     $nif=$row["NIF"];
     echo "</br>Usuario: <b>$nombre</b> - Clave: <b>$contraseña</b> - NIF: <b>$nif</b>";
     echo "<p><a href='comlogincli.php'>Cerrar Sesion</a></p>";
   }

   //Cookies
     if ($nif=="") {
       echo "Usuario o contraseña incorrectos, no se ha creado la cookie";
       echo "<br><a href='comlogincli.php'>Volver a pagina Login</a>";
     }else {
       setcookie($nombrecorrecto,$clavecorrecta, time() + (86400 * 30), "/");
       var_dump($_COOKIE);
       echo "Cookie " . $nombrecorrecto . " definida!!!<br>";
       echo "Nombre de la cookie: " . $nombrecorrecto . " y su valor: ".$_COOKIE[$nombrecorrecto];
     }
  }
  catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
  }

}

 ?>
