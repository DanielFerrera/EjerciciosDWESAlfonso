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

function mostrarempleadosysumasalario($nombredept,$conexion){
  try {
    //datos totales
    $stmt1 = $conexion->prepare("SELECT empleado.nombre,empleado.salario FROM empleado,emple_depart,departamento WHERE emple_depart.dni=empleado.dni and departamento.cod_dpto=emple_depart.cod_dpto and departamento.nombre_dpto='$nombredept'");
    $stmt1->execute();
    $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    echo "<ul>";
    foreach($stmt1->fetchAll() as $row) {
      // echo "Cod_dpto: " . $row["cod_dpto"]."<br>";
      //obtengo el codigo para filtrar por codigo por que es la primary key
      echo"<li><b>Nombre</b> $row[nombre] - ";
      echo"<b>Salario:</b> $row[salario]</li>";
      // echo $codigodepartamento;
    }
    echo "</ul>";
    //suma de salarios
    $stmt2 = $conexion->prepare("SELECT SUM(salario) AS 'SUMASALARIOS' FROM empleado,emple_depart,departamento WHERE emple_depart.dni=empleado.dni and departamento.cod_dpto=emple_depart.cod_dpto and departamento.nombre_dpto='$nombredept'");
    $stmt2->execute();
    $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    echo "<ul>";
    foreach($stmt2->fetchAll() as $row) {
      // echo "Cod_dpto: " . $row["cod_dpto"]."<br>";
      //obtengo el codigo para filtrar por codigo por que es la primary key
      echo"<li><b>Suma total</b> $row[SUMASALARIOS]</li>";
      // echo $codigodepartamento;
    }
    echo "</ul>";
    }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
}


function mostrarsalarioempleadosdepartamento($nombredept,$conexion){
  //saco el codigo del departamento introducido
 $contadorsalario=0;
  try {
    $stmt = $conexion->prepare("SELECT cod_dpto FROM departamento WHERE nombre_dpto='$nombredept'");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach($stmt->fetchAll() as $row) {
        // echo "Cod_dpto: " . $row["cod_dpto"]."<br>";
        //obtengo el codigo para filtrar por codigo por que es la primary key
        $codigodepartamento=$row["cod_dpto"];
        // echo $codigodepartamento;
      }
      }
  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
      //busco todos los dnis que tengan ese codigo_dpto
      try {
        $stmt = $conexion->prepare("SELECT dni FROM emple_depart WHERE cod_dpto='$codigodepartamento'");
          $stmt->execute();
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach($stmt->fetchAll() as $row) {
            // echo "Cod_dpto: " . $row["cod_dpto"]."<br>";
            //obtengo el codigo para filtrar por codigo por que es la primary key
            $dni=$row["dni"];
            $stmt1 = $conexion->prepare("SELECT nombre,apellidos,salario FROM empleado WHERE dni='$dni'");
            $stmt1->execute();
            $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
            // echo "Empleados de <h3><b>$nombredept</b></h3>";
            echo "<ul>";
            foreach($stmt1->fetchAll() as $row) {
              $nombre=$row["nombre"];
              $apellidos=$row["apellidos"];
              $salario=$row["salario"];
              $contadorsalario=$salario+$contadorsalario;
              echo "<li><b>Nombre:</b> $nombre<b> Apellidos: </b>$apellidos <b>Salario</b> $salario</li>";
            }
            echo "</ul>";
          }
          echo "<b>Salario total</b> de $nombredept: $contadorsalario";

          }
      catch(PDOException $e)
          {
          echo "Error: " . $e->getMessage();
          }
}

?>
