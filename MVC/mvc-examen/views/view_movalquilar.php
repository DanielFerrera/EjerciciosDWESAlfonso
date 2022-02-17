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
		<div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
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
    echo "$apellidocliente $idcliente";

    ?>
  <BR><BR>
		<B>Identificador Cliente:</B>
    <?php
    echo "$nombrecliente";
     ?> <BR><BR>

		<B>Vehiculos disponibles en este momento:</B> <?php $fechaactual= date("Y-m-d H:i:s");  echo $fechaactual;?> <BR><BR>

			<B>Matricula/Marca/Modelo: </B><select name="vehiculos" class="form-control">

        <?php
         // require_once "models/funciones.php";
        require_once ("../models/funciones.php");

        require_once("../db/conexiondb.php");
      			//CREAMOS CONEXION
      			$servername="localhost"; $username="root"; $password="rootroot"; $dbname="movilmad";
      			$conexion=crearconexion($servername, $username, $password, $dbname);
      			//CREAMOS EL DESPLEGABLE
      			//SELECT
      			$stmt = $conexion->prepare("SELECT matricula,marca,modelo FROM rvehiculos where disponible='S'");
      			$stmt->execute();
      			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      			foreach($stmt->fetchAll() as $row) {
      				//OPTIONS
      				?>
      				<option value="<?php echo $row['matricula']; ?>"> <?php echo $row['matricula']."/".$row['marca']."/".$row['modelo'];  ?> </option>';
      				<?php
      			}
      			//CERRAMOS CONEXION
      			$conexion=null;
      			?>
			</select>
		<BR> <BR><BR><BR><BR><BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
      <BR><a href="view_movwelcome.php">Volver al Menú</a>
      <BR><a href="view_formulario.php">Cerrar Sesión</a>
		</div>
	</form>
	<!-- FIN DEL FORMULARIO -->
  </body>
</html>
<?php
require_once "../models/funciones.php";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="movilmad";
$conexion=crearconexion($servername, $username, $password, $dbname);
$nombrecookie="cesta";
//COOKIE Y PARAMETROS COOKIE

// echo "$nombrecliente";
// echo "$idcliente";


if (isset($_POST['agregar'])) {
$vehiculoelegido=$_POST['vehiculos'];
revisarparametros($vehiculoelegido);
$cantidad=1;
//dividimos las partes del vehiculo
$arraycesta = ["$vehiculoelegido" => $cantidad];
// var_dump($arraycesta);
$contenido=json_encode($arraycesta);
setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
//mostramos el valor de la cookie descodificando
$datos=json_decode($_COOKIE[$nombrecookie], true);
//array asociativo

//DATOS A TENER EN CUENTA, LA MATRICULA vehiculoelegido Y LA CANTIDAD
// $vehiculoelegido=$_POST['vehiculos'];

foreach ($datos as $key => $value) {
  if ($key==$vehiculoelegido) {
      echo "Vehiculos agregados: $contenido";
     // var_dump($datos);
  }else {
    $arraycesta[$key]=($value);
    // var_dump($datos);
     // var_dump($datos);
  }
  $contenido=json_encode($arraycesta);
  setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
}

//CERRAMOS CONEXION
$conexion=null;
}else {
$arraycesta = array();
}//FIN DE AGREGAR PRODUCTO


if (isset($_POST['alquilar'])) {

  $datos=json_decode($_COOKIE[$nombrecookie], true);

  var_dump($datos);
  $saldo=comprobarsaldo($nombrecliente,$idcliente,$conexion);
  if ($saldo>=10 && !empty($datos)) {
    $fecha= date("Y-m-d");
    echo "Cliente con suficiente, se procede a la compra</br>";
    foreach ($datos as $matricula => $value) {
      //cambiamos el estado a los vehiculos
      cambiarestadocoche($matricula,$conexion);
      alquilarvehiculo($idcliente,$matricula,$fecha,$conexion);
    }


  }else {
    echo "No se ha procedido a hacer el alquiler, saldo o cesta vacia";
  }

  $datos=json_decode($_COOKIE[$nombrecookie], true);
	// var_dump($datos);
	echo "<h2>VEHICULOS</h2>";
	echo "<table style='border: 1px solid black;text-align:center;'>";
	echo "<tr><td>Vehiculo alquilado</td><td>Cantidad</td></tr>";
	foreach ($datos as $key => $value) {
		echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
}
	echo "</table>";

  //vaciar cesta al terminar el alquiler:
  $arrayvacio=array();
	$contenido=json_encode($arrayvacio);
	setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");

}//FIN DE ALQUILAR PRODUCTO


if (isset($_POST['vaciar'])) {
  $arrayvacio=array();
	$contenido=json_encode($arrayvacio);
	setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
  echo "La cesta se ha vaciado correctamente";
}//FIN DE VACIAR PRODUCTO



 ?>
