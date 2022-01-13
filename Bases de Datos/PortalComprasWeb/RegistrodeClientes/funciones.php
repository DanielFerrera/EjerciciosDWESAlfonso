<?php
function revisarparamentros($nif,$nombre,$apellido,$cp,$direccion,$ciudad){
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nif=test_input($_POST['nif']);
    $nombre=test_input($_POST['nombre']);
    $apellido=test_input($_POST['apellido']);
    $cp=test_input($_POST['cp']);
    $direccion=test_input($_POST['direccion']);
    $ciudad=test_input($_POST['ciudad']);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function crearconexionpdo($servername, $username, $password, $dbname){
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Servidor: <b>$servername</b>, Usuario: <b>$username</b>, Base de datos en uso: <b>$dbname</b>";
    // echo "<br>Conectado correctamente";
    return $conn;
  }
  catch(PDOException $e)
  {
    echo "Conexion fallida: " . $e->getMessage();
  }
}

function cerrarconexion($conexion){
$conexion=null;
}

function validarnif($nif){
  if (empty($nif)) {
    echo "El NIF debe estar relleno";
  }else{
    $nifnumeros=substr($nif,0,8);
    $nifletra=substr($nif,8,1);
    // echo "$nifnumeros - $nifletra </br>";
    if (is_numeric($nifnumeros) && ctype_alpha($nifletra)) {
      return $nif;
    }
  }
}

function altacliente($clave,$nifvalidado,$nombre,$apellido,$cp,$direccion,$ciudad,$conexion){
      try {
        $sql = "INSERT INTO cliente VALUES ('$nifvalidado','$nombre','$apellido','$cp','$direccion','$ciudad','$clave')";
        $conexion->exec($sql);
        echo "<br>Nuevo cliente creado correctamente";
      }
      catch(PDOException $e)
      {
        if ($e->getCode() == 23000) { //duplicated primary key
      echo "Clave primaria duplicada, NIF";
    }elseif ($e->getCode() == 22001) { // data too long
      echo "NIF excede los parametros";
    }else {
      echo "Error: ". $sql . "<br>" . $e->getMessage();
    }
      }
  }

 ?>
