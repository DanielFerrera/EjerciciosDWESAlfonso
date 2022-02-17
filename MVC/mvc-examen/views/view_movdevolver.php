<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>

  <body>
    <h1>Servicio de ALQUILER DE E-CARS</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - DEVOLUCIÓN VEHÍCULO </div>
		<div class="card-body">

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">

    <B>Bienvenido/a:</B>
    <?php
    $cookie= "$_COOKIE[usuario]";
        // var_dump($cookie);
    $todo=explode(" ",$cookie);
    // var_dump($todo);
    $nombrecliente=$todo[0];
    $idcliente=$todo[1];
    $apellidocliente=$todo[2];
    echo "$nombrecliente $idcliente";
    ?>
  <BR><BR>
    <B>Identificador Cliente:</B>
    <?php
    echo "$apellidocliente";
     ?> <BR><BR>

			<B>Matricula/Marca/Modelo: </B>
      <select name="vehiculos" class="form-control">
        <?php   include_once "../models/funciones.php";
            //CREAMOS CONEXION
            $servername="localhost"; $username="root"; $password="rootroot"; $dbname="movilmad";
            $conexion=crearconexion($servername, $username, $password, $dbname);
            //CREAMOS EL DESPLEGABLE
            //SELECT
            $stmt = $conexion->prepare("SELECT matricula FROM ralquileres where fecha_devolucion IS NULL and idcliente='$idcliente'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
              foreach($stmt->fetchAll() as $row) {
                $matriculaobtenida=$row["matricula"];
              }
              var_dump($matriculaobtenida);

            $stmt1 = $conexion->prepare("SELECT matricula,marca,modelo FROM rvehiculos where disponible='N' and matricula='$matriculaobtenida'");
            $stmt1->execute();
            $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt1->fetchAll() as $row) {
              //OPTIONS
              ?>
              <option value="<?php echo $row['matricula']; ?>"> <?php echo $row['matricula']."/".$row['marca']."/".$row['modelo'];  ?> </option>';
              <?php
            }
            //CERRAMOS CONEXION
            $conexion=null;
            ?>
			</select>
		<BR><BR>
		<div>
			<input type="submit" value="Devolver Vehiculo" name="devolver" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>
	</form>
	<!-- FIN DEL FORMULARIO -->
  <BR><a href="view_movwelcome.php">Volver al Menú</a>
  <BR><a href="view_formulario.php">Cerrar Sesión</a>
  </body>
</html>
<?php
include_once "../models/funciones.php";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="movilmad";
$conexion=crearconexion($servername, $username, $password, $dbname);

if (isset($_POST['devolver'])) {
  $matricula=$_POST['vehiculos'];
  // echo "</br>".$matricula."</br>";
  // var_dump($matricula);
  //la primera seria la fecha de alquiler y la segunda la fecha de devolucion
  // select timediff($fechaalquiler,$fechaactual);
  // SELECT TIMEDIFF("2019-02-01 07:00:00", "2019-02-01 07:45:20");
   $fechaalquiler=obtenertiempoalquiler($matricula,$conexion);
  // echo "$tiempoanterior";
  $fechadevolucion=date("Y-m-d H:i:s");
  // echo "$fechaalquiler----------- $fechadevolucion-------";

  $diferencia=calculartiempodiferencia($fechaalquiler,$fechadevolucion,$conexion);
  // echo $diferencia;
  $preciobasevehiculo=obtenerpreciobasevehiculo($matricula,$conexion);
  // echo $preciobasevehiculo;
  //calcular preciobase minuto por tiempo transcurrido
  $saldoarestar=$diferencia*$preciobasevehiculo;
  echo "</br></br></br>".$saldoarestar;
  $restaralcliente=restarcliente($idcliente,$saldoarestar,$conexion);
  ponervehiculodisponible($matricula,$conexion);
}

 ?>
