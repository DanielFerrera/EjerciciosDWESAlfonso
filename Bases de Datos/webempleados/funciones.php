
<?php


//funciones pdo
function crearconexionpdo($servername, $username, $password, $dbname){
  try {
    $conn = new PDO("mysql:host=$servername;dbname=empleadosnnprofe",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Conectado correctamente";
  }
  catch(PDOException $e)
  {
    echo "Conexion fallida: " . $e->getMessage();
  }
}

function creardepartamentopdo($nombredept,$conexion,$servername,$dbname,$username,$password){
  //miramos si el departamento ya existe con ese mismo nombre
  $arraydepartamentos=array();
  //contamos primero cuantos departamentos hay ya creados
  $arraycontadordepartamentos=0;
  try {
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conexion->prepare("SELECT cod_dpto,nombre_dpto FROM departamento");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<br><br><b><u>DEPARTAMENTOS</u></b><br>";
    foreach($stmt->fetchAll() as $row) {
      echo "Cod_dpto: <b>" . $row["cod_dpto"]."</b> Nombre: <b>".$row["nombre_dpto"]."</b><br>";
      array_push($arraydepartamentos,$row["nombre_dpto"]);
      $arraycontadordepartamentos++;
    }
    var_dump($arraydepartamentos);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "Hay <b>$arraycontadordepartamentos departamentos</b> creados<br>";
  //introducimos el departamento en la base de datos

  //recorremos con for-each el array de departamentos y miramos si el introducido es igual
  //en caso de que sea igual sacaremos error
  //en caso de que no, realizaremos el INSERT
  var_dump($nombredept);
  $seescribe=false;
  foreach ($arraydepartamentos as $key) {
    if ($key==$nombredept) {
      echo "Departamento repetido";
      $seescribe==false;
    }else{
      $seescribe==true;
    }
  }

  if ($seescribe=true) {
    //si ya hay departamentos creados entonces que le sume 1 al contador
    try {
      $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //sumamos uno por que vamos a introducir un departamento
      $arraycontadordepartamentos++;
      $codigodepartamento=$arraycontadordepartamentos;
      $codigodepartamento=str_pad($codigodepartamento, 3, '0', STR_PAD_LEFT);
      $codigodepartamento=str_pad($codigodepartamento,4,'D',STR_PAD_LEFT);
      // echo "$codigodepartamento";
      $sql = "INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES ('$codigodepartamento','$nombredept')";
      $conexion->exec($sql);
      echo "<br>Nuevo departamento creado correctamente";
    }
    catch(PDOException $e)
    {
      echo "Error: ". $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
  }

}

//funciones mysqli
function crearconexion($servername, $username, $password, $dbname){
  // Create connection
  echo "Servidor: $servername, Usuario: $username, Contraseña: $password, Base de datos en uso: $dbname";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
  }
  return $conn;
}

function creardepartamento($nombredepartamento,$conn){
  echo "</br>";
  $sql = "INSERT INTO departamento (nombre_d) VALUES ('$nombredepartamento')";
  $result = mysqli_query($conn, $sql);
}

function mostrardepartamentos($conn){
  echo "</br>";
  $sql = "SELECT nombre_d FROM departamento";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "NOMBRES DE DEPARTAMENTOS DE LA EMPRESA:</BR>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "Nombre:<b>" . $row["nombre_d"]. "</b><br>";
    }
  } else {
    echo "0 results";
  }
}

function mostrartablas($conn){
  echo "</br>";
  $sql = "show tables";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "TABLAS DE LA BASE DE DATOS:</br>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "Nombre: <b>" . $row['Tables_in_empleadosnn']. "</b><br>";
    }
  } else {
    echo "0 results";
  }
}

function mostrarempleados($conn){
  echo "</br>";
  $sql = "SELECT dni, nombre_e, fec_nac FROM empleado";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "EMPLEADOS:</br>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "Dni: <b>" . $row['dni']. "</b><br>";
      echo "Nombre: <b>" . $row['nombre_e']. "</b><br>";
      echo "Fecha de nacimiento: <b>" . $row['fec_nac']. "</b><br>";
      echo "</br>";
    }
  } else {
    echo "0 results";
  }
}


?>
