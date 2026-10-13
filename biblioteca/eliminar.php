<?php
include("conexion.php");
$conn = conectar();
//recibir el id del registro a eliminar
$id = $_GET['id'];

//eliminar el registro
$sql = "DELETE FROM libros WHERE id = $id";
mysqli_query($conn, $sql);

//verificar si se elimino el registro
if(mysqli_affected_rows($conn) > 0){
    header("Location: libros.php");
}
else{
    echo "Error al eliminar el registro";
}




?>