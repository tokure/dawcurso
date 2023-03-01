<div class="main">
  <!-- Banner -->
  <div class="banner">

    <!-- Imagen de fondo del banner -->
    <div class="container-imagen"></div>

    <!-- Buscador evento-->
    <div class="container-filtro">
      <section class="filtro">
        <h1 class="title">
          AGENDA DE HOY
        </h1>

        <form id="search" class="d-flex gap-2">
          <!--Selector Provincia-->
          <?php selector_provincia(); ?>

          <!--Selector fecha-->
          <div class="input-group">
            <input type="text" id="fechas" name="daterange" class="form-control" style="width: auto; border-radius: 6px;">
            <input type="hidden" id="fecha_inicio" name="fecha_inicio">
            <input type="hidden" id="fecha_fin" name="fecha_fin">
          </div>

          <!--Selector temática de eventos-->
          <?php selector_tematica() ?>

          <!-- Inicio de filtro por modalidad -->
          <div class="input-group">
            <select class="form-select" name="modalidad" id="modalidad">
              <option value="todos">Ver todos</option>
              <option value="online">Online</option>
              <option value="presencial">Presencial</option>
            </select>
          </div>
          <!-- Fin de filtro por modalidad -->

          <button class="btn btn-outline-warning botones" id="buscar">Buscar</button>
        </form>
      </section>
    </div>
  </div>

</div>

<script type="text/javascript">
  $('#buscar').click(function(evento) {
    evento.preventDefault();
    $.ajax({
      url: "search.php",
      method: "POST",
      data: $('#search').serialize(),
      beforeSend: function() {
        $('#cards_evento').text('Cargando eventos...');
      },
      success: function(response) {
        $('#cards_evento').html(response);
      }
    });
  });
</script>