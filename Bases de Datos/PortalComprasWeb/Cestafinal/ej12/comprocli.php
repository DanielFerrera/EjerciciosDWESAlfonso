<!-- parte html -->
<html>
<head>
	<title>Pagina Login Cookie</title>
</head>
<body  style="background-color:#85C9DC;">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h1> Compra productos </h1>

		<p>Producto:</p>
		<select name="producto">
			<?php   require "funciones.php";
			//CREAMOS CONEXION
			$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
			$conexion=crearconexion($servername, $username, $password, $dbname);

			//CREAMOS EL DESPLEGABLE
			//SELECT
			$stmt = $conexion->prepare("SELECT almacena.id_producto,nombre,num_almacen FROM producto,almacena where almacena.id_producto=producto.id_producto");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			foreach($stmt->fetchAll() as $row) {
				//OPTIONS
				?>
				<option value="<?php echo $row['id_producto']."/".$row['num_almacen']; ?>"> <?php echo $row['nombre']; ?> </option>';
				<?php
			}
			//CERRAMOS CONEXION
			$conexion=null;
			?>
		</select>
		<p>Productos a comprar:</p><input type="number" placeholder="Cantidad" name="cantidad"/><br /><br />
		<input type="submit" value="Agregar producto" name="enviar" />
		<input type="submit" value="Vaciar carrito" name="vaciar" />
		<input type="submit" value="Finalizar y comprobar" name="finalizar" />
	</form>
</body>
</html>

<!-- parte php -->
<?php
//Creamos la conexion:
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);


//AGREGAR PROD
if (isset($_POST['enviar'])) {
	//AÑADIMOS PARAMETROS
	$producto=$_POST['producto'];
	$prodalmacen= explode("/",$producto);
	$prod=$prodalmacen[0];
	$alma=$prodalmacen[1];
	$cantidad=$_POST['cantidad'];

	//COOKIE Y PARAMETROS COOKIE
	$cookie="$_COOKIE[usuario]";
	$nombrecontra= explode(" ",$cookie);
	$nombre=$nombrecontra[0];
	$contra=$nombrecontra[1];

	//FUNCIONES
	revisarparametros($producto,$cantidad);
	$nif=contra($nombre,$contra,$conexion);

	//EJECUCIÓN
	$arraycesta = ["$prod" => $cantidad];
	//creamos la setcookie
	$nombrecookie="cesta";
	//escribimos la cookie con el array codificado
	$contenido=json_encode($arraycesta);
	setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
	//mostramos el valor de la cookie descodificando
	if (isset($comprobado)) {
		$comprobado=true;
		$nombrecookie="cesta";
		$datos=json_decode($_COOKIE[$nombrecookie], true);
		//array asociativo
		foreach ($datos as $key => $value) {
			if ($key==$prod) {
				$total=$value+$cantidad;
				$arraycesta[$key]=($total);
			}else {
				$arraycesta[$key]=($value);
			}
		}
		$contenido=json_encode($arraycesta);
		setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
	}
	//CERRAMOS CONEXION
	$conexion=null;
}else {
	$arraycesta = array();
}

//FINALIZAR Y ACEPTAR
//--------------------------------------------------

if (isset($_POST['finalizar'])) {
	//AÑADIMOS PARAMETROS
	$producto=$_POST['producto'];
	$prodalmacen= explode("/",$producto);
	$prod=$prodalmacen[0];
	$alma=$prodalmacen[1];
	$cantidad=$_POST['cantidad'];

	//COOKIE Y PARAMETROS COOKIE
	$cookie= "$_COOKIE[usuario]";
	$nombrecontra= explode(" ",$cookie);
	$nombre=$nombrecontra[0];
	$contra=$nombrecontra[1];

	//FUNCIONES
	revisarparametros($producto,$cantidad);
	$nif=contra($nombre,$contra,$conexion);

	echo "Tu pedido finalmente es: ";
	echo "El usuario: ". $_COOKIE['usuario'];
	echo "</br> Ha comprado estos productos: ";
	echo $_COOKIE['cesta'];
	compra($nif,$producto,$cantidad,$conexion);
}

//-----------------------------------
//BORRAR Producto
if (isset($_POST['vaciar'])) {
echo "Se ha vaciado el carrito, la cookie se vacia";
$arrayvacio=array();
$nombrecookie="cesta";
$contenido=json_encode($arrayvacio);
setcookie($nombrecookie,$contenido, time() + (86400 * 30), "/");
print_r($_COOKIE);
}

?>
