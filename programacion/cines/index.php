<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="scripts.js"></script>
    <title>cartelera de cines</title>
</head>
<body>
    <style>
        #titulo:hover{
            cursor:pointer;
        }
    </style>

<a href="add_movie.php" class="btn btn-success">añadir pelicula</a>
Ordenar peliculas:
<select name="ordenar" id="ordenar" onchange="ordenar();">
    <option value="asc">ascendente</option>
    <option value="desc">descendente</option>

</select>

filtrar:<input type="text" id="filtro" name="filtro" onkeyup="filtrar();">

<?php

include("config.php");

//si quiero guardar en una funcion en vez de un archivo:

/* include ("funciones.php");
$conexion= conectar_bd();*/



$consulta = "SELECT * FROM movies ORDER BY Title";

$resultado_consulta=$conexion->query($consulta);

$resultado_consulta->fetch_assoc();

echo "<table class='table table-striped table-hover' >
    <tr>
        <td id='titulo' onclick='reordenar_titulo()'data-orden='DESC'>Titulo</td>
        <td>Rating</td>
        <td>Recaudacion</td>
        <td>acciones</td>
    </tr>";
echo "<tbody id='tabla_cines'>";
foreach($resultado_consulta as $pelicula){
    echo '<tr>
            <td>' . $pelicula["Title"]. '</td>'.
            '<td>' . $pelicula["Rating"]. '</td>'.
            '<td>' . $pelicula["Money"]. '</td>'.
            '<td> 
            <a href="editar_pelicula.php?id_pelicula='.$pelicula["Code"].'">editar</a>
             -
            <a href="borrar_pelicula.php?id_pelicula='.$pelicula["Code"].'">borrar</a> </td>'.
        '</tr>';

}
echo "</tbody>";
echo "<tr>
        <td>Titulo</td>
        <td>Rating</td>
        <td>Recaudacion</td>
        <td>acciones</td>
    </tr>
</table>";
?>

</body>
</html>