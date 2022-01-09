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

function altaalmacen($localidad,$conexion){

  $maximo=0;
    try {
  $stmt = $conexion->prepare("SELECT MAX(NUM_ALMACEN) FROM almacen");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      $maximo=$row["MAX(NUM_ALMACEN)"];
    }
    echo "$maximo";
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

      try {
        $maximo=$maximo+10;
        $sql = "INSERT INTO almacen (NUM_ALMACEN,LOCALIDAD) VALUES ('$maximo','$localidad')";
        $conexion->exec($sql);
        echo "<br>Nueva almacen creado correctamente: $localidad";
      }
      catch(PDOException $e)
      {
        echo "Error: ". $sql . "<br>" . $e->getMessage();
      }
  }
  // // ESTO ES SIN SACAR EL MAXIMO
  // $numalmacenes=0;
  //   try {
  // $stmt = $conexion->prepare("SELECT NUM_ALMACEN FROM almacen");
  //   $stmt->execute();
  //   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  //   foreach($stmt->fetchAll() as $row) {
  //     $numalmacenes=$numalmacenes+10;
  //   }
  // }
  // catch(PDOException $e) {
  //   echo "Error: " . $e->getMessage();
  // }
 ?>
