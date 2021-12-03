<?php
function revisarparamentros($dni){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dni = test_input($dni);
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

function mostrarDNItablaempleado($conexion){
  $arraydnis=array();
  try {
    $stmt = $conexion->prepare("SELECT dni FROM empleado");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      // echo "Cod_dpto: <b>" . $row["cod_dpto"]."</b> Nombre: <b>".$row["nombre_dpto"]."</b><br>";
      array_push($arraydnis,$row["dni"]);
    }
    // var_dump($arraydepartamentos);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $arraydnis;
}


function introduciremple_depart($dni,$fecha,$nombredept,$conexion){
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

function actualizartablaemple_departfechafin($dni,$nombredept,$conexion){
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
    //update
    $fechafin=date('Y-m-d');
    echo "</br>";
    try {
        $stmt = $conexion->prepare("UPDATE emple_depart set fecha_fin='$fechafin' where dni='$dni'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
        $fechainicio=$fechafin;
        try {
          $stmt = $conexion->prepare("INSERT INTO emple_depart (dni,cod_dpto,fecha_ini) VALUES ('$dni','$codigodepartamento','$fechainicio')");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            }
        catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            }
}
?>
