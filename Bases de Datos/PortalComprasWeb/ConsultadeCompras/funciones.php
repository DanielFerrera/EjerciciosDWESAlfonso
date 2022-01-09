<?php
function revisarparamentros($nif){
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nif=$_POST['nif'];
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

function mostrarnifclientes($conexion){
  $arraynif=array();
  try {
    $stmt = $conexion->prepare("SELECT NIF FROM cliente");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      $total=$row["NIF"];
      array_push($arraynif,$total);
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $arraynif;
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

function mostrarcompras($nif,$fechainicio,$fechafin,$conexion){
  //contador de compras
  $cont=0:
  try {
    $stmt = $conexion->prepare("SELECT ID_PRODUCTO FROM compra WHERE NIF='$nif' AND FECHA_COMPRA BETWEEN '$fechainicio' AND '$fechafin'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "</br>";
    foreach($stmt->fetchAll() as $row) {
      $id=$row["ID_PRODUCTO"];
      $cont++;
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  try {
    $stmt1 = $conexion->prepare("SELECT ID_PRODUCTO,NOMBRE,PRECIO FROM producto WHERE ID_PRODUCTO='$id'");
    $stmt1->execute();
    $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    echo "</br>";
    foreach($stmt1->fetchAll() as $row) {
      $id=$row["ID_PRODUCTO"];
      $nombre=$row["UNIDADES"];
      $precio=$row["PRECIO"];
      echo "</br>Compra: Producto-$id con nombre: $nombre y precio: $precio";
    }
    echo "Cantidad total de productos comprados: $cont";
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}


 ?>
