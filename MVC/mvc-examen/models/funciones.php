<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($email){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($email);
    // $cantidad = test_input($_POST["cantidad"]);
  }
}

function crearconexion($servername, $username, $password, $dbname){
  try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
  return $conn;
}


function validar($email,$password,$conexion){
  $idcliente="0";
  $nombrecliente="";
  $apellidocliente="";
  try {
    $stmt1 = $conexion->prepare("SELECT idcliente,nombre,apellido FROM rclientes WHERE email='$email'
      and apellido='$password' and fecha_alta is NOT NULL and fecha_baja is NULL");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt1->fetchAll() as $row) {
      $idcliente=$row["idcliente"];
      $nombrecliente=$row["nombre"];
      $apellidocliente=$row["apellido"];
    }
    echo "$idcliente";
  }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return [$idcliente,$nombrecliente,$apellidocliente];
  // return [$salida,$almacen];
}

function comprobarsaldo($nombrecliente,$idcliente,$conexion){
  // echo "$nombrecliente, $idcliente";
  // $nombrecliente=validar($email,$password,$conexion)[1];
  try {
    $stmt1 = $conexion->prepare("SELECT saldo FROM rclientes where nombre='$nombrecliente' and idcliente='$idcliente'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt1->fetchAll() as $row) {
      $saldovalido=$row["saldo"];
    }
  }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $saldovalido;
  // return [$salida,$almacen];
}

function cambiarestadocoche($matricula,$conexion){
  try {
    $stmt1 = $conexion->prepare("UPDATE rvehiculos SET disponible='N' WHERE matricula='$matricula'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

function alquilarvehiculo($idcliente,$matricula,$fecha,$conexion){
  try {
        $stmt2 = $conexion->prepare("INSERT INTO ralquileres (idcliente,matricula,fecha_alquiler) VALUES ('$idcliente','$matricula','$fecha')");
    $stmt2->execute();
    // set the resulting array to associative
    $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

function obtenertiempoalquiler($matricula,$conexion){
  try {
    $stmt1 = $conexion->prepare("SELECT fecha_alquiler FROM ralquileres where matricula='$matricula'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt1->fetchAll() as $row) {
      $fechaanterior=$row["fecha_alquiler"];
    }
  }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $fechaanterior;
}

function calculartiempodiferencia($fechaalquiler,$fechadevolucion,$conexion){

  try {
    $stmt1 = $conexion->prepare(" SELECT
  TIMESTAMPDIFF(MINUTE,'$fechaalquiler','$fechadevolucion')
  AS 'minutos'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt1->fetchAll() as $row) {
      $diferencia=$row['minutos'];
    }
  }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
   return $diferencia;
  }

  function obtenerpreciobasevehiculo($matricula,$conexion){
    try {
      $stmt1 = $conexion->prepare("SELECT preciobase FROM rvehiculos where matricula='$matricula'");
      $stmt1->execute();
      $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
      foreach($stmt1->fetchAll() as $row) {
        $preciobase=$row['preciobase'];
      }
    }//try
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
     return $preciobase;
      }

      function restarcliente($idcliente,$saldoarestar,$conexion){
        try {
          $stmt1 = $conexion->prepare("UPDATE rclientes SET saldo=saldo-'$saldoarestar' WHERE idcliente='$idcliente'");
          $stmt1->execute();
          $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
          }//try
        catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

function ponervehiculodisponible($matricula,$conexion){
  try {
    $stmt1 = $conexion->prepare("UPDATE rvehiculos SET disponible='S' WHERE matricula='$matricula'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

function mostraralquileresvehiculos($idcliente,$fechadesde,$fechahasta,$conexion){
// echo $idcliente;
$idcliente='';
$matricula='';
$fecha_alquiler='';
  try {
    //la del profe
    $stmt1 = $conexion->prepare("SELECT rvehiculos.matricula,idcliente,fecha_alquiler,fecha_alquiler,fecha_devolucion
 from rvehiculos,ralquileres
 where rvehiculos.matricula = ralquileres.matricula and
 idcliente='$idcliente' and
 Date_format(fecha_alquiler,'%d/%m/%Y')>=$fechadesde and
 Date_format(fecha_devolucion,'%d/%m/%Y')<= $fechahasta
order by ralquileres.matricula,ralquileres.fecha_alquiler;");

  //la mia
    // $stmt1 = $conexion->prepare("SELECT idcliente,matricula,fecha_alquiler FROM ralquileres where fecha_alquiler BETWEEN '$fechadesde' AND '$fechahasta' and idcliente='$idcliente'");

    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt1->fetchAll() as $row) {
      $idcliente=$row['idcliente'];
      $matricula=$row['rvehiculos.matricula'];
      $fecha_alquiler=$row['ralquileres.fecha_alquiler'];
    }
  }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
   return [$idcliente,$matricula,$fecha_alquiler];
}






 ?>
