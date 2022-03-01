<?php
//Función: conexion()
//Parámetros entrada: --
//Parámetros salida: devuelve el identificador de la conexión
function conexion(){
  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "iesvideo";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }

  return $conn;
}
?>

<?php
//Función: getCustomerId
//Parámetros entrada: $conexion: id conexión; $usuario email introducido por pantalla; $clave clave introducido por pantalla
//Parámetros salida: devuelve el identificador de la conexión
function getCustomerId($conexion,$usuario, $clave){
        try{
            $sql = $conexion->prepare("SELECT customer_id,first_name,last_name,email FROM customer WHERE email = '$usuario' AND 
										concat(last_name,first_name) = '$clave' AND active = 1");
            $sql->execute();
            return $sql;
        }catch(Exception $e){
            echo "<strong>ERROR: </strong>".$e->getMessage();
        }
        
    }

?>

<?php
	$conn=conexion();
	if(isset($_POST['submit'])){//Si no se ha pulsado el boton de login cierra sesión
            if(isset($_POST['usuario']) && isset($_POST['clave']))
			{//Si se han rellenado los campos del login
			    $respuesta = getCustomerId($conn,$_POST['usuario'], $_POST['clave']);
                if($respuesta->rowCount() > 0)
				{
                    header("location:alqwelcome.php");
                }
				else{
                    echo "No existe ningun email con esa contrase&ntilde;a.";
					}
            }
			else
			{
                if(!isset($_POST['usuario']))
				{
                    echo "No se ha proporcionado un usuario!";
                }
                if(!isset($_POST['clave']))
				{
                    echo "No se ha proporcionado una contrase&ntilde;a!";
                }
			}
          }

?>
<html>
   
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIDEOCLUB - IES Leonardo Da Vinci</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    </head>
      
     <body>
    <h1 class="text-center"> VIDEOCLUB IES LEONARDO DA VINCI</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Login Usuario</div>
		<div class="card-body">
		
		<form id="" name="" action="" method="post" class="card-body">
		
		<div class="form-group">
			Usuario <input type="text" name="usuario" placeholder="usuario" class="form-control">
        </div>
		<div class="form-group">
			Clave <input type="password" name="clave" placeholder="usuario" class="form-control">
        </div>				
        
		<input type="submit" name="submit" value="Login" class="btn btn-warning disabled">
        </form>
		
	    </div>
    </div>
    </div>
    </div>



</body>
</html>