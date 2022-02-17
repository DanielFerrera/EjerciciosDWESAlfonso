<?php
//eliminamos la cookie usuario al volver de cerrar la sesion
// setcookie("usuario", "", time() - 3600);
// require_once ("models/funciones.php");
// require_once ("./views/view_fornulario.php");

$email=$_POST['email'];
$password=$_POST['password'];

include_once "../models/funciones.php";

require_once("../db/conexiondb.php");

$conexion=conexion();
$idcliente=validar($email,$password,$conexion)[0];
$nombrecliente=validar($email,$password,$conexion)[1];

if(!empty($idcliente) || !empty($nombrecliente)){
	//si es correcto que vaya al menu de hacer cosas
	require_once ("../views/view_pagina2.php");
	//echo "Login correcto ".$idcliente." ".$nombrecliente;
}else{
	//si no es correcto que vuelva al login que va a decir que usuario incorrecto
	require_once ("../views/loginmal.php");
	//echo "Login incorrecto";
}

?>
