<?php
//NO SE SI ESTO PUEDE IR EN ESTA VISTA!!!
//eliminamos la cookie usuario al volver de cerrar la sesion
setcookie("usuario", "", time() - 360000,"/");
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina de Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>

<body>
    <h1>Login</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Login Usuario</div>
		<div class="card-body">

		<form id="" name="" action="./controllers/controller_verificar.php" method="post" class="card-body">

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
