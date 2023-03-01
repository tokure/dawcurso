<!-- FUNCIONES -->
<?php include("funciones.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Hoy</title>
    <link rel="shortcut icon" href="./img/favicon.png">
    <!-- complementos y Framework -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- DateRangePicker -->
    <link href="./css/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="./js/daterangepicker.js"></script>

    <link rel="stylesheet" href="./css/estilos.css">

</head>

<body>
    <!-- Header -->
    <?php include("header.php"); ?>
    <!-- Fin de header -->
<br><br>
<h1 style=text-align:center;>Mi Perfil</h1>
<h1 style=text-align:center;>Eventos Publicados</h1>
    <?php
$conexion = conectar_db();

$consulta = "SELECT * FROM eventos WHERE id_empresa=" . $_SESSION["id_empresa"];

$resultado_consulta = $conexion->query($consulta);

$resultado_consulta->fetch_assoc();

echo '<div id="cards_evento" class="container-events">';

foreach ($resultado_consulta as $evento) {
  echo '
    <div class="card text-bg-dark mb-3 card-event ver_mas">
      <div class="card-body d-flex flex-column mb-3">
        <h5 class="card-title p-2">' . $evento["nombre_evento"] . '</h5>
        <p class="card-text p-2"><b>Modalidad:</b><br>' . $evento["modalidad"] . '</p>
        <p class="card-text p-2"><b>Fecha:</b><br>' . $evento["fecha_evento"] . '</p>
        <p class="card-text p-2"><b>Hora:</b><br>' . $evento["hora_evento"] . '</p>
        <p class="card-text p-2">' . $evento["descripcion"]  . '</p>
        <button onclick="leerEvento(' . $evento["id_evento"] . ')" class="btn btn-warning botones p-2"><b>Leer más</b></button><br>
        <a href="borrar_evento.php?id_evento='.$evento["id_evento"].'"><button class="btn btn-warning botones p-2">borrar evento</button></a>
        </div>
    </div>
    ';
}

echo '</div>';

?>
   

    <!-- Inicio del pie -->
    <?php include("footer.php"); ?>
    <!-- Fin del pie -->

    <?php include("login-modal.php"); ?>
    <?php include("signup-modal.php"); ?>
    <?php include("add-event-modal.php"); ?>

    <script>
        $('#fechas').daterangepicker({ locale: { format: 'YYYY/MM/DD' } }, function(start, end) {
            $('#fecha_inicio').val(start.format('YYYY/MM/DD'));
            $('#fecha_fin').val(end.format('YYYY/MM/DD'));
        });
    </script>
</body>

</html>