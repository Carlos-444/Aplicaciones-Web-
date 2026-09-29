<?php

//esta funcion sirve para conectar a la base de datos y mandar a llamar la base de datos que se va a utilizar.
function conectar(){

$host = "localhost";
$usuario = "root";  
$password = "";

//crear base de datos

$db = "aw_crud";
//crear conexion  para la base de datos
$con=mysqli_connect($host, $usuario, $password, $db); 

//verificar conexion  
mysqli_select_db($con, $db) or die("No se pudo seleccionar la base de datos");

return $con;
}


?>