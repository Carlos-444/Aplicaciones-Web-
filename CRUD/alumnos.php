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

<div>

<h1>Formulario de Alumnos</h1>


<form action="insertar.php" method="POST" style="display: flex; gap: 10px;">
    <div  style= display: flex; gap: 10px; >
        
    <input type="text" name="matricula" placeholder="Matricula">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellido_p" placeholder="Apellido Paterno">  
    <input type="text" name="apellido_m" placeholder="Apellido Materno">
    <input type="number" name="edad" placeholder="Edad">

    <input style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;" type="submit" value="Agregar Alumno">
    </div>
</form>


<div>
<table border="2" style="border-collapse: collapse; width: 100%; text-align: center; margin-top: 20px; background-color: #ffffca">
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
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
                <a href="editar.php?matricula=<?php echo $row['matricula']; ?>" style="background-color: #158c00; color: white; cursor: pointer">EDITAR</a>
                <br>
                <hr>
                <a href="eliminar.php?matricula=<?php echo $row['matricula']; ?>" style="background-color: #900a00; color: white; cursor: pointer">Eliminar</a>
            </td>
            </tr>
            <?php
        }


            ?>

            </tbody>
</table>

</body>
</html>