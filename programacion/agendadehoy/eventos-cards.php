<!-- Inicio buscador -->

<form class="col-12 col-lg-auto m-4  w-25" role="search">
  <input type="text" id="buscador" name="buscador" onkeyup="buscarTexto()" class="form-control form-control-dark text-bg-dark" placeholder="Buscar nombre de evento" aria-label="Search">
</form>

<!-- Fin buscador -->

<?php
$conexion = conectar_db();

$consulta = "SELECT * FROM eventos ORDER BY fecha_evento";

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
        <button onclick="leerEvento(' . $evento["id_evento"] . ')" class="btn btn-warning botones p-2"><b>Leer más</b></button>
      </div>
    </div>
    ';
}

echo '</div>';

?>
<!--  Añadir evento-->

<div class="d-flex flex-column m-5 align-items-center gap-4 botones">
  <h3>¿No encuentras el evento de tu empresa?</h3>

  <?php if (isset($_SESSION["nombre_empresa"])) { ?>
    <a href="add-event-modal.php" data-bs-toggle="modal" data-bs-target="#addEventModal">
    <?php } else { ?>
      <a href='login.php' data-bs-toggle='modal' data-bs-target='#loginModal'><?php
       } ?>

      <button type="button" class="btn btn-warning">Añádelo</button>
      </a>
</div>

<?php
echo '</div>';
?>

<script type="text/javascript">
  function buscarTexto() {
    const buscador = document.getElementById("buscador").value;

    var ajax_url = "./buscador.php"; //ruta del archivo que será lanzado

    var ajax_request = new XMLHttpRequest(); //clase. creo un objeto de esa clase

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() { //cuando cambie de estado, salta una funcion que mira  el estado de conexion
      // si el readyState es 4, proseguir
      if (ajax_request.readyState == 4) {

        // Analizaos el responseText que contendrá el JSON enviado desde el servidor
        var response = ajax_request.responseText;
        document.getElementById("cards_evento").innerHTML = response;
      }
    }

    // Definimos como queremos realizar la comunicación
    ajax_request.open("GET", ajax_url + "?buscador=" + buscador);

    //Enviamos la solictud con los parámetros que habíamos definido
    ajax_request.send();
  }

  
  function leerEvento(id_evento) {
    var ajax_url = "./evento.php"; 

    var ajax_request = new XMLHttpRequest(); 

    
    ajax_request.onreadystatechange = function() { 
      
      if (ajax_request.readyState == 4) {

        var response = ajax_request.responseText;
        document.getElementById("cards_evento").innerHTML = response;
      }
    }
    ajax_request.open("GET", ajax_url + "?id_evento=" + id_evento);

    ajax_request.send();
  }





</script>