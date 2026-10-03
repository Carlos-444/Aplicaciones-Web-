<?php

/* conectar a la base de datos */
include 'conexion.php';
/* crear la conexión */
$con = conectar();

/* obtener los datos del formulario */
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$edad= $_POST['edad'];


/* crear la consulta y una variable  */
$sql = "INSERT INTO alumnos (matricula, nombre, apellido_p, apellido_m, edad)
 VALUES ('$matricula', '$nombre', '$apellido_p', '$apellido_m', '$edad')";

/* ejecutar la consulta */
$query = mysqli_query($con, $sql);

if($query){
    header(Location:alumnos.php);
}
else{
    echo" Error al insertar el registro";
}


?>