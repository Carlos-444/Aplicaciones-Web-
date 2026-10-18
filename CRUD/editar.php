<?php
include("Conexion.php");
$con = conectar();

// Si el formulario fue enviado por POST, actualizamos los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula  = $_POST['matricula'];
    $nombre     = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad       = $_POST['edad'];

    $sql = "UPDATE alumnos SET
            nombre = '$nombre',
            apellido_p = '$apellido_p',
            apellido_m = '$apellido_m',
            edad = '$edad'
            WHERE matricula = '$matricula'";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: alumnos.php");
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($con);
        exit;
    }
}

// Si entra por GET, obtenemos el id/matrícula del alumno a editar
$id = isset($_GET['id']) ? $_GET['id'] : (isset($_GET['matricula']) ? $_GET['matricula'] : null);

if (!$id) {
    echo "Matrícula no especificada.";
    exit;
}

$sql = "SELECT * FROM alumnos WHERE matricula = '$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

if (!$row) {
    echo "Alumno no encontrado.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
</head>
<body>

    <h2>Editar Alumno</h2>

    <form action="editar.php" method="POST" style="display: flex; flex-direction: column; gap: 10px; width: 320px;">
        <label><strong>Matrícula:</strong></label>
        <input type="text" name="matricula" value="<?php echo $row['matricula']; ?>" readonly style="background-color: #e9e9e9;">

        <label><strong>Nombre:</strong></label>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>

        <label><strong>Apellido Paterno:</strong></label>
        <input type="text" name="apellido_p" value="<?php echo $row['apellido_p']; ?>" required>

        <label><strong>Apellido Materno:</strong></label>
        <input type="text" name="apellido_m" value="<?php echo $row['apellido_m']; ?>" required>

        <label><strong>Edad:</strong></label>
        <input type="number" name="edad" value="<?php echo $row['edad']; ?>" required>

        <div style="margin-top: 15px; display: flex; gap: 10px;">
            <input type="submit" value="Guardar Cambios" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer;">
            <a href="alumnos.php" style="background-color: #777; color: white; padding: 10px 15px; text-decoration: none; display: inline-block;">Cancelar</a>
        </div>
    </form>

</body>
</html> 