<nav class="navbar navbar-light nav-back">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand text-color">Sistema Generador de Etiquetas</h1><a class="navbar-brand">Sistema Generador de Etiquetas</a>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header nav-slide">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body nav-slide">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link text-color active" aria-current="page" href="menu_user.php">
              🏠 Inicio
            </a>
          </li>
          <hr class="dropdown-divider">
          <li class="nav-item">
            <a class="nav-link text-color active" aria-current="page">🖨️ Etiquetas</a>
            <ul>
              <li class="nav-item">
                <a class="nav-link text-color active" aria-current="page" href="label.php">NISSAN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-color active" aria-current="page" href="budomari.php">Budomari</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-color active" aria-current="page" href="compas.php">COMPAS</a>
              </li>
            </ul>
          </li>
          <hr class="dropdown-divider">
          <li class="nav-item">
            <a class="nav-link text-color active" href="../server/tasks/close_session.php">❌ Cerrar Sesión</a></li>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>