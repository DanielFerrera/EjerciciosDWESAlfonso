<?php
function conexion(){
  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "iesvideo";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
  return $conn;
}
 ?>
