<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($nombre,$contra){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST["nombre"]);
    $contra = test_input($_POST["contra"]);
  }
}

function crearconexion($servername, $username, $password, $dbname){
  // Create connection

  try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
  catch(PDOException $e)
  {
    echo "Conexion fallida: " . $e->getMessage();
  }
  return $conn;
}



function contra($nombre,$contra,$conn){
  echo "</br>";
  $customername="0";
  try {
    $stmt1 = $conn->prepare("SELECT customerName FROM customers WHERE customerNumber='$nombre' and contactLastName='$contra'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt1->fetchAll() as $row) {
      $customername=$row["customerName"];
    }

  }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $customername;
}



?>
