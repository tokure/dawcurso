<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header modal_login">
        <h5 class="modal-title" id="signupModalLabel">Registrarse</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal_login">
        <div class="col-9">
          <section class="formulario_login">
            <form action="signup.php" method="POST" class="needs-validation">
              <div class="form-group m-3">
                <label for="nombre_empresa">Nombre de entidad/organización</label>
                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="nombre de empresa" required>
                <div class="invalid-feedback">Este campo no puede permanecer vacío</div>
              </div>
              <div class="form-group m-3">
                <label for="password">Contraseña</label>
                <input type="passwordRegistro" class="form-control" id="passwordRegistro" name="passwordRegistro" placeholder="Debe contener de 6 a 12 caracteres" required>
                <div class="invalid-feedback">Debe contener de 6 a 12 caracteres</div>
              </div>
              <div class="form-group m-3">
                <label for="cif">Número de CIF</label>
                <input type="test" class="form-control" id="cif" name="cif" placeholder="A12345678" >
                <div class="invalid-feedback">Debe contener 1 letra y 8 números</div>
              </div>
              <div class="form-group m-3">
                <label for="tlf">Número de teléfono</label>
                <input type="number" class="form-control" id="tlf" name="tlf" placeholder="655111222" >
                <div class="invalid-feedback">Debe contener 9 números</div>
              </div>
              <div class="form-group m-3 selector">
                <label for="email">Correo electrónico</label><br>
                <input type="email" class="form-control" id="email" name="email" placeholder="usuario@example.com" >         
              </div>
              <div class="form-group m-3 selector">
                <label for="prov">Provincia</label><br>
                <?php selector_provincia();?>           
              </div>
                          
              <div class="form-group m-3">
                <button class="btn btn-outline-warning mt-2" type="submit" id="signup">Crear cuenta</button>
              </div>
            </form>
          </section>
        </div>
      </div>

      <div class="modal-footer d-flex justify-content-center modal_login">
        ¿Ya tienes cuenta de empresa?
        <a href="#" class="text-warning" data-bs-toggle="modal" data-bs-target="#loginModal">
          Entra a tu cuenta
        </a>

      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById("signup").addEventListener("click", verificar);

  function verificar() {
    verificar_user();
    verificar_password();
  }

  function verificar_user() {
    return verificarEstaVacio("nombre_empresa");
  }

  function verificar_password() {
    const campo = document.getElementById("passwordRegistro");
    const valor = campo.value;
    if (valor.length < 6 || valor.length > 12) {
      campo.className = "form-control is-invalid";
    } else {
      campo.className = "form-control is-valid";
    }
  }

  function verificarEstaVacio(id) {
    // Recoger el valor
    const campo = document.getElementById(id);
    const valor = campo.value;

    // Comprobar si está vacío
    if (valor == "") {
      campo.className = "form-control is-invalid";
    } else {
      campo.className = "form-control is-valid";
    }
  }
</script>

<!-- fin del modal -->