<?php
function revisarparamentros($nombrecategoria){
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nombrecategoria=$_POST['nombrecategoria'];
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

//falta por hacer el max y sumar 10
function altaalmacen($nombrecategoria,$conexion){
  $contadorcategorias=0;
  try {
    $stmt = $conexion->prepare("SELECT ID_CATEGORIA,NOMBRE FROM categoria");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      $contadorcategorias++;
    }
    //contador=$contador+10; algo asi
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

    try {
      $contadorcategorias++;
      $idcategoria=$contadorcategorias;
      $idcategoria=str_pad($idcategoria, 3, '0', STR_PAD_LEFT);
      $idtotal='C-'.$idcategoria;
      $sql = "INSERT INTO categoria (ID_CATEGORIA,NOMBRE) VALUES ('$idtotal','$nombrecategoria')";
      $conexion->exec($sql);
      echo "<br>Nueva categoria creada correctamente: $nombrecategoria";
    }
    catch(PDOException $e)
    {
      echo "Error: ". $sql . "<br>" . $e->getMessage();
    }
}

 ?>
