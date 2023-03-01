<!-- Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header modal_login">
        <h5 class="modal-title" id="signupModalLabel">Añadir Evento</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal_login">
        <div class="col-9">
          <section class="add_event">
            <form action="add_event.php" method="POST" class="needs-validation">
              <div class="form-group m-3">
                <label for="name_event">Nombre de evento</label>
                <input type="text" class="form-control" id="name_event" name="name_event" placeholder="Nombre del evento" required>
                <div class="invalid-feedback">Este campo no puede permanecer vacío</div>
              </div>
              <div class="form-group m-3">
                <label for="date">Fecha</label>
                <input type="date" id="date" name="date" class="form-control date" style="width:auto" required>
                <div class="invalid-feedback">Debe añadir una fecha</div>
              </div>
              <div class="form-group m-3">
                <label for="time">Hora</label>
                <input type="time" id="time" name="time" class="form-control time" style="width:auto">
                <div class="invalid-feedback">Debe añadir una hora de comienzo del evento</div>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_provincia(); ?>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_tematica() ?>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_tipo() ?>
              </div>
              <div class="form-group m-3">
                <label for="description">Descripción del evento</label>
                <textarea class="form-control" name="description" rows="5" maxlength="2000"></textarea>
              </div>
              <div class="form-group m-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox">
                  <label class="form-check-label" for="checkbox">
                  Quiero promocionar el evento
                  </label>
                </div>
              </div>
              <div class="form-group m-3">
                <button class="btn btn-outline-warning mt-2" type="submit" id="add_event">Añadir evento</button>
              </div>
            </form>
          </section>
        </div>
      </div>