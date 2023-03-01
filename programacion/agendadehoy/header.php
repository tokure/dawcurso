<header id="header" class="row navbar fixed-top">
    <div class="col-1">
        <a href="index.php"><img class="logo" src="./img/logo.png" alt="logo" title="logo"></a>
    </div>
    <div class="col-9">
        <ul class="menu_superior">
            <li class="menu_sup_item">
                <a href="index.php">Inicio</a>
            </li>
            <li class="menu_sup_item">
                <a href="#buscador">Eventos</a>
            </li>
            <li class="menu_sup_item">
                <a href="#footer">Contacto</a>
            </li>

        </ul>
    </div>
    <div class="col-2 sesion" style=color:white>
        <?php

        if (isset($_SESSION["nombre_empresa"])) {
            echo "<b>Hola, <a href='perfil.php'>" . $_SESSION["nombre_empresa"] . "</a></b><br>";
            echo "<a href='logout.php'<button type='button' class='btn btn-outline-warning'>Logout</a>";
        } else {

            echo "<a href='login.php' data-bs-toggle='modal' data-bs-target='#loginModal'>
                <button type='button' class='btn btn-outline-warning'>Iniciar Sesión</button>
            </a>";
        }
        ?>

    </div>

</header>