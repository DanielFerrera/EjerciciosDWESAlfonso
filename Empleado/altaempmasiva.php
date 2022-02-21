<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Empleado</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

  <div class="container ">
    <!--Aplicacion-->
    <div class="card border-success mb-3" style="max-width: 30rem;">
      <div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
      <div class="card-body">

        <!-- INICIO DEL FORMULARIO -->
        <form action="" method="post">

          <B>Bienvenido/a:</B><BR><BR>
            Nombre del empleado:
            <input type="text" name="nombre" value=""><BR><BR>
              Apellido del empleado:
              <input type="text" name="apellido" value=""><BR><BR>
                Fecha de nacimiento:
                <input type="date" name="fechanac" value=""><BR><BR>
                  Género:
                  <select class="" name="genero">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                  </select><BR><BR>
                    Departamento del empleado:
                    <select name="departamento" >
                      <?php
                      include_once "funciones.php";
                      //CREAMOS CONEXION
                      $servername="localhost"; $username="root"; $password="rootroot"; $dbname="employees";
                      $conexion=crearconexion($servername, $username, $password, $dbname);
                      //CREAMOS EL DESPLEGABLE
                      //SELECT
                      $stmt = $conexion->prepare("SELECT dept_no,dept_name FROM departments");
                      $stmt->execute();
                      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                      foreach($stmt->fetchAll() as $row) {
                        //OPTIONS
                        ?>
                        <option value="<?php
                        $numdept=$row['dept_no'];
                        $nombredepartamento=$row['dept_name'];
                        echo $numdept; ?>"> <?php echo $nombredepartamento;  ?> </option>';
                        <?php
                      }
                      //CERRAMOS CONEXION
                      $conexion=null;
                      ?>
                    </select>
                    <BR><BR>
                      Salario:
                      <input type="number" name="salario" value="" min="0"><BR><BR>
                        Cargo:
                        <select name="cargo" >
                          <?php   include_once "funciones.php";
                          //CREAMOS CONEXION
                          $servername="localhost"; $username="root"; $password="rootroot"; $dbname="employees";
                          $conexion=crearconexion($servername, $username, $password, $dbname);
                          //CREAMOS EL DESPLEGABLE
                          //SELECT
                          $stmt = $conexion->prepare("SELECT DISTINCT title FROM titles");
                          $stmt->execute();
                          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                          foreach($stmt->fetchAll() as $row) {
                            //OPTIONS
                            ?>
                            <option value="<?php
                            $cargo=$row['title'];
                            echo $cargo; ?>"> <?php echo $cargo;  ?> </option>';
                            <?php
                          }
                          //CERRAMOS CONEXION
                          $conexion=null;
                          ?>
                        </select>
                        <div>
                        </br>
                          <input type="submit" value="Agregar Empleado" name="agregar" class="btn btn-warning disabled">
                          <input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
                        </div>
                      </form>
                      <!-- FIN DEL FORMULARIO -->
                    </body>
                    </html>
                    <?php

                    include_once "funciones.php";
                    $servername="localhost"; $username="root"; $password="rootroot"; $dbname="employees";
                    $conexion=crearconexion($servername, $username, $password, $dbname);
                    $nombrecookie="cesta";
                    //COOKIE Y PARAMETROS COOKIE

                    if (isset($_POST['agregar'])) {
                      $nombre=$_POST['nombre'];
                      $apellido=$_POST['apellido'];
                      $fechanac=$_POST['fechanac'];
                      $genero=$_POST['genero'];
                      $departamento=$_POST['departamento'];
                      // echo $departamento;
                      $salario=$_POST['salario'];
                      $cargo=$_POST['cargo'];

                      $total=$nombre."-".$apellido."-".$fechanac."-".$genero."-".$departamento."-".$salario."-".$cargo;
                      //dividimos las partes del vehiculo


                      $arraycesta = ["$nombre" => $total];
                      // var_dump($arraycesta);
                      $nombrecookie="cesta";
                      $contenido=json_encode($arraycesta);
                      setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
                      //mostramos el valor de la cookie descodificando
                      $datos=json_decode($_COOKIE[$nombrecookie], true);
                      // var_dump($datos);
                      foreach ($datos as $key => $value) {
                        // if ($key==$nombre) {
				                        // $total=$value+$cantidad;
				                        // $arraycesta[$key]=($total);
                        // }else {
                          $arraycesta[$key]=($value);
                          // var_dump($datos);
                           var_dump($datos);
                        //}
                        $contenido=json_encode($arraycesta);
                        setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");

                      }

                    //   foreach ($datos as $key => $value) {
                    //     if ($key==$vehiculoelegido) {
                    //         echo "Vehiculos agregados: $contenido";
                    //        // var_dump($datos);
                    //     }else {
                    //       $arraycesta[$key]=($value);
                    //       // var_dump($datos);
                    //        // var_dump($datos);
                    //     }
                    //     $contenido=json_encode($arraycesta);
                    //     setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
                    //   }
                    //
                    //   //CERRAMOS CONEXION
                    //   $conexion=null;
                    // }else {
                    //   $arraycesta = array();
                    // }//FIN DE AGREGAR PRODUCTO




                    // if (isset($_POST['alquilar'])) {
                    //
                    //   $datos=json_decode($_COOKIE[$nombrecookie], true);
                    //
                    //   var_dump($datos);
                    //   $saldo=comprobarsaldo($nombrecliente,$idcliente,$conexion);
                    //   if ($saldo>=10) {
                    //     $fecha= date("Y-m-d");
                    //     echo "Cliente con suficiente, se procede a la compra</br>";
                    //     foreach ($datos as $matricula => $value) {
                    //       //cambiamos el estado a los vehiculos
                    //       cambiarestadocoche($matricula,$conexion);
                    //       alquilarvehiculo($idcliente,$matricula,$fecha,$conexion);
                    //     }
                    //
                    //
                    //   }else {
                    //     echo "El usuario no tiene suficiente saldo en su tarjeta de socio";
                    //   }
                    //
                    //   $datos=json_decode($_COOKIE[$nombrecookie], true);
                    //   // var_dump($datos);
                    //   echo "<h2>VEHICULOS</h2>";
                    //   echo "<table style='border: 1px solid black;text-align:center;'>";
                    //   echo "<tr><td>Vehiculo alquilado</td><td>Cantidad</td></tr>";
                    //   foreach ($datos as $key => $value) {
                    //     echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
                    //   }
                    //   echo "</table>";
                    // }//FIN DE ALQUILAR PRODUCTO
                    //
                    //
                  }
                    if (isset($_POST['vaciar'])) {
                      $arrayvacio=array();
                      $contenido=json_encode($arrayvacio);
                      setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
                      echo "La cesta se ha vaciado correctamente";
                    }




                    ?>
