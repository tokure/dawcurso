<?php
include("funciones.php");

if ($_POST) {
    $provincias = $_POST["provincias"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $tematica_evento = $_POST["tematica_evento"];
    $modalidad = $_POST["modalidad"];

    $conexion = conectar_db();
    if ($provincias === "todos" && $tematica_evento === "todos" && $modalidad === "todos") {
      $consulta = "SELECT * FROM eventos ORDER BY fecha_evento,hora_evento";
    } else {
      $consulta = "SELECT *
              FROM eventos 
              WHERE fecha_evento BETWEEN '$fecha_inicio' AND '$fecha_fin'
              AND id_provincia = '$provincias' 
              AND id_tematica = '$tematica_evento'
              AND modalidad = '$modalidad'          
              ";
              }
    $resultado = $conexion->query($consulta);

    $resultado->fetch_assoc();

    echo '<div id="eventos" class="container-events">';

    foreach ($resultado as $eventos) {
      echo '
        <div class="card text-bg-dark mb-3 card-event ver_mas">
          <div class="card-body d-flex flex-column mb-3">
            <h5 class="card-title p-2">' . $eventos["nombre_evento"] . '</h5>
            <p class="card-text p-2"><b>Modalidad:</b><br>' . $eventos["modalidad"] . '</p>
            <p class="card-text p-2"><b>Fecha:</b><br>' . $eventos["fecha_evento"] . '</p>
            <p class="card-text p-2"><b>Hora:</b><br>' . $eventos["hora_evento"] . '</p>
            <p class="card-text p-2">' . $eventos["descripcion"]  . '</p>
            <button onclick="leerEvento(' . $eventos["id_evento"] . ')" class="btn btn-warning botones p-2"><b>Leer más</b></button>
          </div>
        </div>
        ';
    }
    
    echo '</div> ';

  }
