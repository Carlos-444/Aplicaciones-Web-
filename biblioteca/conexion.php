<?php

//esta funcion sirve para conectar a la base de datos y mandar a llamar la base de datos que se va a utilizar.
function conectar(){

$host = "localhost";
$usuario = "root";  
$password = "";

//crear base de datos

$db = "biblioteca";
//crear conexion  para la base de datos
$conn=mysqli_connect($host, $usuario, $password, $db); 

//verificar conexion  
mysqli_select_db($conn, $db) or die("No se pudo seleccionar la base de datos");

return $conn;
}


?>