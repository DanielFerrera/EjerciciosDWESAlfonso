<?php
//FUNCIONES
include_once "../models/funciones.php";

$servername="localhost"; $username="root"; $password="rootroot"; $dbname="movilmad";
$conexion=crearconexion($servername, $username, $password, $dbname);

if(isset($_POST['email']) && isset($_POST['password'])){

  //AÑADIMOS PARAMETROS
  $email=$_POST['email'];
  $password=$_POST['password'];

  //validamos los parametros introducidos para comprobar si son correctos
  $nombrecliente=validar($email,$password,$conexion)[0];

  $idcliente=validar($email,$password,$conexion)[1];
  //apellido
  $apellidocliente=validar($email,$password,$conexion)[2];

  if ($idcliente!="0"){
    echo "$idcliente";
  $cookie_name = "usuario";
  //creamos la cookie: nombrecliente+idcliente
  $cookie_value = "$idcliente "."$apellidocliente "."$nombrecliente";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día

    header("Location:../views/view_movwelcome.php");
   //  echo "Has iniciado sesion como : " . $nombrecliente . "<br>";
   //  echo "ID: " . $idcliente . "<br>";
   //  echo "<p><a href='movwelcome.php'>Pantalla de bienvenida</a></p>";
   //  echo "<p><a href='movlogin.php'>Cerrar Sesion</a></p>";
   //  $cookie_name = "usuario";
   //  //creamos la cookie: nombrecliente+idcliente
   //  $cookie_value = "$nombrecliente "."$idcliente";
   //  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
  }else {
       ?>
       <html>
           <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <meta http-equiv="X-UA-Compatible" content="ie=edge">
           <title>Login Page - MovilMad</title>
           <link rel="stylesheet" href="../css/bootstrap.min.css">
        </head>

       <body>
           <h1>MOVILMAD</h1>

           <div class="container ">
               <!--Aplicacion-->
       		<div class="card border-success mb-3" style="max-width: 30rem;">
       		<div class="card-header">Login Usuario</div>
       		<div class="card-body">

       		<form id="" name="" action="pagina2.php" method="post" class="card-body">

       		<div class="form-group">
       			Email <input type="text" name="email" placeholder="email" class="form-control">
               </div>
       		<div class="form-group">
       			Clave <input type="password" name="password" placeholder="password" class="form-control">
               </div>

       		<input type="submit" name="submit" value="Login" class="btn btn-warning disabled">
               </form>
       	    </div>
           </div>
           </div>
           </div>
       </body>
       </html>
       <?php
echo "<br />Usuario o contraseña incorrectos.";
}
}
else {
  ?>
  <html>
      <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login Page - MovilMad</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
   </head>

  <body>
      <h1>MOVILMAD</h1>

      <div class="container ">
          <!--Aplicacion-->
     <div class="card border-success mb-3" style="max-width: 30rem;">
     <div class="card-header">Login Usuario</div>
     <div class="card-body">

     <form id="" name="" action="pagina2.php" method="post" class="card-body">

     <div class="form-group">
       Email <input type="text" name="email" placeholder="email" class="form-control">
          </div>
     <div class="form-group">
       Clave <input type="password" name="password" placeholder="password" class="form-control">
          </div>

     <input type="submit" name="submit" value="Login" class="btn btn-warning disabled">
          </form>
       </div>
      </div>
      </div>
      </div>
  </body>
  </html>
  <?php
echo "<br />Acceso Restringido debes hacer Login con tu usuario.";
}
        ?>
