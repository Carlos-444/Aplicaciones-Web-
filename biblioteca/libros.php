<?php

include("Conexion.php");


$conn = conectar();


$sql = "SELECT * FROM libros";

$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        .encabezado {
            background-color: rgb(255, 100, 60);
            padding: 15px;
            text-align: center;
            border-radius: 8px;
        }

        .formulario {
            background-color: rgb(255, 245, 190);
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
        }

        input {
            padding: 7px;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #e87543;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .tabla {
            margin-top: 25px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f5b58d;
        }

        .contenedor {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .card {
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .card a {
            color: black;
            text-decoration: none;
        }

        .card a:hover {
            color: #444;
            text-decoration: underline;
        }

        .card h2 {
            font-size: 20px;
        }

        .card-larga {
            background-color: rgb(170, 240, 180);
            padding: 15px;
            border-radius: 8px;
            grid-column: 3;
            grid-row: 1 / span 2;
        }

        footer {
            background-color: rgb(70, 180, 220);
            color: white;
            padding: 20px;
            margin-top: 30px;
            border-radius: 8px;
            text-align: center;
            overflow: auto;
            text align: justify;
        }

        footer img {
            float: left;
            margin-right: 15px;
        }

        @media (max-width: 700px) {
            .contenedor {
                grid-template-columns: 1fr;
            }

            .card-larga {
                grid-column: auto;
                grid-row: auto;
            }

            footer img {
                float: none;
                margin: 0 auto 10px;
            }
        }
    </style>
</head>

<body>

    <div class="encabezado">
        <h1>EXAMEN 1ER PARCIAL - APLICACIONES WEB</h1>
    </div>

    <div class="formulario">
        <h2>Formulario de libros</h2>

        <form action="insertar.php" method="POST">

            <label for="titulo">Título:</label><br>
            <input type="text" name="titulo" id="titulo" required>
            <br><br>

            <label for="autor">Autor:</label><br>
            <input type="text" name="autor" id="autor" required>
            <br><br>

            <label for="paginas">Páginas:</label><br>
            <input type="number" name="paginas" id="paginas" min="1" required>
            <br><br>

            <label for="precio">Precio:</label><br>
            <input type="number" name="precio" id="precio" min="0" step="0.01" required>
            <br><br>

            <input type="submit" value="Agregar libro">

        </form>

        <div class="tabla">
            <h2>Lista de libros</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Páginas</th>
                        <th>Precio</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['autor']; ?></td>
                            <td><?php echo $row['paginas']; ?></td>
                            <td><?php echo $row['precio']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <h2>Recursos de programación web</h2>

    <div class="contenedor">

        <div class="card" style="background-color: rgb(255, 190, 160);">
            <a href="prog_web/practica 1.pdf" target="_blank">
                <h2>R1 - Introducción a Git y GitHub</h2>
            </a>
        </div>

        <div class="card" style="background-color: rgb(170, 215, 245);">
            <a href="prog_web/R2 - HTML + CSS + Box Model.pdf" target="_blank">
                <h2>R2 - HTML, CSS y Box Model</h2>
            </a>
        </div>

        <div class="card-larga">
            <a href="prog_web/practica de flex y div .pdf" target="_blank">
                <h2>R3 - Práctica de Flex y Div</h2>
            </a>
            <p>Material de apoyo para las prácticas de programación web.</p>
        </div>

    </div>

    <footer>
        <img src="img/leo.jpg" alt="Logo" width="100" height="100">

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Aperiam eum quo ducimus delectus? Quae, similique.
            Commodi quo minima facere, quaerat iusto corporis sed
            reiciendis at ut aspernatur tempore possimus dicta.
        </p>
    </footer>

</body>
</html>
