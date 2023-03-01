<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header modal_login">
        <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal" data-backdrop="false"></button>
      </div>
      <div class="modal-body modal_login">
        <div class="col-9">
          <section class="formulario_login">
            <form action="login.php" method="POST">
              <div class="form-group m-3">
                <label for="user_empresa">Nombre de empresa/organización</label>
                <input type="text" class="form-control" id="user_empresa" name="user_empresa" placeholder="Tu nombre de empresa/organización">
                <small id="userHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group m-3">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
              </div>
              <div class="d-flex m-3 justify-content-stretch">
                <button type="submit" class="btn btn-outline-warning mt-2">Entrar</button>
              </div>
            </form>
          </section>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center modal_login">
        ¿Aun no tienes cuenta para empresa?
        <a href="#" class="text-warning" data-bs-toggle="modal" data-bs-target="#signupModal">
          Registrarse
        </a>
      </div>
    </div>
  </div>
</div>

<!-- fin del modal -->