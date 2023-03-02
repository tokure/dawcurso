<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>cartelera de cines</title>
</head>
<body>

<a href="add_movie2.php" class="btn btn-success">añadir pelicula</a>

<?php

include("config.php");

//si quiero guardar en una funcion en vez de un archivo:

/* include ("funciones.php");
$conexion= conectar_bd();*/


$consulta = "SELECT * FROM movies LEFT JOIN movietheaters ON movietheaters.Movie=Movies.Code";
$resultado_consulta=$conexion->query($consulta);
$resultado_consulta->fetch_assoc();

echo "<table class='table table-striped table-hover'>
    <tr>
        <td>cine</td>
        <td>Titulo</td>
        <td>Rating</td>
        <td>Recaudacion</td>
    </tr>";
foreach($resultado_consulta as $pelicula){
    echo '<tr>
            <td>' . $pelicula["Name"]. '</td>'.
            '<td>' . $pelicula["Title"]. '</td>'.
            '<td>' . $pelicula["Rating"]. '</td>'.
            '<td>' . $pelicula["Money"]. '</td>'.
        '</tr>';

}
echo "<tr>
        <td>cine</td>
        <td>Titulo</td>
        <td>Rating</td>
        <td>Recaudacion</td>
    </tr>
</table>";
?>

</body>
</html>