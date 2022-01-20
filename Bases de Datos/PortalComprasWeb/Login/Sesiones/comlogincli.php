<?php
session_start();
session_unset();
session_destroy();
?>
<html>
<head>
<title>Pagina Login</title>
</head>
<body  style="background-color:#85C9DC;">
<form action="pagina2.php" method="POST">
<h1> Login </h1>
<p>Usuario:<input type="text" placeholder="Introduce usuario" name="nombre" required/></p>
<p>Contraseña:<input type="text" placeholder="Introduce contraseña" name="contraseña" required/></p>
<input type="submit" value="Login" />
</form>
</body>
</html>
