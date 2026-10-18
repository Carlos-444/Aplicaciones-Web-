<?php
include("conexion.php");
$con = conectar();
//recibir el id del registro a eliminar
$matricula = $_GET['matricula'];

//eliminar el registro
$sql = "DELETE FROM alumnos WHERE matricula = $matricula";
mysqli_query($con, $sql);

//verificar si se elimino el registro
if(mysqli_affected_rows($con) > 0){
    header("Location: alumnos.php");
}
else{
    echo "Error al eliminar el registro";
}


?>