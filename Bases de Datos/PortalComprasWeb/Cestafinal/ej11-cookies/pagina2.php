<?php

//FUNCIONES
require "funciones.php";

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);

  if(isset($_POST['nombre']) && isset($_POST['contra'])){


    //AÑADIMOS PARAMETROS
    $nombre=$_POST['nombre'];
    $contra=$_POST['contra'];


    //FUNCIONES
    revisarparametros($nombre,$contra);

    //COMPROBAMOS LA CONEXION
    $nif=contra($nombre,$contra,$conexion);

    if ($nif!="00000000X" ) {
      echo "Has iniciado sesion: " . $_POST['nombre'] . "<br>";
      echo "Contraseña: " . $_POST['contra'] . "<br>";
      echo "Tu NIF es: ".$nif. "<br>";
      echo "<p><a href='../ej12/comprocli.php'>Portal de compras</a></p>";
      echo "<p><a href='comlogincli.php'>Cerrar Sesion</a></p>";
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
      			<h1> Login </h1>
      			<p>Usuario:<input type="text" placeholder="Introduce usuario" name="nombre" required/></p>
      			<p>Contraseña:<input type="text" placeholder="Introduce la contraseña" name="contra" required/></p><br />
      			<input type="submit" value="Login" />
      		</form>
      </body>
      </html>

      <?php
      echo "<br />Acceso Restringido debes hacer Login con tu usuario.";

}
}else {
  ?>
  <html>
  <head>
    <title>Pagina Login Cookie</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h1> Login </h1>
        <p>Usuario:<input type="text" placeholder="Introduce usuario" name="nombre" required/></p>
        <p>Contraseña:<input type="text" placeholder="Introduce la contraseña" name="contra" required/></p><br />
        <input type="submit" value="Login" />
      </form>
  </body>
  </html>

  <?php
      echo "<br />Acceso Restringido debes hacer Login con tu usuario";
    }

  ?>
