<?php
function revisarparamentros($dni, $nombre, $apellidos, $fecha, $salario){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dni = test_input($dni);
  $nombre = test_input($nombre);
  $apellidos = test_input($apellidos);
  $fecha = test_input($fecha);
  $salario = test_input($salario);
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

function creardepartamentopdo($nombredept,$conexion){
  //miramos si el departamento ya existe con ese mismo nombre
  //contamos primero cuantos departamentos hay ya creados
  $contadordepartamentos=0;
  try {
    $stmt = $conexion->prepare("SELECT cod_dpto,nombre_dpto FROM departamento");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      $contadordepartamentos++;
    }
    // var_dump($arraydepartamentos);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  // echo "<br>Hay <b>$contadordepartamentos departamentos</b> creados en la tabla al inicio";
  //introducimos el departamento en la base de datos
  // var_dump($nombredept);
    //si ya hay departamentos creados entonces que le sume 1 al contador
    try {
      //sumamos uno por que vamos a introducir un departamento
      $contadordepartamentos++;
      $codigodepartamento=$contadordepartamentos;
      $codigodepartamento=str_pad($codigodepartamento, 3, '0', STR_PAD_LEFT);
      $codigodepartamento=str_pad($codigodepartamento,4,'D',STR_PAD_LEFT);
      // echo "$codigodepartamento";
      $sql = "INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES ('$codigodepartamento','$nombredept')";
      $conexion->exec($sql);
      // echo "<br>Cod_dpto: <b>" . $row["cod_dpto"]."</b> Nombre: <b>".$row["nombre_dpto"]."</b><br>";
      echo "<br>Nuevo departamento creado correctamente";
    }
    catch(PDOException $e)
    {
      echo "Error: ". $sql . "<br>" . $e->getMessage();
    }
    //Mostramos todos los departamentos
    mostrardepartamentospdo($nombredept,$contadordepartamentos,$conexion);
    $conn = null;
}

function mostrardepartamentospdo($conexion){
  $arraydepartamentos=array();
  try {
    $stmt = $conexion->prepare("SELECT cod_dpto,nombre_dpto FROM departamento");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      // echo "Cod_dpto: <b>" . $row["cod_dpto"]."</b> Nombre: <b>".$row["nombre_dpto"]."</b><br>";
      array_push($arraydepartamentos,$row["nombre_dpto"]);
    }
    // var_dump($arraydepartamentos);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $arraydepartamentos;
}


function introducirempleado($dni,$nombre,$apellidos,$fecha,$salario,$conexion){
  try {
      $stmt = $conexion->prepare("INSERT INTO empleado VALUES ('$dni','$nombre','$apellidos','$fecha','$salario')");
      $stmt->execute();
      echo "Nuevo empleado creado correctamente";
      }
  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
}

function introduciremple_depart($dni,$fecha,$nombredept,$conexion){
// echo "$dni,$fecha,$nombredept";
try {
    $stmt = $conexion->prepare("SELECT cod_dpto FROM departamento WHERE nombre_dpto='$nombredept'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      // echo "Cod_dpto: " . $row["cod_dpto"]."<br>";
      //AL IGUALAR OBTENGO EL CODIGO DEL DEPARTAMENTO PARA HACER EL INSERT
      $codigodepartamento=$row["cod_dpto"];
      // echo $codigodepartamento;
    }
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

//Insert de empleado en emple_depart
echo "$fecha";
try {
    $stmt = $conexion->prepare("INSERT INTO emple_depart (dni,cod_dpto,fecha_ini) VALUES ('$dni','$codigodepartamento','$fecha')");
    $stmt->execute();
    echo "</br>Empleado asociado en Emple_depart";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

}


?>
