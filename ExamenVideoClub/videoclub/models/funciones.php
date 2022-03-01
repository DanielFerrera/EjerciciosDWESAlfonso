<?php
//funcion de alfonso
function obteneridusuario($conexion,$usuario, $clave){
        try{
            $sql = $conexion->prepare("SELECT customer_id,first_name,last_name,email FROM customer WHERE email = '$usuario' AND
										concat(last_name,first_name) = '$clave' AND active = 1");
            $sql->execute();
            return $sql;
        }catch(Exception $e){
            echo "<strong>ERROR: </strong>".$e->getMessage();
        }
    }

//---------------------CREAR COOKIE------------------------
//funcion crear cookie con valores para poner en todas las paginas arriba
function hacercookie2($conexion,$usuario, $clave){
  try{
      $stmt = $conexion->prepare("SELECT first_name,last_name,email,customer_id FROM customer WHERE email = '$usuario' AND
      concat(last_name,first_name) = '$clave' AND active = 1");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach($stmt->fetchAll() as $row) {
        $nombrecliente=$row["first_name"];
        $apellidocliente=$row["last_name"];
        $emailcliente=$row["email"];
        $idcliente=$row["customer_id"];
      }
      return [$nombrecliente,$apellidocliente,$emailcliente,$idcliente];
  }catch(Exception $e){
      echo "<strong>ERROR: </strong>".$e->getMessage();
  }
}

//---------------ALQUILER PELICULAS---------------------
function desplegablepeliculas($conexion){
  try{
// select distinct film.title from rental,film where return_date IS NOT NULL and film.film_id=rental.film_id;
      $sql = $conexion->prepare("SELECT distinct film.film_id,film.title from rental,film,inventory where return_date IS NOT NULL and film.film_id=rental.film_id and inventory.quantity>1");
      $sql->execute();
      return $sql;
  }catch(Exception $e){
      echo "<strong>ERROR: </strong>".$e->getMessage();
  }
}


//----------------CONSULTAR PELICULAS-----------------


function desplegableconsultapeliculascliente($idcliente,$conexion){
  try{
      $sql = $conexion->prepare("SELECT film.title,film.release_year,film.rental_rate,rental.return_date from rental,film,customer where rental.customer_id='$idcliente' and rental.return_date is NOT NULL and film.film_id=rental.film_id and rental.customer_id=customer.customer_id order by return_date desc");
      $sql->execute();
      return $sql;
  }catch(Exception $e){
      echo "<strong>ERROR: </strong>".$e->getMessage();
  }
}

function mostrarcesta(){
  $cookie=$_COOKIE['carrito'];
  $cookiedecode=json_decode($_COOKIE['carrito'],true);
  $cantidad=sizeof($cookiedecode);
  echo "</br>Peliculas a alquilar";
  for ($i=0; $i <$cantidad ; $i++) {
    echo "</br>".$cookiedecode[$i];
  }
}

//-----------------ALQUILER DE PELICULA------------------

function agregarpeliculasacliente($idcliente,$cookie,$usuario,$conexion){
  $arraycookie=json_decode($cookie,true);
  var_dump($arraycookie);
  foreach ($arraycookie as $key) {
    $fechaactual = date("Y-m-d H:i:s");
    $total=explode("-",$key);
    $id=$total[0];
    //comprobamos que hay inventario de esta pelicula
      $cont=0;
      // select quantity from inventory where quantity>0 and film_id=10;
        $sql1 = $conexion->prepare("SELECT quantity from inventory where quantity>0 and film_id='$id'");
        $sql1->execute();
        $result1 = $sql1->setFetchMode(PDO::FETCH_ASSOC);
        foreach($sql1->fetchAll() as $row) {
          $cont++;
        }
    if ($cont>0) {
    //alquilar pelicula
  //quitamos dentro de inventario
      $sql2 = $conexion->prepare("UPDATE inventory SET quantity=(quantity-1) where film_id='$id'");
      $sql2->execute();
      $result2 = $sql2->setFetchMode(PDO::FETCH_ASSOC);
  //añadimos a rental el usuario que renta la peliculas
  //inserto
      $total=explode("#",$usuario);
      $idcliente=$total[0];
      $sql3 = $conexion->prepare("INSERT INTO rental (film_id,rental_date,customer_id) values ('$id','$fechaactual','$idcliente')");
      $sql3->execute();
      $result3 = $sql3->setFetchMode(PDO::FETCH_ASSOC);
}
}
}

//-------------------------DEVOLVER PELICULA-----------------

function desplegabledevpeliculascliente($usuario,$conexion){
  $total=explode("#",$usuario);
  $idcliente=$total[0];
  try{
    // SELECT film.title,film.release_year,film.rental_rate,rental.return_date from rental,film,customer where rental.customer_id='1' and rental.return_date is NOT NULL and film.film_id=rental.film_id and rental.customer_id=customer.customer_id and film.theme='Thriller' order by return_date desc;
      $sql = $conexion->prepare("SELECT rental.film_id,film.title from rental,film where rental.return_date IS NULL and rental.film_id=film.film_id and rental.customer_id='$idcliente'");
      $sql->execute();
      return $sql;
  }catch(Exception $e){
      echo "<strong>ERROR: </strong>".$e->getMessage();
  }
}

function devolverpelicula($pelicula,$idcliente,$conexion){
  $fechaactual = date("Y-m-d H:i:s");
  $total=explode("-",$pelicula);
  $idpelicula=$total[0];
  //actualizar rental
  try{
    $cont=0;
      $sql = $conexion->prepare("UPDATE rental SET return_date='$fechaactual' where film_id='$idpelicula' and customer_id='$idcliente'");
      $sql->execute();
      $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
  }catch(Exception $e){
      echo "<strong>ERROR: </strong>".$e->getMessage();
  }
  //añadimos esa pelicula al inventario
  try{
    $cont=0;
      $sql = $conexion->prepare("UPDATE inventory SET quantity=quantity+1 where film_id='$idpelicula'");
      $sql->execute();
      $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
  }catch(Exception $e){
      echo "<strong>ERROR: </strong>".$e->getMessage();
  }
  echo "$pelicula devuelta correctamente.";

}
 ?>
