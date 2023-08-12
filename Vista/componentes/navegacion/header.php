<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="Vista/css/style.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/card.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/popup.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/contacto.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/dropdown.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="Vista/js/Popup.js"></script>
  <title><?php echo isset($this->nombrePagina) ? $this->nombrePagina : " "; ?></title>
</head>
<body>
  <header class="header">
    <div class="logo" ><img src="Vista/css/logo.png" alt="logo" height="70"></div>
    <div class="bar-search">
      <form id="frm-busqueda" action="?c=producto&a=buscarProducto" method="POST">
          <input type="text" name="word_search" placeholder="Busca tu producto aqui" >
          <button name= "btn-search" type="submit"><i class="fa-solid fa-magnifying-glass" ></i></button>
      </form>
    </div>
    <div class="header-left">
      <div class="center-header">
        <nav class="navigation">
          <ul>
            <li><a href="?c=sesion&a=inicio" class="nav-inicio">Inicio</a></li>
            <li><a href="?c=sesion&a=sobreNosotros" class="nav-about">Sobre Nosotros</a></li>
            <li><a href="?c=producto&a=listar" class="nav-productos">Productos</a></li>
            <?php if((isset($this->existeSesion) && !$this->existeSesion) || $this->usuario->__get('rol') == 'noadmin'): ?>
            <li><a href="?c=sesion&a=contacto" class="nav-contacto">Contacto</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
      <?php if(isset($this->existeSesion) && $this->existeSesion): ?>
      <div class="info-user">
        <div class="dropdown">
        <button title="Cuenta: <?php echo $this->usuario->__get('rol'); ?>" class="button-close button-danger"><i id="btnOpenDropdown" class="fa-solid fa-arrow-right-to-bracket button-admin open-btn"></i></button>
          <div id="myDropdown" class="dropdown-menu">
            <a class="btn-dropmenu">
              <span  class="lbl-usuario">
              <?php echo $this->usuario->__get('nombre'); ?>
              </span>
            </a>
            <a class="btn-dropclose button-red" href="?c=sesion&a=cerrarSesion" type="submit">cerrar sesión</a>
          </div>
        </div>
      </div>
      <?php else:?>
        <script type="module" src="Vista/js/Buttons.js"></script>
      <?php endif; ?>
      <div class="menu-icon">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
    <script type="module" src="Vista/js/Menu.js"></script>
  </header>
  <?php if(isset($this->message) && !empty($this->message)) { require_once "Vista/componentes/navegacion/popup.php"; } ?>
