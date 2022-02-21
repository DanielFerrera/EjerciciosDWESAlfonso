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
                  <input type="submit" value="Crear Empleado" name="alta" class="btn btn-warning disabled">
                </div>
              </form>
              <!-- FIN DEL FORMULARIO -->
            </body>
            </html>
            <?php
            include_once "funciones.php";
            $servername="localhost"; $username="root"; $password="rootroot"; $dbname="employees";
            $conexion=crearconexion($servername, $username, $password, $dbname);

            if (isset($_POST['alta'])) {
              $nombre=$_POST['nombre'];
              $apellido=$_POST['apellido'];
              $fechanac=$_POST['fechanac'];
              $genero=$_POST['genero'];
              $departamento=$_POST['departamento'];
              // echo $departamento;
              $salario=$_POST['salario'];
              $cargo=$_POST['cargo'];
              //a funciones
              $numeroemp=insercciondentrodeempleados($nombre,$apellido,$fechanac,$genero,$conexion);
              insercciondentrodedepartamento($numeroemp,$departamento,$conexion);
              insercciondentrodecargos($numeroemp,$cargo,$conexion);

            }
