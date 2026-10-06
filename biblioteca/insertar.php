<?php

/* conectar a la base de datos */
include 'conexion.php';
/* crear la conexión */
$conn = conectar();

/* obtener los datos del formulario */
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$paginas = $_POST['paginas'];
$precio = $_POST['precio'];



/* crear la consulta y una variable  */
$sql = "INSERT INTO libros (titulo, autor, paginas, precio)
 VALUES ('$titulo', '$autor', '$paginas', '$precio')";

/* ejecutar la consulta */
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: libros.php");
}
else{
    echo" Error al insertar el registro";
}


?>