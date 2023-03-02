<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>añadir pelicula</title>
</head>
<body>
<?php
    include("funciones.php");
    $conexion=conectar_bd();

    $id_pelicula = $_GET["id_pelicula"];

    $consulta="SELECT * FROM movies WHERE Code=$id_pelicula";

    $resultado_consulta=$conexion->query($consulta);

    $resultado_consulta->fetch_assoc();

    foreach($resultado_consulta as $pelicula){
        $titulo = $pelicula["Title"];
        $rating = $pelicula["Rating"];
        $recaudacion = $pelicula["Money"];


    }

    ?>

    <form method="POST">
    <label for="titulo" class="form-label">Titulo</label>
    <input type="text" name="titulo" required value="<?php echo $titulo ?>" class="form-control">

    <br>

    <label for="rating" class="form-label">Rating</label>
    <select name="rating" class="form-control">
        <option value="-1"selected disabled>seleccione una opcion</option>
        <option value="PG" <?php if($rating=="PG"){echo "selected='selected'";} ?>>PG</option>
        <option value="G"<?php if($rating=="G"){echo "selected='selected'";} ?>>G</option>
        <option value="NC-17"<?php if($rating=="NC-17"){echo "selected='selected'";} ?>>NC-17</option>
        <option value="PG-13"<?php if($rating=="PG-13"){echo "selected='selected'";} ?>>PG-13</option>
    </select>

    <br>

    <label for="money" class="form-label">Money</label>
    <input type="number" name="money" value="<?php echo $recaudacion ?>" class="form-control">

    <br>

    <input type="submit" class="btn btn-primary" value="editar pelicula">

    </form>
<?php
    if($_POST){
        $titulo_nuevo = $_POST["titulo"];

        $rating_nuevo = $_POST["rating"];

        $recaudacion_nueva = $_POST["money"];

        $consulta="UPDATE movies SET Title = '$titulo_nuevo',
        Rating = '$rating_nuevo',
        Money = $recaudacion_nueva
        WHERE Code = $id_pelicula";


        $resultado_consulta = $conexion->query($consulta);

        header("Location:index.php");

    }
?>
</body>
</html>