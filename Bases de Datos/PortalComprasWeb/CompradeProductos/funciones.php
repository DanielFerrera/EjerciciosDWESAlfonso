<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($nif,$producto,$cantidadd){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nif = test_input($_POST["nif"]);
    $producto = test_input($_POST["producto"]);
    $cantidad = test_input($_POST["cantidad"]);
  }
}

function crearconexion($servername, $username, $password, $dbname){
  try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
  return $conn;
}

function compra($nif,$producto,$cantidad,$conn){
  echo "</br>";
  $idalm= explode("/",$producto);
  $producto=$idalm[0];
  $almacen=$idalm[1];

  $fecha=date('Y-m-d');
  try {
    $stmt1 = $conn->prepare("SELECT cantidad FROM almacena WHERE id_producto='$producto' and num_almacen='$almacen'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt1->fetchAll() as $row) {
      $cantidadprod=$row["cantidad"];

      //--------------------------------------------
      if ($cantidad<$cantidadprod) {
        $cantidadtotal=$cantidadprod-$cantidad;
        $stmt = $conn->prepare("UPDATE almacena SET cantidad='$cantidadtotal' WHERE id_producto='$producto' and num_almacen='$almacen'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //--------------------------------------------

        $stmt3 = $conn->prepare("SELECT nif,id_producto,fecha_compra FROM compra WHERE nif='$nif'");
        $stmt3->execute();
        $result3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);

        foreach($stmt3->fetchAll() as $row) {
          $nifusado=$row["nif"];
            $id=$row["id_producto"];
            $fech=$row["fecha_compra"];
}//foreach
        //--------------------------------------------
        $stmt4 = $conn->prepare("SELECT fecha_compra FROM compra WHERE nif='$nif' AND id_producto='$producto'");
        $stmt4->execute();
        $result4 = $stmt4->setFetchMode(PDO::FETCH_ASSOC);

        foreach($stmt4->fetchAll() as $row) {
            $fech=$row["fecha_compra"];
}//foreach
        //--------------------------------------------
        if (empty($nifusado)) {


          $stmt2 = $conn->prepare("INSERT INTO compra (nif,id_producto,fecha_compra,unidades) VALUES ('$nif','$producto','$fecha','$cantidad')");
          $stmt2->execute();

          // set the resulting array to associative
          $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
          echo "El cliente con nif ".$nif." ha comprado ".$cantidad." productos con el id ".$producto."<br>";
          //--------------------------------------------


        }else {
          if (empty($id)) {
            $stmt5 = $conn->prepare("INSERT INTO compra (nif,id_producto,fecha_compra,unidades) VALUES ('$nif','$producto','$fecha','$cantidad')");
            $stmt5->execute();

            // set the resulting array to associative
            $result5 = $stmt5->setFetchMode(PDO::FETCH_ASSOC);
            echo "El cliente con nif ".$nif." ha comprado ".$cantidad." productos con el id ".$producto."<br>";
          }
          if ($fech!=$fecha) {
            $stmt7 = $conn->prepare("INSERT INTO compra (nif,id_producto,fecha_compra,unidades) VALUES ('$nif','$producto','$fecha','$cantidad')");
            $stmt7->execute();

            // set the resulting array to associative
            $result7 = $stmt7->setFetchMode(PDO::FETCH_ASSOC);
            echo "El cliente con nif ".$nif." ha comprado ".$cantidad." productos con el id ".$producto."<br>";
          }else {


          $stmt6 = $conn->prepare("UPDATE compra SET unidades=unidades+'$cantidad' WHERE nif='$nif' and id_producto='$producto'");
          $stmt6->execute();
          $result6 = $stmt6->setFetchMode(PDO::FETCH_ASSOC);
          echo "El cliente con nif ".$nif." ha comprado ".$cantidad." productos con el id ".$producto."<br>";
        }
      }

echo $fech;
      }else {
        echo "NO se pudo hacer la compra <br>";
        echo "La cantidad maxima a comprar de este producto es ".$cantidadprod;
      }

    }//foreach cantidad
  }//try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}



?>
