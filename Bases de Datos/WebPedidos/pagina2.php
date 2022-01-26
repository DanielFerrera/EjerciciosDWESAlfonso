<?php
//FUNCIONES
require "funciones.php";

//CREAMOS CONEXION
// echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="pedidos";
$conexion=crearconexion($servername, $username, $password, $dbname);

  if(isset($_POST['nombre']) && isset($_POST['contra'])){

    //AÑADIMOS PARAMETROS
    $nombre=$_POST['nombre'];
    $contra=$_POST['contra'];

    //FUNCIONES
    revisarparametros($nombre,$contra);

    //Usuario=customernumber; contraseña=customerlastnumber;

    //COMPROBAMOS LA CONEXION
    $customername=contra($nombre,$contra,$conexion);

    if ($customername!="0") {
      echo "Has iniciado sesion: " . $_POST['nombre'] . "<br>";
      echo "Contraseña: " . $_POST['contra'] . "<br>";
      echo "Bienvenido: ".$customername. "<br>";
      echo "<p><a href='pe_inicio.html'>Menú de Inicio</a></p>";
      echo "<p><a href='pe_login.php'>Cerrar Sesion</a></p>";
      $cookie_name = "usuario";
      $cookie_value = "$nombre "."$contra";
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
    }else {
      ?>
      <html>
      <head>
      	<title>Pagina Login Cookie</title>
      </head>
      <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      			<h1> Login Web de pedidos </h1>
      			<p>Usuario:<input type="text" placeholder="CustomerNumber" name="nombre" required/></p>
      			<p>Contraseña:<input type="text" placeholder="ContactLastName" name="contra" required/></p><br />
      			<input type="submit" value="Login" />
      		</form>
      </body>
      </html>
      <?php
      echo "Acceso Restringido debes hacer Login con tu usuario.";
}
}else {
  ?>
  <html>
  <head>
    <title>Pagina Login Cookie</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1> Login Web de pedidos </h1>
      <p>Usuario:<input type="text" placeholder="CustomerNumber" name="nombre" required/></p>
      <p>Contraseña:<input type="text" placeholder="ContactLastName" name="contra" required/></p><br />
      <input type="submit" value="Login" />
      </form>
  </body>
  </html>
  <?php
    }
  ?>
