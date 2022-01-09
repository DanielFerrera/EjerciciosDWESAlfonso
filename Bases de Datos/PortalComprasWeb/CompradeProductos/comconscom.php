<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <p>NIF de cliente:</p>
      <select name="nif">
        <?php require 'funciones.php';
        //CREAMOS CONEXION
        $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
        $conexion=crearconexion($servername, $username, $password, $dbname);

        //CREAMOS EL DESPLEGABLE
        //SELECT
        $stmt = $conexion->prepare("SELECT nif FROM cliente");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $row) {
          //OPTIONS
          ?>
          <option value="<?php echo $row['nif']; ?>"> <?php echo $row['nif']; ?> </option>';

          <?php
        }
        //CERRAMOS CONEXION
        $conexion=null;
        ?>
      </select>


      <p>Producto:</p>
      <select name="producto">
        <?php
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
          <option value="<?php echo $row['id_producto']."/".$row['num_almacen']; ?>"> <?php echo $row['nombre']."- ALMACEN ".$row['num_almacen']; ?> </option>';

          <?php
        }
        //CERRAMOS CONEXION
        $conexion=null;
        ?>
      </select>

          <p>Cantidad:</p>
          <input type='text' name='cantidad' placeholder='Cantidad'>

       <br><br>
       <input type="submit" value="Enviar"  name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>



<?php
if (isset($_POST['enviar'])) {
//INTRODUCIMOS LAS FUNCIONES

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);

//AÑADIMOS PARAMETROS
$nif=$_POST['nif'];
$producto=$_POST['producto'];
$cantidad=$_POST['cantidad'];


//FUNCIONES
revisarparametros($nif,$producto,$cantidad);
compra($nif,$producto,$cantidad,$conexion);

//CERRAMOS CONEXION
$conexion=null;
}
?>
