<?php
include("funciones.php");

$conexion = conectar_db();

$buscador = $_GET["buscador"];

if ($buscador === "") {
  $consulta = "SELECT * FROM eventos ORDER BY fecha_evento,hora_evento";
} else {
  $consulta = "SELECT * FROM eventos WHERE nombre_evento LIKE '%{$buscador}%' ORDER BY fecha_evento,hora_evento";
}

$resultado_consulta = $conexion->query($consulta);

$resultado_consulta->fetch_assoc();

echo '<div id="cards_evento" class="container-events" >';

foreach ($resultado_consulta as $eventos) {
  echo '
    <a class="ver_mas" href="evento.php?id_evento=' . $eventos["id_evento"] . '">
    <div class="card text-bg-dark mb-3 card-event">
      <div class="card-body d-flex flex-column mb-3">
        <h5 class="card-title p-2"">' . $eventos["nombre_evento"] . '</h5>
        <p class="card-text p-2""><b>Modalidad:</b><br>' . $eventos["modalidad"]  . '</p>
        <p class="card-text p-2""><b>Fecha:</b><br>' . $eventos["fecha_evento"]  . '</p>
        <p class="card-text p-2""><b>Hora:</b><br>' . $eventos["hora_evento"]  . '</p>
        <p class="card-text p-2"">' . $eventos["descripcion"]  . '</p>
        <button class="btn btn-warning botones p-2 "><b>Leer más</b></button>
      </div>
    </div>
    </a>
  ';
}

echo '</div>';

?>
