<?php
//incluye la informacion del archivo Conexion.php para poder conectarse a la base de datos
include("Conexion.php");

//llama a la funcion conectar para poder conectarse a la base de datos
$con = conectar();

//dame todos los registros de la tabla alumnos
$sql = "SELECT * FROM alumnos";
//ejecuta la consulta y guarda el resultado en la variable $query
$query = mysqli_query($con, $sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>

<tr>
<th>Matricula</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Acciones</th>


</tr>





</table>
    
</body>
</html>