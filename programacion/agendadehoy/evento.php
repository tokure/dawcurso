<?php include("funciones.php");

if ($_GET) {
  $id_evento = $_GET["id_evento"];
}

$conexion = conectar_db();

$consulta = "SELECT * FROM eventos WHERE id_evento = '$id_evento'";

$consulta_evento = $conexion->query($consulta);

$consulta_evento->fetch_assoc();

echo '<div id="cards_evento" class="container-events">';

foreach ($consulta_evento as $evento) {
  echo '
    <div class="info-evento">
      <div class="bg-light">
        <h1 class="titulo-evento"> ' . $evento["nombre_evento"] . ' </h1>
        <p class="descripcion"> ' . $evento["descripcion"] . ' </p>
      </div>
    </div>
  ';
}

echo '</div>';
?>








