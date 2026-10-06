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



<div>
<table border="2">
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Acciones</th>
        </tr>
    </thead>


        <tbody>

        <?php
        while($row = mysqli_fetch_array($query)){
         ?>


        <tr>
            <td><?php echo $row['matricula']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido_p']; ?></td>
            <td><?php echo $row['apellido_m']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td>
                <button style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">Editar</button>
                <button style="background-color: #f44336; color: white; padding: 10px 20px; border: none; cursor: pointer;">Eliminar</button>
            </td>
            </tr>
            <?php
        }


            ?>

            </tbody>
</table>

<div>
<a href="formulario.php"><button style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; cursor: pointer;">Agregar Alumno</button></a>


<div>

<h1>Formulario de Alumnos</h1>


<form action="insertar.php" method="POST">
    <div  style= display: flex; gap: 10px; >
        
    <input type="text" name="matricula" placeholder="Matricula">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellido_p" placeholder="Apellido Paterno">  
    <input type="text" name="apellido_m" placeholder="Apellido Materno">
    <input type="edad" name="edad" placeholder="Edad">

    <input style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;" type="submit" value="Agregar Alumno">
    </div>
</form>

</body>
</html>