<?php
// echo "Inicio db.php"."<br>";
function conexion(){
	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$database = "movilmad";

	try {
		$conexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $conexion;
	} catch (PDOException $ex) {
		echo $ex->getMessage();
	}

}
// echo "finaliza db.php"."<br>";
?>
