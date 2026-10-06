<?php

include("Conexion.php");


$conn = conectar();


$sql = "SELECT * FROM libros";

$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>

    <style>
        .contenedor{
           /* display: flex;
            flex-direction: row; //una solo direccion
            */
            gap: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);

        }

        .card-larga{

            grid-column: 3;
            grid-row: span 3;

            display: flex;
            flex-direction: column;
        }
    
    </style>
</head>


<body>



</div class="ca">

  <div class="card" style="background-color:rgb(255, 64, 0); width: 1000px; " >
        
    <h1>EXAMEN 1ER PARCIAL - APLICACIONES WEB</h1>
    </div>


     <div class="card" style="background-color:rgb(232, 235, 176); width: 1000px; " >
        
    <h1>Formulario de libros</h1>
    <form action="insertar.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" required><br><br>

        <label for="Paginas">Páginas:</label>
        <input type="number" name="paginas" id="paginas" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" required><br><br>

        <input type="submit" value="Agregar Libro">


            <div class="tabla">
     <table border="2">
    <thead>
        <tr>
            <th>titulo</th>
            <th>autor</th>
            <th>Paginas</th>
            <th>Precio</th>

        </tr>
    </thead>


        <tbody>

        <?php
        while($row = mysqli_fetch_array($query)){
         ?>


        <tr>
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
  <div class="contenedor">
    <!--  -->
    <div class="contenedor" style="background-color:rgb(255, 64, 0); width: 250px;" >
        

   <a href="prog_web/practica 1.pdf" target="_blank"><h1>R1 -Introduccion a git y github</h1></a>
    </div>
            <img src="" alt="">
    <div class="card" style="background-color:rgba(66, 168, 232, 0.653); width: 250px;" >
    <a href="prog_web/R2 - HTML + CSS + Box Model.pdf" target="_blank"><h1>R2 - HTML + CSS + Box Model</h1></a>
    </div>
    

    <div class="card-larga" style="background-color:rgb(33, 253, 95); width: 250px;" >
        <a href="prog_web/practica de flex y div .pdf" target="_blank"><h1>R2 - HTML + CSS + Box Model</h1></a>
    </div>

</div>


      
    </div>



    <footer style="background-color:rgb(38, 185, 235); width: 1000px; color: white; text-align: center; padding: 30px; margin-top: 40px; " >

    
    <img src="img/leo.jpg" alt="Logo " width="100" height="100" align="left">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eum quo ducimus delectus? Quae, similique. Commodi quo minima facere, quaerat iusto corporis sed reiciendis at ut aspernatur tempore possimus dicta.</p>
    </footer>


</div>


    
</body>
</html>