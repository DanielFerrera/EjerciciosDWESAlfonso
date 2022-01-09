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

// ---------------------------------

function mostrarcategorias($conexion){
  $arraycategorias=array();
  try {
    $stmt = $conexion->prepare("SELECT ID_CATEGORIA,NOMBRE FROM categoria");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      array_push($arraycategorias,$row["NOMBRE"]);
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $arraycategorias;
}

function altaproducto($nombrecategoria,$nombreproducto,$precio,$conexion){
//id del producto
$contadorproducto=0;
try {
  $stmt = $conexion->prepare("SELECT ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA FROM producto");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach($stmt->fetchAll() as $row) {
    $contadorproducto++;
  }
  $contadorproducto++;
  $idproducto=$contadorproducto;
  $idproducto=str_pad($idproducto, 4, '0', STR_PAD_LEFT);
  $idtotal='P'.$idproducto;
  //$idtotal es el id del nuevo producto
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
//nombre=$nombreproducto
//precio=$precio

//id_categoria tenemos que seleccionar la categoria y obtener su codigo
try {
  $stmt = $conexion->prepare("SELECT categoria.ID_CATEGORIA FROM categoria where categoria.nombre='$nombrecategoria'");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach($stmt->fetchAll() as $row) {
    $idcategoria=$row["ID_CATEGORIA"];
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

//INSERT DEL PRODUCTO
try {
    $stmt = $conexion->prepare("INSERT INTO producto (ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA) VALUES ('$idtotal','$nombreproducto','$precio','$idcategoria')");
    $stmt->execute();
    echo "</br>Producto añadido";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
}

// function altacategoria($nombrecategoria,$conexion){
//   $contadorcategorias=0;
//   try {
//     $stmt = $conexion->prepare("SELECT ID_CATEGORIA,NOMBRE FROM categoria");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     foreach($stmt->fetchAll() as $row) {
//       $contadorcategorias++;
//     }
//   }
//   catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
//   }
//     try {
//       $contadorcategorias++;
//       $idcategoria=$contadorcategorias;
//       $idcategoria=str_pad($idcategoria, 3, '0', STR_PAD_LEFT);
//       $idtotal='C-'.$idcategoria;
//       $sql = "INSERT INTO categoria (ID_CATEGORIA,NOMBRE) VALUES ('$idtotal','$nombrecategoria')";
//       $conexion->exec($sql);
//       echo "<br>Nueva categoria creada correctamente: $nombrecategoria";
//     }
//     catch(PDOException $e)
//     {
//       echo "Error: ". $sql . "<br>" . $e->getMessage();
//     }
// }


 ?>
