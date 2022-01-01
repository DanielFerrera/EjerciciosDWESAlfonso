<?php
function revisarparamentros($localidad){
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $localidad=$_POST['localidad'];
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

function mostraralmacenes($conexion){
  $arrayproductos=array();
  try {
    $stmt = $conexion->prepare("SELECT NUM_ALMACEN, LOCALIDAD FROM almacen");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      $total=$row["NUM_ALMACEN"]."-".$row["LOCALIDAD"];
      array_push($arrayproductos,$total);
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $arrayproductos;
}


function mirarproductoenalmacen($digito,$conexion){
  try {
    $stmt1 = $conexion->prepare("SELECT NUM_ALMACEN, ID_PRODUCTO, CANTIDAD FROM almacena WHERE NUM_ALMACEN='$digito'");
    $stmt1->execute();
    $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt1->fetchAll() as $row) {
      $numalmacen=$row["NUM_ALMACEN"];
      $id=$row["ID_PRODUCTO"];
      $cantidad=$row["CANTIDAD"];
      echo "</br>Hay $cantidad unidades del producto $id";
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}



 ?>
