<nav class="navbar navbar-light nav-back">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand">Sistema Generador de Etiquetas</h1>
    <h1 class="navbar-brand text-color"></h1>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header nav-slide">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body text-color-dark nav-slide">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="menu_admin.php">
              🏠 Inicio
            </a>
          </li>
          <hr class="dropdown-divider">
          <li class="nav-item">
            <a class="nav-link text-color-dark active" aria-current="page">🖨️ Etiquetas</a>
            <ul>
              <li class="nav-item">
                <a class="nav-link text-color-dark active" aria-current="page" href="label.php">NISSAN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-color-dark active" aria-current="page" href="budomari.php">Budomari</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-color-dark  active" aria-current="page" href="compas.php">COMPAS</a>
              </li>
            </ul>
          </li>
          <hr class="dropdown-divider">
          <li class="nav-item">
            <a class="nav-link text-color active" href="new_user.php">👤 Nuevo Usuario</a></li> 
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
<div class="image-nav">
  <div class="row">
    <div class="col-sm-6">
      <img src="../src/images/poscoLogo.png" alt="Posco">
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-2">
      <img src="../src/images/withPosco.png" alt="withPosco">
    </div>
  </div>
</div>