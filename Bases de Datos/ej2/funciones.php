
<?php
function crearconexion($servername, $username, $password, $dbname){
  // Create connection
  echo "Servidor: $servername, Usuario: $username, Contraseña: $password, Base de datos en uso: $dbname";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
      die("Conexion fallida: " . mysqli_connect_error());
  }
  return $conn;
}


function añadirempleado($dni,$nombre,$fechanac,$nombredepartamento,$conn){
  echo "</br>";
  // echo "Departamento escrito: $nombredepartamento";
  $sql1 = "SELECT nombre_d FROM departamento";
  $result = mysqli_query($conn, $sql1);
  $arraydepartamentos=array();
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      echo "NOMBRES DE DEPARTAMENTOS DE LA EMPRESA:</BR>";
      while($row = mysqli_fetch_assoc($result)) {
           echo "Nombre: <b>" . $row["nombre_d"]. "</b><br>";
           array_push($arraydepartamentos,$row["nombre_d"]);
      }
  } else {
      echo "0 results";
  }
  var_dump($arraydepartamentos);
  $tamaño=sizeof($arraydepartamentos);

  $mensaje="";
  for ($i=0; $i <$tamaño ; $i++) {
       if ($nombredepartamento==$arraydepartamentos[$i]) {
         $sql = "INSERT INTO empleado (dni,nombre_e,fec_nac,nombre_d) VALUES ('$dni','$nombre','$fechanac','$nombredepartamento')";
         $result = mysqli_query($conn, $sql);
         $mensaje="Empleado añadido"."<br>";
       }else {
         $mensaje="Error, departamento inexistente";
       }

}
echo "$mensaje";


  // if (mysqli_query($conn, $sql)) {
  //     echo "Nuevo departamento creado correctamente";
  // } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }
}



function creardepartamento($nombredepartamento,$conn){
  echo "</br>";
  // echo "Departamento escrito: $nombredepartamento";
  $sql = "INSERT INTO departamento (nombre_d) VALUES ('$nombredepartamento')";
  $result = mysqli_query($conn, $sql);
  // if (mysqli_query($conn, $sql)) {
  //     echo "Nuevo departamento creado correctamente";
  // } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }
}

function mostrardepartamentos($conn){
  echo "</br>";
  $sql = "SELECT nombre_d FROM departamento";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      echo "NOMBRES DE DEPARTAMENTOS DE LA EMPRESA:</BR>";
      while($row = mysqli_fetch_assoc($result)) {
          echo "Nombre: <b>" . $row["nombre_d"]. "</b><br>";
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
           echo "Nombre: <b>" . $row['Tables_in_empleados1n']. "</b><br>";
      }
  } else {
      echo "0 results";
  }
}

function mostrarempleados($conn){
  echo "</br>";
  $sql = "SELECT dni, nombre_e, fec_nac, nombre_d FROM empleado";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      echo "EMPLEADOS:</br>";
      while($row = mysqli_fetch_assoc($result)) {
           echo "Dni: <b>" . $row['dni']. "</b><br>";
           echo "Nombre: <b>" . $row['nombre_e']. "</b><br>";
           echo "Fecha de nacimiento: <b>" . $row['fec_nac']. "</b><br>";
           echo "Nombre departamento: <b>" . $row['nombre_d']. "</b><br>";
           echo "</br>";
      }
  } else {
      echo "0 results";
  }
}


 ?>
