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
		<div class="card-header">Menú Usuario - CONSULTA ALQUILERES </div>
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
			 Fecha Desde: <input type='date' name='fechadesde' value='' size=10 placeholder="fechadesde" class="form-control">
			 Fecha Hasta: <input type='date' name='fechahasta' value='' size=10 placeholder="fechahasta" class="form-control"><br><br>

		<div>
			<input type="submit" value="Consultar" name="consultar" class="btn btn-warning disabled">

			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">


		</div>
	</form>
	<!-- FIN DEL FORMULARIO -->
  <BR><a href="view_movwelcome.php">Volver al Menú</a>
  <BR><a href="view_formulario.php">Cerrar Sesión</a>
  </body>
</html>
<?php
echo "</br>";
include_once "../models/funciones.php";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="movilmad";
$conexion=crearconexion($servername, $username, $password, $dbname);

if (isset($_POST['consultar'])) {
  $fechadesde=$_POST['fechadesde'];
  $fechahasta=$_POST['fechahasta'];
  if (empty($fechadesde) || empty($fechahasta)) {
    echo "Se deben introducir fechas";
  }else {
    // echo "$fechadesde";
    // echo "$fechahasta";
    $idclienteobtenida=mostraralquileresvehiculos($idcliente,$fechadesde,$fechahasta,$conexion)[0];
    $matriculaobtenida=mostraralquileresvehiculos($idcliente,$fechadesde,$fechahasta,$conexion)[1];
    $fecha_alquilerobtenido=mostraralquileresvehiculos($idcliente,$fechadesde,$fechahasta,$conexion)[2];

  echo "El cliente: $idclienteobtenida alquiló el vehiculo con matricula: $matriculaobtenida en la fecha: $fecha_alquilerobtenido</br>";

  }
}
 ?>
